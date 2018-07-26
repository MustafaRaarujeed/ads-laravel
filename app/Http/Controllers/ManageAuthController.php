<?php

namespace App\Http\Controllers;

use App\Events\LoginEvent;
use App\LinkedSocialAccounts;
use App\Manager;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;

class ManageAuthController extends Controller
{
	/**
	 * [login description]
	 * @return [type] [description]
	 */
    public function login()
    {
        if(Auth::check()) {
            return redirect()->route('ads.index');
        }
    	return view('manage.auth.login');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function postLogin(Request $request)
    {
        // Define Form Rules
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];
        // Validate request
        $this->validate($request, $rules);

        // Define Auth Rules
        $authRules = [
            'email' => $request['email'],
            'password' => $request['password'],
            'userable_type' => Manager::class,
        ];

        if(Auth::attempt($authRules)) {
            // Fire Event to log success
            event(new LoginEvent($request, "success"));            
            return redirect()->route('ads.index');
        }

        // Fire Event to log failed
        event(new LoginEvent($request, "fail"));
        return redirect()->back()->withErrors('The Email and Password Combination are Invalid');
    }

    /**
     * [logout description]
     * @return [type] [description]
     */
    public function logout()
    {
        Auth::logout();
        \Session::flush();
        return redirect()->route('login.get');
    }

    /*Third Part*/
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        $authUser = $this->findOrCreateUser($user, 'github');
        
        auth()->login($authUser, true);

        return redirect()->route('ads.index');
    }

    public function findOrCreateUser($providerUser, $provider)
    {
        $account = LinkedSocialAccounts::where('provider_name', $provider)
                    ->where('provider_id', $providerUser->getId())
                    ->first();

        if($account) {
            return $account->user;
        }
        
        $user = User::where('email', $providerUser->getEmail())->first();

        if(! $user) {
            $fields = [
                'name' => $providerUser->name,
                'email' => $providerUser->email,
            ];
            $user = User::createManager($fields);
        }

        $user->accounts()->create([
            'provider_id' => $providerUser->getId(),
            'provider_name' => $provider,
        ]);

        return $user;

    }
}

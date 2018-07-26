<?php

namespace App\Http\Controllers;

use App\Events\LoginEvent;
use App\Manager;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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

        // $user->token;
        dd($user);
    }
}

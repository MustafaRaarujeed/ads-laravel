<?php

namespace App\Http\Controllers;

use App\User;
use Socialite;
use App\Events\LoginEvent;
use Illuminate\Http\Request;
use App\LinkedSocialAccounts;
use Illuminate\Support\Facades\Auth;
use App\Services\SocialAccountService;

class ManageSocialAuthController extends Controller
{
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
     * @param  SocialAccountService $accountService [description]
     * @param  Request              $request        [description]
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(SocialAccountService $accountService, Request $request)
    {
        $user = Socialite::driver('github')->user();

        $authUser = $accountService->findOrCreate($user, 'github'); 
        
        auth()->login($authUser, true);

        // Append AuthUser Email to The request
        $request->email = $authUser->email;

        // Fire an event to Log success attempt
        event(new LoginEvent($request, "success"));

        return redirect()->route('ads.index');
    }

}

<?php

namespace App\Http\Controllers;

use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\LinkedSocialAccounts;
use App\Services\SocialAccountService;
use Illuminate\Support\Facades\Auth;

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
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(SocialAccountService $accountService)
    {
        $user = Socialite::driver('github')->user();

        $authUser = $accountService->findOrCreate($user, 'github');

        dd($authUser);
        
        auth()->login($authUser, true);

        return redirect()->route('ads.index');
    }

}

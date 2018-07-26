<?php

namespace App\Services;

use App\User;
use App\LinkedSocialAccounts;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
	/**
     * [findOrCreateUser description]
     * @param  [type] $providerUser [description]
     * @param  [type] $provider     [description]
     * @return [type]               [description]
     */
    public function findOrCreate(ProviderUser $providerUser, $provider)
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
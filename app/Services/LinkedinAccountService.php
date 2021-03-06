<?php

namespace App\Services;
use App\FacebookAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class LinkedinAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = FacebookAccount::whereProvider('linkedin')
                    ->whereProviderUserId($providerUser->getId())
                    ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new FacebookAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'linkedin'
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    // 'birthdate' => $providerUser->getdate(),
                    'password' => md5(rand(1,10000)),
                    'role' => 1,
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}

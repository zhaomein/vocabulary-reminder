<?php 

namespace App\Services;

use Laravel\Socialite\Contracts\User as ProviderUser;
use App\User;

class SocialAccountService
{
    public static function createOrGetUser(ProviderUser $providerUser, $social)
    {
        $account = SocialAccount::whereProvider($social)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $email = $providerUser->getEmail() ?? $providerUser->getNickname();
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $social
            ]);
            $user = User::whereEmail($email)->first();

            if (!$user) {

                $user = User::create([
                    'email' => $email,
                    'name' => $providerUser->getName(),
                    'password' => $providerUser->getName(),
                    'gender' => 0,
                    'role' => 2,
                    'birthday' => '1998-02-06',
                    'status' => 1
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
}
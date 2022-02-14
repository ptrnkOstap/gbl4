<?php

namespace App\Services;

use App\Contracts\Social;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as BaseContract;

class SocialService implements Social
{

    /**
     * @param BaseContract $socialUser
     * @param string $network
     * @return string
     * @throws \Exception
     */
    public function loginUser(BaseContract $socialUser, string $network): string
    {
        $user = User::where('email', $socialUser->getEmail()->first());
        if ($user) {
            $user->name = $socialUser->getName();

            if ($user->save()) {
                Auth::loginUsingId($user->id);
                return route('welcome.index');
            }
        } else {
            return route('register');
        }
        throw new \Exception('Error while logging in via: ' . $network);
    }
}

<?php

namespace App\Contracts;

use Laravel\Socialite\Contracts\User as BaseContract;

interface Social
{
    public function loginUser(BaseContract $socialUser, string $network): string;
}

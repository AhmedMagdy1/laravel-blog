<?php

namespace App\Service\Auth;

use App\User;

class UserService
{
    function getAll()
    {
        return User::all();
    }
}

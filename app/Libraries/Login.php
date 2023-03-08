<?php

namespace App\Libraries;

use App\Models\User;
use stdClass;

class Login
{
<<<<<<< HEAD
  public static function login(stdClass $user)
=======
  public static function login(User|stdClass $user)
>>>>>>> 6aa84b0c115f2e49d82888e30861f5b8fdae9a68
  {
    $userInfo = new stdClass;
    $userInfo->id = $user->id;
    $userInfo->firstName = $user->firstName;
    $userInfo->lastName = $user->lastName;
    $userInfo->email = $user->email;
    $userInfo->fullName = $user->firstName . ' ' . $user->lastName;

    session()->set('auth', true);
    session()->set('user', $userInfo);
  }
}

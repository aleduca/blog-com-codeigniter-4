<?php

namespace App\Libraries;

use stdClass;

class Login
{
  public static function login(stdClass $user)
  {
    $userInfo = new stdClass;
    $userInfo->id = $user->id;
    $userInfo->firstName = $user->firstName;
    $userInfo->lastName = $user->lastName;
    $userInfo->email = $user->email;
    $userInfo->avatar = $user->image;
    $userInfo->fullName = $user->firstName . ' ' . $user->lastName;

    session()->set('auth', true);
    session()->set('user', $userInfo);
  }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Register extends BaseController
{
  public function index()
  {
    return view('register');
  }

  public function store()
  {
    var_dump('register user');
  }
}

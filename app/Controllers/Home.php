<?php

namespace App\Controllers;

use App\Models\Category;

class Home extends BaseController
{
  public function index()
  {


    return view('home', ['title' => 'Home']);
  }
}

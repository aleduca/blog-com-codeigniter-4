<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index()
  {
    $this->cachePage(300);
    return view('home', ['title' => 'Home']);
  }
}

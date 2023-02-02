<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Category extends BaseController
{
  public function index(string $category)
  {
    var_dump($category);
  }
}

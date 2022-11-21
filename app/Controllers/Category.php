<?php

namespace App\Controllers;

class Category extends BaseController
{
    public function index(string $category)
    {
        return view('_partials/_category_' . $category);
    }
}

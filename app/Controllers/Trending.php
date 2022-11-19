<?php

namespace App\Controllers;

class Trending extends BaseController
{
    public function index()
    {
        return view('_partials/_trending');
    }
}

<?php

namespace App\Controllers;

class Recent extends BaseController
{
    public function index()
    {
        return view('_partials/_recent');
    }
}

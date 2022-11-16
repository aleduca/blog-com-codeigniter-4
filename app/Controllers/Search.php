<?php

namespace App\Controllers;

class Search extends BaseController
{
    public function index()
    {
        var_dump($this->request->getGet('s'));
    }
}

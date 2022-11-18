<?php

namespace App\Controllers;

class BannerHome extends BaseController
{
    public function index()
    {
        return view('fetch/_bannerHome');
    }
}

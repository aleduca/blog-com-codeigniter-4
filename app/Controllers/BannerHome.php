<?php

namespace App\Controllers;

class BannerHome extends BaseController
{
    public function index()
    {
        // sleep(3);

        return view('_partials/_bannerHome');
    }
}

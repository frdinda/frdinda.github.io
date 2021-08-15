<?php

namespace App\Controllers\Beranda;

use App\Controllers\BaseController;

class Beranda extends BaseController
{
    public function index()
    {
        return view('beranda/beranda');
    }
}

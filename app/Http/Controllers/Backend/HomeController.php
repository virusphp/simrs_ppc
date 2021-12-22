<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;

class HomeController extends BackendController
{
    public function index()
    {
        $bcrum = $this->bcrum('Dashboard');
        return view('backend.home', compact('bcrum'));
    }
}

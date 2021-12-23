<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;

class UsersController extends BackendController
{
    public function index()
    {
        $bcrum = $this->bcrum("Data user");
        return view('users.index', compact('bcrum'));
    }
}

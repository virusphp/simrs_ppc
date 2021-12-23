<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\BackendController;
use App\Repositories\User\User;
use Illuminate\Http\Request;

class UsersController extends BackendController
{
    public function index(UsersDataTable $datatable)
    {
        $bcrum = $this->bcrum("Data user");
        return view('backend.users.index', compact('bcrum', 'datatable'));
    }

    public function indexAjax(Request $request, User $user, UsersDataTable $datatable)
    {
        if ($request->ajax()) {
            return $datatable->datatable($user->getUser());
        }
    }
}
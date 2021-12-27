<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\BackendController;
use App\Repositories\User\User;
use Illuminate\Http\Request;

class UsersController extends BackendController
{
    protected $user;

    public function __construct()
    {
        $this->user = new User;
    }

    public function index()
    {
        $bcrum = $this->bcrum("Data user");
        return view('backend.users.index', compact('bcrum'));
    }

    public function indexAjax(Request $request)
    {
        if ($request->ajax()) {
            $users = $this->user->getUser();

            $no = 1;
            foreach ($users as $user) {
                $button = '<button class="btn btn-sm btn-warning" id="edit-barang" data-id="' . $user->id . '" data-nama="' . $user->name . '" title="Edit"><i class="fas fa-edit"></i></button>' . 
                '  ' . '<button class="btn btn-sm btn-danger" id="btn-delete" data-id="' . $user->id . '" title="Hapus"><i class="fas fa-trash-alt"></i><span class="text"></span></button>';
                $query[] = [
                    'no' => $no++,
                    'name' => $user->name,
                    'username' => $user->username,
                    'email' => $user->email,
                    'status' => statusUser($user->status),
                    'roles' => '<span class="badge badge-info">'.implode(",", $user->getRoleNames()->toArray()).'</span>',
                    'action' => $button
                ];
            }
            $result = isset($query) ? ['data' => $query] : ['data' => 0];
            return response()->json($result);
        }
    }

    public function store(Request $request)
    {
        $data = $this->handleRequest($request);
        $user = User::create($data);
        $user->assignRole($request->roles);
        $this->notification('success', 'Perhatian!', 'User ' . $user->name . ' berhasil di buat!');
        return redirect()->route('users.index');
    }

    protected function handleRequest($params)
    {
        return [
            'nama'       => $params->nama,
            'username'   => $params->username,
            'email'      => $params->email,
            'kd_pegawai' => "",
            'password'   => $params->password,
            'status'     => "1",
        ];
    }

   
}
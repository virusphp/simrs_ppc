<?php

namespace App\Http\Controllers\Backend;

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
                $button = '<button class="btn btn-sm btn-warning" id="edit-user" data-id="' . $user->id . '" data-nama="' . $user->name . '" title="Edit"><i class="fas fa-edit"></i></button>' . 
                '  ' . '<button class="btn btn-sm btn-danger" id="delete-user" data-id="' . $user->id . '" data-nama="' . $user->name . '" title="Hapus"><i class="fas fa-trash-alt"></i><span class="text"></span></button>';
                $query[] = [
                    'no' => $no++,
                    'name' => $user->name,
                    'username' => $user->username,
                    'email' => $user->email,
                    'status' => statusUser($user->status),
                    'roles' => implode(",", $user->getRoleNames()->toArray()),
                    'action' => $button
                ];
            }
            $result = isset($query) ? ['data' => $query] : ['data' => 0];
            return response()->json($result);
        }
    }

    public function ajaxStore(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->handleRequest($request);
            $user = $this->user->saveUser($data);

            if (!$user) {
                return response()->jsonApi(201, 'Data user gagal di simpan');
            }

            $user->assignRole($request->roles);
            return response()->jsonApi(200, 'Data user berhasil di simpan');
        }
    }

    protected function handleRequest($params)
    {
        return [
            'name'       => $params->name,
            'username'   => $params->username,
            'email'      => $params->email,
            'kd_pegawai' => "",
            'password'   => $params->password,
            'status'     => "1",
        ];
    }

    // Blom di pakai
    public function ajaxEdit(Request $request)
    {
        if ($request->ajax()) {
            $user = $this->user->cariUser($request);
            if (!$user) {
                return response()->jsonApi(201, 'Data user tidak di temukan');
            }
            return response()->jsonApi(200, 'Data user ditemukan', $user);
        }
    }

    public function ajaxUpdate(Request $request)
    {
        if ($request->ajax()) {
            $user = $this->user->cariUser($request);
            $data = $this->handleRequest($request);
            if(!$user) {
                return response()->jsonApi(201, 'Data user tidak di temukan');
            }
            $user->update($data);
            $this->user->deleteRole($request);
            $user->assignRole($request->input('roles'));
            return response()->jsonApi(200, 'Data user berhasil di update');
        }
    }

    public function ajaxDestroy(Request $request)
    {
        if ($request->ajax()) {
            $user = $this->user->cariUser($request); 
            if (!$user) {
                return response()->jsonApi(201, 'Data user gagal di hapus');
            }

            $user->delete(); 
            return response()->jsonApi(200, 'Data user berhasil di hapus');
        }
    }
   
}
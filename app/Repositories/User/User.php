<?php

namespace App\Repositories\User;

use App\Models\User as Model;
use DB;

class User
{
    public function getUser()
    {
        return Model::select('name','username','email','kode_pegawai','password','status');
    }
    
    public function getProfil($email)
    {
        return DB::table('users')->select('name','username','email','created_at')->where('email',$email)->first();
    }

    public function create($data)
    {
        return Model::create($data);
    }

    public function findByLoginPemakaiId($id)
    {
        return Model::where('loginpemakai_id',$id)->first();
    }
}

<?php

namespace App\Repositories\User;

use App\Models\User as Model;
use DB;

class User
{
    public function getUser()
    {
        return Model::all();
    }

    public function saveUser($params)
    {
        return Model::create($params);
    }

    public function cariUser($params)
    {
        return Model::find($params->id);
    }

    public function deleteRole($params)
    {
        return DB::table('model_has_roles')->where('model_id', $params->id)->delete();
    }
}
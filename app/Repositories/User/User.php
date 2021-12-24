<?php

namespace App\Repositories\User;

use App\Models\User as Model;

class User
{
    public function getUser()
    {
        return Model::select('name','username','email','password','status');
    }
}
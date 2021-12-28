<?php

namespace App\Repositories\Roles;

use Spatie\Permission\Models\Role as SpatieRole;

class Role 
{
	protected $limit = 10;

	public function getRoles()
	{
		return SpatieRole::orderBy('id', 'DESC')->paginate($this->limit);
	}
}
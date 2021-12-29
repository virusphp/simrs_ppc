<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\BackendController;
use App\Http\Requests\RoleRequest;
use App\Repositories\Roles\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as SpatieRole;

class RolesController extends BackendController
{

    protected $role;

    public function __construct()
    {
        $this->role = new Role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bcrum = $this->bcrum("Data Role");
        $roles = $this->role->getRoles();

        return view('backend.roles.index', compact('bcrum', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bcrum = $this->bcrum('Management Roles', 'Data Role');
        $role = new SpatieRole();
        return view('backend.roles.create', compact('role', 'bcrum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = SpatieRole::create(['name' => $request->name]);
        $role->syncPermissions($request->permissions);
        $this->notification('success', 'Perhatian!', 'Role created successfully');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bcrum = $this->bcrum('Management Roles', 'Data Role');
        $role = SpatieRole::find($id);
        $permission = Permission::get();

        return view('backend.roles.edit', compact('role', 'bcrum', 'permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = SpatieRole::find($id);
        $role->name = $request->name;
        $role->save();

        $role->syncPermissions($request->permissions);

        $this->notification('success', 'Perhatian!', 'Role Berhasil Diubah');

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = SpatieRole::find($id);
        $role->delete();
        $this->notification('success', 'Perhatian!', 'Role berhasil di hapus');
        return redirect()->route('roles.index');
    }
}

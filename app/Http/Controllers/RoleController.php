<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('systemadmin.role.index', compact('roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => ['required', 'string', 'max:125', 'unique:roles,name'],
            'permissions' => ['required'],
        ]);

        Role::create(['name' =>  $request->role])->syncPermissions($request->permissions);

        return redirect(route('role.index', absolute: false))->with('status', 'تم إضافة الوظيفة بنجاح');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->all();
        return view('systemadmin.role.edit', compact('role','permissions','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,string $id)
    {
        $role = Role::find($id);
        // dd(empty($request->permissions));
        $request->validate([
            'role' => ['required', 'string', 'max:125', 'unique:roles,name,'.$role->id],
            'permissions' => ['required'],
        ]);

        $role->update([
            'name' => $request->role,
        ]);

        $role->syncPermissions($request->permissions);

        return redirect()->route('role.index')->with('status', 'تم تعديل الوظيفة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Role::find($id)->delete();

        return redirect()->route('role.index')->with('status', 'تم حذف الوظيفة بنجاح');
    }
}

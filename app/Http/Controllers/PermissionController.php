<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::paginate(25);
        return view('systemadmin.permission.index', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'permission' => ['required', 'string', 'max:125', 'unique:permissions,name'],
        ]);

        Permission::create(['name' => $request->permission]);

        return redirect(route('permission.index', absolute: false))->with('status', 'تم إضافة الصلاحية');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $permission = Permission::find($id);
        return view('systemadmin.permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $permission = Permission::find($id);

        $request->validate([
            'permission' => ['required', 'string', 'max:125', 'unique:permissions,name,'.$permission->id]
        ]);

        $permission->update([
            'name' => $request->permission,
        ]);

        return redirect()->route('permission.index')->with('status', 'تم تعديل الصلاحية');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Permission::find($id)->delete();

        return redirect()->route('permission.index')->with('status', 'تم حذف الصلاحية');
    }
}

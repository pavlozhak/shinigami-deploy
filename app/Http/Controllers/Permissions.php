<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class Permissions extends Controller
{
    public function index() {
        return view('permission.index', ['permissions' => Permission::all()]);
    }

    public function edit($permission_id) {
        return view('permission.edit', ['permission' => Permission::find($permission_id)]);
    }

    public function add() {
        return view('permission.add');
    }

    public function store(Request $request)
    {
        if (!$request->isMethod('post')) {
            return back()->withErrors(['Wrong form method']);
        }

        $request->validate([
            'name' => 'required|unique:permissions|min:2|max:200|bail',
            'slug' => 'required|unique:permissions|min:2|max:200|alpha_dash|bail'
        ]);

        Permission::create($request->all());

        return back()->with('success', 'New permission added success!');
    }

    public function remove($permission_id)
    {
        Permission::destroy($permission_id);
        return back()->with('success', 'Permission removed success!');
    }

    public function savePermission(Request $request)
    {
        if (!$request->isMethod('post')) {
            return back()->withErrors(['Wrong form method']);
        }

        $permission = Permission::where('id', $request->request->get('id'))->first();

        if(is_null($permission)) {
            return back()->withErrors(['No permission found']);
        }

        $permission->name = $request->request->get('name');
        $permission->slug = $request->request->get('slug');
        $permission->group = $request->request->get('group');
        $permission->save();

        return back()->with('success', 'Permission saved success!');
    }
}

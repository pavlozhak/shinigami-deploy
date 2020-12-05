<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class Roles extends Controller
{
    public function index() {
        return view('roles.index', ['roles' => Role::all()]);
    }

    public function edit($role_id) {
        return view('roles.edit', ['role' => Role::find($role_id), 'permissions' => Permission::all(), 'groups' => Permission::select('group')->distinct()->get()]);
    }

    public function add() {
        return view('roles.add');
    }

    public function store(Request $request)
    {
        if (!$request->isMethod('post')) {
            return back()->withErrors(['Wrong form method']);
        }

        $request->validate([
            'name' => 'required|unique:roles|min:2|max:200|bail',
            'slug' => 'required|unique:roles|min:2|max:200|alpha_dash|bail'
        ]);

        Role::create($request->all());

        return back()->with('success', 'New role added success!');
    }

    public function remove($role_id)
    {
        Role::destroy($role_id);
        return back()->with('success', 'Role removed success!');
    }

    public function setRolePermission(Request $request)
    {
        if (!$request->isMethod('post')) {
            return back()->withErrors(['Wrong form method']);
        }

        $role = Role::where('id', $request->request->get('id'))->first();

        if(is_null($role)) {
            return back()->withErrors(['No role found']);
        }

        $role->givePermissions($request->all());


        return back()->with('success', 'Permissions add success!');
    }

    public function saveRole(Request $request)
    {
        if (!$request->isMethod('post')) {
            return back()->withErrors(['Wrong form method']);
        }

        $role = Role::where('id', $request->request->get('id'))->first();

        if(is_null($role)) {
            return back()->withErrors(['No role found']);
        }

        $role->name = $request->request->get('name');
        $role->slug = $request->request->get('slug');
        $role->save();

        return back()->with('success', 'Role saved success!');
    }
}

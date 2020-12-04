<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{

    public function index()
    {
        return view('users.index', ['users' => User::all()]);
    }

    public function profile($username)
    {
        return view('users.profile', ['user' => User::firstWhere('name', $username)]);
    }

    public function create()
    {
        return view('users.add');
    }

    public function store(Request $request)
    {

        if (!$request->isMethod('post')) {
            return back()->withErrors(['msg', 'Wrong form method']);
        }

        $request->validate([
            'email' => 'required|unique:users|email:rfc,dns|bail',
            'password' => 'required|min:8|max:20|bail',
            'name' => 'min:5|max:25|alpha_dash',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($request->has('avatar')) {
            $image = $request->file('avatar');
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/userpic', $imageName);
        }

        User::create(array(
            'email' => $request->request->get('email'),
            'password' => Hash::make($request->request->get('password')),
            'name' => $request->request->get('name'),
            'avatar' => ($imageName) ? $imageName : NULL
        ));

        return back()->with('success', 'New user added success!');
    }

}

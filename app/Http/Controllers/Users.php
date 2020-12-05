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
            return back()->withErrors(['Wrong form method']);
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

    public function test()
    {
        $user = User::find(14);

        if($user->hasRole('user')) { echo 'User has role: User' . '<br><br>'; } else { echo 'User has not role: User' . '<br><br>'; }
        if($user->hasRole('admin')) { echo 'User has role: Admin' . '<br><br>'; } else { echo 'User has not role: Admin' . '<br><br>'; }
        if($user->hasPermission('user-manage')) { echo 'User has permission: Manage users' . '<br><br>'; } else { echo 'User has not permission: Manage users' . '<br><br>'; }
        if($user->hasPermission('dashboard')) { echo 'User has permission: View dashboard' . '<br><br>'; } else { echo 'User has not permission: View dashboard' . '<br><br>'; }

        echo 'Setting user role: Admin' . '<br><br>';
        $user->setRole(['admin']);
        $user->refresh();

        if($user->hasRole('user')) { echo 'User has role: User' . '<br><br>'; } else { echo 'User has not role: User' . '<br><br>'; }
        if($user->hasRole('admin')) { echo 'User has role: Admin' . '<br><br>'; } else { echo 'User has not role: Admin' . '<br><br>'; }
        if($user->hasPermission('user-manage')) { echo 'User has permission: Manage users' . '<br><br>'; } else { echo 'User has not permission: Manage users' . '<br><br>'; }
        if($user->hasPermission('dashboard')) { echo 'User has permission: View dashboard' . '<br><br>'; } else { echo 'User has not permission: View dashboard' . '<br><br>'; }
    }

}

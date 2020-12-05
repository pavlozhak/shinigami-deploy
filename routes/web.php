<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Login;
use App\Http\Controllers\Projects;
use App\Http\Controllers\Roles;
use App\Http\Controllers\Users;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// CheckPermission

Route::middleware(['auth'])->group(function () {

    Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/projects', [Projects::class, 'index'])->name('projects');

    Route::get('/users', [Users::class, 'index'])->name('users');
    Route::get('/users/add', [Users::class, 'create'])->name('user-add');
    Route::get('/user/profile/{username}', [Users::class, 'profile'])->name('user-profile');

    Route::get('/roles', [Roles::class, 'index'])->name('role-manage');
    Route::get('/roles/add', [Roles::class, 'add'])->name('role-add');
    Route::get('/roles/edit/{role_id}', [Roles::class, 'edit'])->name('role-edit');
    Route::get('/roles/remove/{role_id}', [Roles::class, 'remove'])->name('role-remove');

    Route::get('/logout', [Login::class, 'logout'])->name('logout');

    // POST
    Route::post('/users/store', [Users::class, 'store'])->name('user-store');

    Route::post('/roles/store', [Roles::class, 'store'])->name('role-store');
    Route::post('/roles/permission/set', [Roles::class, 'setRolePermission'])->name('role-set-permission');
    Route::post('/roles/save', [Roles::class, 'saveRole'])->name('role-save');

});

Route::get('/login', [Login::class, 'index'])->name('login-page');
Route::get('/error/permission', [Login::class, 'permissionError'])->name('error-permission');
Route::post('/login/handler', [Login::class, 'handler'])->name('login-handler');

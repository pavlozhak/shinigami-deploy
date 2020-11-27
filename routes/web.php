<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Projects;
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

Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
Route::get('/projects', [Projects::class, 'index'])->name('projects');

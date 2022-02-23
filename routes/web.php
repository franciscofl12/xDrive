<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::get('/admin', function () {
    return view('admin' , ["users"=>\App\Models\User::all()]);
})->middleware(['admin'])->name('admin');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/edit/{id}', function ($id) {
    return view('user.edit' , ["user"=>\App\Models\User::findOrFail($id)] , ["data" => SessionController::index()]);
})->middleware(['admin'])->name('edit');

Route::resource("users", "UserController")->parameters(["users"=>"user"]);

Route::resource('archive', ArchiveController::class)->middleware(['auth', 'verified]']);

require __DIR__.'/auth.php';

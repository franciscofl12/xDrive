<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SharedArchiveController;
use App\Http\Controllers\UserController;
use App\Models\Archive;
use App\Models\SharedArchive;
use Illuminate\Support\Facades\Auth;
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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/pricing', function () {
    return view('pricing');
})->middleware(['auth', 'verified'])->name('pricing');

Route::get('/admin', function () {
    return view('admin', ["users" => \App\Models\User::all()], ["data" => SessionController::index()]);
})->middleware(['admin'])->name('admin');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('profile', function () {
    return view('user.profile', ["user" => Auth::user()]);
})->middleware(['auth', 'verified'])->name('profile');

Route::get('/edit/{id}', function ($id) {
    $data = SessionController::show($id);
    if ($data == null) {
        return view('admin', ["users" => \App\Models\User::all()], ["data" => SessionController::index()])->with('error', 1);
    } else {
        return view('user.edit', ["user" => \App\Models\User::findOrFail($id)], ["data" => SessionController::show($id)]);
    }
})->middleware(['admin'])->name('edit');

Route::get('/download/{archive}', function ($id) {
    return ArchiveController::downloadArchive($id);
})->middleware(['ArchivePermission'])->name('download');

Route::resource('archive', ArchiveController::class)->middleware(['auth', 'verified']);
Route::resource('user', UserController::class)->middleware(['auth', 'verified']);
Route::resource('sharedarchive', SharedArchiveController::class)->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';

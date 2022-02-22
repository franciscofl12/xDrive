<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use function redirect;

class LoginController extends Controller
{
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
}

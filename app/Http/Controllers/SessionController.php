<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        //$sessions = DB::select("select * from sessions");
        $sessions = Session::all();
        return $sessions;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function show($id)
    {
        $session = DB::select("select * from sessions WHERE user_id= $id ");
        //$session = Session::where('user_id', $id);
        return $session;
    }

}

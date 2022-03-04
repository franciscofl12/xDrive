<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;// include composer autoload
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            if (Auth::user()->rol == "admin" ) {
                $updateUser = User::findOrFail($id);
                if ($request->input('firstname')) {
                    $updateUser->firstname = $request->input('firstname');
                    $updateUser->lastname = $request->input('lastname');
                }
                // We will check if an admin is updating the profile
                if ($request->input('username')) {
                    $updateUser->username = $request->input('username');
                    $updateUser->email = $request->input('email');
                }
                if ($request->input('password')) {
                    $updateUser->password = Hash::make($request->input('password'));
                }
                if ($request->input('rol')) {
                    $updateUser->rol = $request->input('rol');
                }

                if (is_uploaded_file($request->file('file'))) {
                    $picture = time() . "-" . $request->file('file')->getClientOriginalName();
                    $updateUser->avatar = $picture;

                    $request->file('file')->storeAs('public/profilepictures', $picture);
                }
                $updateUser->save();

                return redirect()->url('edit/'.$request->input('id'));
            } else {
                $updateUser = User::findOrFail($id);
                if ($request->input('firstname')) {
                    $updateUser->firstname = $request->input('firstname');
                    $updateUser->lastname = $request->input('lastname');
                }

                if (is_uploaded_file($request->file('file'))) {
                    $picture = time() . "-" . $request->file('file')->getClientOriginalName();
                    $updateUser->avatar = $picture;
                    $request->file('file')->storeAs('public/profilepictures', $picture);
                }
                $updateUser->save();
                return redirect()->route('dashboard');
            }

        }catch (QueryException $exception){
            return redirect()->route('dashboard')->with('error',1);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

}

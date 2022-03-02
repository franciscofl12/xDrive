<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        $validate=$request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
        ]);
        try{
            $updateUser=User::findOrFail($id);
            if ($request->input('firstname')) {
                $updateUser->firstname = $request->input('firstname');
                $updateUser->lastname = $request->input('lastname');
            }
            // We will check if an admin is updating the profile
            if ($request->input('username')) {
                $updateUser->username=$request->input('username');
                $updateUser->email=$request->input('username');
            }
            if ($request->input('password')) {
                $updateUser->password = md5($request->input('password'));
            }

            if(is_uploaded_file($request->file('file'))){
                $picture=time()."-".$request->file('file')->getClientOriginalName();
                $updateUser->file=$picture;
                $request->file('file')->storeAs('public/profilepictures', $picture);
            }
            $updateUser->save();

            return redirect()->route('dashboard');

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

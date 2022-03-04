<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use Illuminate\Http\Request;

class ArchiveApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archiveJSON = Archive::all()->toJson();
        return response()->json($archiveJSON);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $archiveJSON = Archive::findOrFail($id);
        return response()->json($archiveJSON);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $archive = Archive::findOrFail($id);
        $archive->name = $request->input('name');
        $archive->save();
    }

}

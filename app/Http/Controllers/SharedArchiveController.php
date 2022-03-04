<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\SharedArchive;
use App\Models\User;
use Illuminate\Http\Request;

class SharedArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('archive.shared');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        redirect(back());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'username' => 'exists:users|required'
        ]);

        try {
            $newShare = new SharedArchive();
            $newShare->archiveID = $request->input('id');
            $newShare->sharedID = User::where('username', $request->input('username'))->firstOrFail()->id;
            $newShare->save();

            return redirect()->route('archive.show',$request->input('id'));

        } catch (QueryException $exception) {
            return redirect()->route('dashboard')->with('error', 1);
        }
    }

    public static function getAllArchiveShared($id) {
        $archives = [];
        foreach(SharedArchive::all() as $archive) {
            if ($archive->sharedID == $id) {
                array_push($archives,Archive::findOrFail($archive->archiveID));
            }
        }
        return $archives;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $share=SharedArchive::findOrFail($id);
        $share->delete();
        return redirect()->route('archive.show',$id);
    }
}

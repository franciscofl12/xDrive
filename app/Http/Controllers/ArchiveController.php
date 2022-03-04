<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\SharedArchive;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends Controller
{

    public function __construct() {
        $this->middleware('ArchivePermission', ['only' => ['show', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('dashboard');
    }

    function formatBytes($size, $precision = 2)
    {
        $base = log($size, 1024);

        return round(pow(1024, log($size, 1024) - floor(log($size, 1024))), $precision);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('uploadfiles');
        if ($request->hasFile('uploadfiles')) {
            try {
                $newFile = new Archive();
                $newFile->owner = Auth::id();
                $newFile->name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);;
                $newFile->type = $file->extension();
                $newFile->size = round(pow(1024, log($file->getSize(), 1024) - floor(log($file->getSize(), 1024))), 2);
                $nameArchive = time() . "-" . $file->getClientOriginalName();
                $newFile->route = $nameArchive;
                $newFile->save();

                $file->storeAs('public/archives', $nameArchive);
                return redirect()->route('dashboard');

            } catch (QueryException $exception) {
                return redirect()->route('dashboard')->with('error', 1);
            }
        }
    }

    public static function getAllArchives($id) {
        $archives = [];
        foreach(Archive::all() as $archive) {
            if ($archive->owner == $id) {
                    array_push($archives,$archive);
                }
        }
        return $archives;
    }

    public static function downloadArchive($id) {
        $archive = Archive::findOrFail($id);
        $download = Storage::download('public/archives/'.$archive->route);

        return $download;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        $this->middleware('ArchivePermission');
        return view('archive.show' , ['archive'=> Archive::findOrFail($id)] , ['sharedWith'=> SharedArchive::where('archiveID', $id)->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        $file=Archive::findOrFail($id);
        Storage::delete('public/archives/'.$file->route);
        $file->delete();
        return redirect()->route('dashboard');
    }
}

<?php

namespace App\Http\Middleware;

use App\Models\Archive;
use App\Models\SharedArchive;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchivePermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Archive::findOrFail($request->route('archive'))->owner == Auth::id() || SharedArchive::where('archiveID' , Archive::findOrFail($request->route('archive'))->id)->firstOrFail()->sharedID == Auth::id())
            return $next($request);

        return redirect('dashboard');
    }
}

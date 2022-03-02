<?php

namespace App\Http\Middleware;

use App\Models\Archive;
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
    public function handle(Request $request, Closure $next ,$id)
    {
        if (Archive::findOrFail($id)->owner == Auth::user()->id)
            return $next($request);

        return redirect('/');
    }
}

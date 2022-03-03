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
    public function handle(Request $request, Closure $next)
    {
        if (Archive::findOrFail($request->route('id'))->owner == Auth::id())
            return $next($request);

        return redirect('/');
    }
}

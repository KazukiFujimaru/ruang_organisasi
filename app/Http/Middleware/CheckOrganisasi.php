<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckOrganisasi
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user->organization_id) {
            return $next($request);
        } else {
            return redirect()->route('organisasi.choose');
        }
    }
}

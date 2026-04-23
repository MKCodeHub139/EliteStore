<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminSession
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('is_admin_logged_in')) {
        return redirect()->route('admin.login')
            ->with('error', 'Please login as admin');
    }

        return $next($request);
    }
}

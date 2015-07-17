<?php

namespace NhaThieuNhi\Http\Middleware;

use Closure;

class AllowAccessAdminzone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        $response->withCookie(cookie('aaaz', 'y', config('params.admin_manage_time')));

        return $response;
    }
}

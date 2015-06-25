<?php

namespace NhaThieuNhi\Http\Middleware;

use Closure;

class RedirectIfDenyAdminzone
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
    if ($request->cookie('aaaz') != 'y') {
      return redirect('/');
    }

    return $next($request);
  }
}

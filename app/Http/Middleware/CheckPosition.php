<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;

use Closure;

class CheckPosition
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $positions)
    {
        if ($request->user() === null) {
            return new Response(view('error'));
        }
        if ($request->user()->hasAnyPosition(explode('|', $positions))) {
            return $next($request);
        }
        return new Response(view('error'));
    }
}

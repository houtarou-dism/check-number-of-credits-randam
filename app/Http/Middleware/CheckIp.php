<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CheckIp
{
    /**
     * IPアドレスを制限するミドルウェア
     *
     * @param Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (! (Str::is('0.0.0.0', $request->ip()) || in_array($request->ip(), config('allow_ip.ip'), true)))
        {
            return abort(404);
        }

        return $next($request);
    }
}

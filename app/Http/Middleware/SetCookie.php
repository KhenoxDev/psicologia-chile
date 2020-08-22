<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class SetCookie
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($request->hasCookie('userCookie')) {
			return $next($request);
		} else {
			$ip = $request->ip();
			$now = Carbon::now();
			$encrypt = Crypt::encryptString($ip . $now);
			$response = $next($request);

			return $response->withCookie(cookie()->forever('userCookie', $encrypt));
		}
	}
}

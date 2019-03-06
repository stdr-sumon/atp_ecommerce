<?php

namespace App\Http\Middleware;

use Closure;

class VerifyUserType {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {

		if ($request->session()->get('loggedUser')->type == "CUSTOMER") {
			return redirect()->route('login.index');
		}
		return $next($request);
	}
}

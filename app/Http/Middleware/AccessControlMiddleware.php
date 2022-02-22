<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AccessControlMiddleware
{
	use AuthorizesRequests; // importado

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd($request->route()->getName());

    	$ignoreResources = config('accesscontrollist')['ignore.resources'];

		if(!in_array($request->route()->getName(), $ignoreResources)) {
			$this->authorize($request->route()->getName());
		}

        return $next($request);
    }
}

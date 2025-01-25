<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RestrictAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $restrictedPaths = [
            'hotels/pay',
            'hotels/success',
        ];

        if (in_array($request->path(), $restrictedPaths)) {
            // Check for valid session data
            if (!session()->has('price')) {
                return response('Forbidden', Response::HTTP_FORBIDDEN);
            }
        }

        return $next($request);
    }
}

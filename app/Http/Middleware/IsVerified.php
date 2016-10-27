<?php

namespace App\Http\Middleware;

use Closure;

class IsVerified
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
	    if( ! $request->user()->verified){
		    return redirect()->action( 'Auth\RegisterController@showValidationSent' );
	    }

        return $next( $request );
    }
}

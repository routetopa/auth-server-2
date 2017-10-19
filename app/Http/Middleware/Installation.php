<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class Installation
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
        $admin_cnt = User::where( 'roles', 'like', '%admin%' )->count();

	    if( $admin_cnt > 0 )
	    {
		    return redirect()->action( 'InstallController@already_installed' );
	    }

        return $next( $request );
    }
}

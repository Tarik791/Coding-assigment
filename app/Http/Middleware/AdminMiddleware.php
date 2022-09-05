<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// We create middleware 
class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        if(Auth::check()){

            // If you are registered like admin
            if(Auth::user()->role_as == '1'){ // 1-Admin & 0= Learner

                return $next($request);

            }else{

                // If Learner is not Admin
                //redirect('/home')->with('status', 'Access Denied! As you are not an Admin');
                abort(403);
            }

        }else{

            // If we are not logged in
            return redirect('/login')->with('status', 'Please Login First');

        }
    }
}

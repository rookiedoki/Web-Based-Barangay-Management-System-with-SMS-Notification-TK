<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkusertype
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
        $userType = array("0");
        if(in_array($request->user()->userType, $userType)){
            return $next($request);
        }
        return redirect()->back();
    }
}

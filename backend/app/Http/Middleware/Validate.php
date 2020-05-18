<?php

namespace App\Http\Middleware;

use Closure;

class Validate
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
        $v = session()->all();
        if(session()->get('session')){
            return $next($request);
        }else{
            //return response()->json(['status'=>false]);
            return response($v);

        }

    }
}

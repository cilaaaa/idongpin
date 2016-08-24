<?php

namespace App\Http\Middleware;

use Closure;

class ProMiddleware
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
        if(isset($request->companyid)&&isset($request->proid)){
            return $next($request);
        }else{
            return redirect()->back();
        }
    }
}

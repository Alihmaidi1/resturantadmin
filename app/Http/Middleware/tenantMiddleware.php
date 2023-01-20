<?php

namespace App\Http\Middleware;

use App\Models\resturant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class tenantMiddleware
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
            $host = $request->host();
            $resturant = resturant::where("domain", $host)->first();
            ($resturant!=null)?changeDatabaseConnection($resturant->database_name):null;
            return $next($request);
    }
}

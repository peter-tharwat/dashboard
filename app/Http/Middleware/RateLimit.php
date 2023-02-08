<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Helpers\UserSystemInfoHelper;
class RateLimit
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


        if(auth()->check())
            \App\Models\User::where('id',auth()->user()->id)->update(['last_activity'=>now()]);        
        $max_per_minute = \App\Models\RateLimit::where('ip',\UserSystemInfoHelper::get_ip())->where('created_at','>=',\Carbon::parse(now())->subMinutes(1)->format('Y-m-d H:i:s'))->orderBy('id','DESC')->count();
        if($max_per_minute>=150)
        abort(403);
        $rate_limit = \MainHelper::rate_limit_insert();
        return $next($request);
    }
}

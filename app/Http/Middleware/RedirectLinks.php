<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
class RedirectLinks
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
        

        if(Schema::hasTable('redirections')){
            $url = str_replace('www.','' , preg_replace("(^https?://)", "", url()->full() ) );
            $redirection = \App\Models\Redirection::where('url','LIKE','%'.$url)->first();
            if($redirection !=null){
                header('Location: ' . $redirection->new_url, true, $redirection->code);
                die();
            }
            
        }

        return $next($request);
    }
}



        

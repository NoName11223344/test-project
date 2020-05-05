<?php

namespace App\Http\Middleware;

use Closure;
use App\Entity\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class CheckLogin
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
        $cookie = $request->cookie('user_email');
        if ($cookie == true){

            $userEmail = Cookie::get('user_email');

            $userCheck =  DB::table('users')->where('email', $userEmail)->exists();

            if(! $userCheck){

                return view('site.default.login');

            }

            $request->session()->put('user_login', $userEmail);
        
        }

        if( $request->session()->has('user_login') ){
            abort(403);
        }
    
       
        $response = $next($request);
            
        return $response;
    }
}

<?php

namespace App\Http\Controllers\Site;

use App\Entity\User;
use App\Entity\Seller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {   
        $cookie = $request->cookie('user_email');

        if ($cookie == true){

            $userEmail = Cookie::get('user_email');

            $userCheck =  User::where('email', $userEmail)->exists();

            if(! $userCheck){
                return view('site.default.login');
            }
            $request->session()->put('user_login', $userEmail);
            return redirect(route('home_page'));
        }

        return view('site.default.login');
    }

    public function homePage(Request $request)
    {   

        if( !$request->session()->has('user_login') ){
            abort(403);
        }
        
        $userEmail = $request->session()->get('user_login', 'default');
        
        $user = User::where('email', $userEmail)
        ->first();
        
        //lấy tất cả user
        $users = User::paginate(15);

        return view('site.default.home',compact('user','users'));
    }
}

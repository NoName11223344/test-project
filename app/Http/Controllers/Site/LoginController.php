<?php

namespace App\Http\Controllers\Site;

use App\Entity\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class LoginController 
{
 
    public function login(Request $request){
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|email',
            'password' => 'required|min:8'
        ],[
            'email.email' => 'Không Tồn tại tài khoản ',
            'password.required' => 'Mật khẩu phải dài hơn 8 ký tự'
        ]);

        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // DB::beginTransaction();
        $user = DB::table('users')->where('email', $request->input('email'))
        // ->where('password', bcrypt($request->input('password')))
        ->first();
         
        if(empty($user)){
            return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
        }
            
        if (Hash::check($request->input('password'), $user->password))
        {

            session_start();
            $_SESSION['user_login'] = $user->email;

            if( $request->has('remember')){
                $minutes = 365 * 24 * 60  ; 
                Cookie::queue(Cookie::make('user_email', $user->email , $minutes));
            }

            return redirect(route('home_page'));

            // $request->session()->put('user_email', $user->email);
            
            // $request->session()->save();

        }

        return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không chính xác');
        
    }

    public function logout(){

        unset($_SESSION['user_login']);
        Cookie::queue(Cookie::forget('user_email'));
        return redirect('/');

    }


}

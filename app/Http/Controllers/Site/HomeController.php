<?php

namespace App\Http\Controllers\Site;

use App\Entity\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class HomeController 
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

            $userCheck =  DB::table('users')->where('email', $userEmail)->exists();

            if(! $userCheck){
                return view('site.default.login');
            }
            $_SESSION['user_login'] = $userEmail;

            return redirect(route('home_page'));
        }

        return view('site.default.login');
    }

    public function homePage()
    {   
        $userEmail = $_SESSION['user_login'] ;
        $user = DB::table('users')->where('email', $userEmail)
        ->first();
        
        //lấy tất cả user
        $users = DB::table('users')
        ->paginate(15);

        return view('site.default.home',compact('user','users'));
    }

    public function registerSeler()
    {   
        $userEmail = $_SESSION['user_login'] ;
        $user = DB::table('users')->where('email', $userEmail)
        ->first();

        return view('site.default.register_seler',compact('user'));
    }


    public function postRegisterSeler(Request $request)
    {   
        $seller = DB::table('sellers')
        ->insertGetId([
            'seller_name' => $request->input('seller_name'),
            'address' => $request->input('address'),
            'user_id' => $request->input('user_id'),
            'status' => 0, 
            'created_at' => new \DateTime()
        ]);
    
        return redirect()->back()->with('messageSucess','Đăng ký thành công, Yêu cầu của bạn đã được chuyển cho admin xét duyệt');

    }
    
    public function updateRegisterSeler(Request $request)
    {   

        $seller = DB::table('sellers')->where('user_id', $request->input('user_id'))
        ->update([
            'seller_name' => $request->input('seller_name'),
            'address' => $request->input('address'),
            'status' => 0
        ]);
    
        return redirect()->back()->with('messageSucess','Gửi lại yêu cầu xét duyệt thành công');

    }

    public function removeUser(Request $request)
    {   
        $seller = DB::table('users')->where('id', $request->input('id'))
        ->delete();

        $seller = DB::table('sellers')->where('user_id', $request->input('id'))
        ->delete();
        

    }

    public function listRegisterSeller(Request $request)
    {   
        $userEmail = $_SESSION['user_login'] ;
        $user = DB::table('users')->where('email', $userEmail)
        ->first();

        $sellers =  DB::table('sellers')
        ->leftJoin('users', 'users.id', 'sellers.user_id')
        ->select([
            'sellers.*',
            'users.name as user_name',
            'users.email as user_email',
        ])
        ->where('sellers.status', 0)
        ->paginate(15);

        return view('site.default.list_register_seller', compact('user', 'sellers'));

    }

    public function submitRegisterSeller(Request $request)
    {   
        $seller = DB::table('sellers')
        ->where('seller_id', $request->input('id'))
        ->update([
            'status' => 1
        ]);
        
        $user = DB::table('users')
        ->where('id', $request->input('user_id'))
        ->update([
            'role' => 2
        ]);
    }

    public function rejectRegisterSeller(Request $request)
    {   
        $seller = DB::table('sellers')
        ->where('seller_id', $request->input('id'))
        ->update([
            'status' => 2
        ]);
     
    }


    public function listSeller(Request $request)
    {   
        $userEmail = $_SESSION['user_login'] ;
        $user = DB::table('users')->where('email', $userEmail)
        ->first();

        $sellers =  DB::table('sellers')
        ->leftJoin('users', 'users.id', 'sellers.user_id')
        ->select([
            'sellers.*',
            'users.name as user_name',
            'users.email as user_email',
        ])

        ->where('sellers.status', 1)
        ->paginate(15);

        return view('site.default.list_seller', compact('user', 'sellers'));

    }
    





}

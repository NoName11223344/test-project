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


class SellerController extends Controller
{
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function registerSeler(Request $request)
    {   
        $userEmail = $request->session()->get('user_login', 'default');
        $user = User::where('email', $userEmail)
        ->first();

        return view('site.seller.register_seller',compact('user'));
    }


    public function postRegisterSeler(Request $request)
    {   
        $seller = Seller::insertGetId([
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
        $seller = Seller::where('user_id', $request->input('user_id'))
        ->update([
            'seller_name' => $request->input('seller_name'),
            'address' => $request->input('address'),
            'status' => 0
        ]);
    
        return redirect()->back()->with('messageSucess','Gửi lại yêu cầu xét duyệt thành công');

    }

    public function removeUser(Request $request)
    {   
        $seller = User::where('id', $request->input('id'))
        ->delete();

        $seller = Seller::where('user_id', $request->input('id'))
        ->delete();
    }

    public function listRegisterSeller(Request $request)
    {   
        $userEmail = $request->session()->get('user_login', 'default');
        $user = User::where('email', $userEmail)
        ->first();

        $sellers =  Seller::leftJoin('users', 'users.id', 'sellers.user_id')
        ->select([
            'sellers.*',
            'users.name as user_name',
            'users.email as user_email',
        ])
        ->where('sellers.status', 0)
        ->paginate(15);

        return view('site.seller.list_register_seller', compact('user', 'sellers'));

    }

    public function submitRegisterSeller(Request $request)
    {   
        $seller = Seller::where('seller_id', $request->input('id'))
        ->update([
            'status' => 1
        ]);
        
        $user = User::where('id', $request->input('user_id'))
        ->update([
            'role' => 2
        ]);
    }

    public function rejectRegisterSeller(Request $request)
    {   
        $seller = Seller::where('seller_id', $request->input('id'))
        ->update([
            'status' => 2
        ]);
     
    }


    public function listSeller(Request $request)
    {   
        $userEmail =  $request->session()->get('user_login', 'default');
        $user = User::where('email', $userEmail)
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

        return view('site.seller.list_seller', compact('user', 'sellers'));

    }
    
}

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


class UserController extends Controller
{
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function removeUser(Request $request)
    {   
        $seller = User::where('id', $request->input('id'))
        ->delete();

        $seller = Seller::where('user_id', $request->input('id'))
        ->delete();
    }

}

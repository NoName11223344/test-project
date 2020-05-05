<?php

namespace App\Http\Controllers\Site;

use App\Entity\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.default.register');
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [ 
            'email' => 'required|unique:users|email',
            'name' => 'required|max:255',
            'password' => 'required|min:8',
            're_password' => 'required|same:password',
        ],[
            'email.unique' => 'Email đã tồn tại',
            'email.required' => 'Email Không được trống',
            'name.required' => 'Tên Không được trống',
            'password.required' => 'Mật Khẩu Không được trống',
            're_password.required' => 'Cần xác nhận mật khẩu ',
            'password.min' => 'Mật khẩu cần dài hơn 8 ký tự',
            're_password.password' => 'Mật khẩu không khớp',

        ]);

        if($validator->fails()){
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // DB::beginTransaction();
            $user = User::insertGetId([
                'email' => $request->input('email'),
                'name' => $request->input('name'),
                'password' => bcrypt($request->input('password')),
                'role' => 1 ,
                'created_at' => new \DateTime()

            ]);
            
        // DB::commit();

        return redirect(route('home'))->with('registerSuccess', 'Đăng ký thành công, Xin mời đăng nhập');
    }


}

<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;

class User 
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'id',
        'name',
        'email',
        'role',
        'email_verified_at',
        'password',     
        'remember_token',
        'created_at',
        'updated_at'
    ];

    public static function getAll(){
        $user = DB::table('users')->paginate(15);
        return $user;
    }

    
}

<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Log;

class User extends Model
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
        $user = static::paginate(15);
        return $user;
    }

    
}

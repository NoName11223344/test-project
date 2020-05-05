<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Seller extends Model
{
    protected $table = 'sellers';
    protected $primaryKey = 'seller_id';

    protected $fillable = [
        'seller_id',
        'seller_name',
        'address', 
        'status', 
        'user_id',
        'created_at',
        'updated_at'
    ];

    public static function checkSeller($userId){

        $seller = static::where('user_id', $userId)->first();
        return $seller; 

    }

    
}

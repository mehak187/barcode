<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Member as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
class Member extends Authenticatable
{
    use HasApiTokens, HasFactory;
    protected $fillable = [
       'gym_id',
       'name',
       'email',
       'contact',
       'address1',
       'address2',
       'city',
       'state',
       'zip',
       'barcode',
       'photo',
       'password'
   ];
   public function getPhotoAttribute($value)
    {   
        if($value==null){
            return asset('myimgs/member/avatar.png');
        }
        else{
            return asset('myimgs/member/'.$value);
        }
    }
}

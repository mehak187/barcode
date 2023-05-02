<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    protected $fillable=['title','image'];
    public function getImageAttribute($value)
    {   
        if($value==null){
            return asset('myimgs/member/avatar.png');
        }
        else{
            return asset('myimgs/'.$value);
        }
    }
}

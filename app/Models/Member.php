<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
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
       'photo'
   ];
}

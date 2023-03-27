<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phoneInstruction extends Model
{
    use HasFactory;
    protected $fillable = [
        'phoneid',
        'msg'
    ];
}

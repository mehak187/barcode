<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mailInstruction extends Model
{
    use HasFactory;
    protected $fillable = [
        'mailid',
        'msg',
        'gym_id'
    ];
}

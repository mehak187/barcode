<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymBarcode extends Model
{
    use HasFactory;
    protected $fillable = [
        'gym_id',
        'branches',
        'from',
        'to'
   ];
}

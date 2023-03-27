<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestBarcode extends Model
{
    use HasFactory;
    protected $fillable = [
        'gym_id',
        'barcodes',
        'date'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'gym_id',
        'mon_st_time',
        'mon_end_time',
        'mon_status',
        'tue_st_time',
        'tue_end_time',
        'tue_status',
        'wed_st_time',
        'wed_end_time',
        'wed_status',
        'thur_st_time',
        'thur_end_time',
        'thur_status',
        'fri_st_time',
        'fri_end_time',
        'fri_status',
        'sat_st_time',
        'sat_end_time',
        'sat_status',
        'sun_st_time',
        'sun_end_time',
        'sun_status',
    ];
}

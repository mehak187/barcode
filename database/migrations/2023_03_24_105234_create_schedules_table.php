<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gym_id');
            $table->string('mon_st_time');
            $table->string('mon_end_time');
            $table->string('mon_status');
            $table->string('tue_st_time');
            $table->string('tue_end_time');
            $table->string('tue_status');
            $table->string('wed_st_time');
            $table->string('wed_end_time');
            $table->string('wed_status');
            $table->string('thur_st_time');
            $table->string('thur_end_time');
            $table->string('thur_status');
            $table->string('fri_st_time');
            $table->string('fri_end_time');
            $table->string('fri_status');
            $table->string('sat_st_time');
            $table->string('sat_end_time');
            $table->string('sat_status');
            $table->string('sun_st_time');
            $table->string('sun_end_time');
            $table->string('sun_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};

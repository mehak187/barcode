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
        Schema::create('gym_barcodes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gym_id');
            $table->integer('branches');
            $table->bigInteger('from');
            $table->bigInteger('to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gym_barcodes');
    }
};

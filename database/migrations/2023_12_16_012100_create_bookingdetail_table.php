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
        Schema::create('bookingdetail', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->integer('price');
            $table->date('check_in');
            $table->date('check_out');
            $table->unsignedBigInteger('room_id');
            $table
              ->foreign('room_id')
              ->references('id')
              ->on('room');

            $table->unsignedBigInteger('user_id');
            $table
            ->foreign('user_id')
            ->references('id')
            ->on('users');

            $table->unsignedBigInteger('booking_id');
            $table
                ->foreign('booking_id')
                ->references('id')
                ->on('booking');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookingdetail');
    }
};

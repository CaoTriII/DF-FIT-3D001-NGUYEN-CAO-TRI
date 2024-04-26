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
        Schema::create('room', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->string('description');
            $table->string('content');
            $table->string('image');
            $table->tinyInteger('status');
            $table->tinyInteger('featured');
            $table->tinyInteger('room_quantity_status');
            $table->Integer('room_quantity');
            $table->unsignedBigInteger('user_id');
            $table
              ->foreign('user_id')
              ->references('id')
              ->on('users');
            $table->unsignedBigInteger('hotel_id');
            $table
              ->foreign('hotel_id')
              ->references('id')
              ->on('hotel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room');
    }
};

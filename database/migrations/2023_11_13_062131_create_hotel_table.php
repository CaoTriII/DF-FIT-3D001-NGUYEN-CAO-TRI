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
        Schema::create('hotel', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('status');
            $table->string('address');
            $table->string('image');
            $table->tinyInteger('star_number');
            $table->string('description');
            $table->integer('room_quantity');
            $table->unsignedBigInteger('district_id');
            $table
              ->foreign('district_id')
              ->references('id')
              ->on('district');
              $table->unsignedBigInteger('user_id');
              $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->tinyInteger('user_id');
            $table->string('service');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel');
    }
};

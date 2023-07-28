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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer("count");
            $table->bigInteger('hotel_id')->unsigned()->nullable();
            $table->bigInteger('room_type_id')->unsigned()->nullable();
            $table->bigInteger('accommodation_id')->unsigned()->nullable();

            $table->foreign('hotel_id')
                    ->references('id')
                    ->on('hotels')
                    ->onCascade('delete');
            $table->foreign('room_type_id')
                    ->references('id')
                    ->on('room_types')
                    ->onCascade('delete');
            $table->foreign('accommodation_id')
                    ->references('id')
                    ->on('accommodations')
                    ->onCascade('delete');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};

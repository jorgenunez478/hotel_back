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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("address");
            $table->string("nit");
            $table->integer("number_rooms");
            $table->bigInteger('city_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('city_id')
                    ->references('id')
                    ->on('cities')
                    ->onCascade('delete');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};

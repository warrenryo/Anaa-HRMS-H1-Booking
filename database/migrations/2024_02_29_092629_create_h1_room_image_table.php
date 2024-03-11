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
        Schema::create('hrms_h1_room_image', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_types_id');
            $table->string('images');
            $table->foreign('room_types_id')->references('id')->on('hrms_h1_room_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrms_h1_room_image');
    }
};

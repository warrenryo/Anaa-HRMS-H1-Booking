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
        Schema::create('hrms_r4_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->integer('room_no');
            $table->string('name')->nullable();
            $table->string('how_room');
            $table->string('how_service');
            $table->TEXT('reviews')->nullable();
            $table->string('status');
            $table->foreign('room_id')->references('id')->on('hrms_h1_room_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrms_r4_reviews');
    }
};

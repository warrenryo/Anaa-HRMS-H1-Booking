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
        Schema::create('hrms_h1_guest_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('client_password');
            $table->integer('adult_no');
            $table->integer('child_no');
            $table->bigInteger('contact_no');
            $table->string('guest_id')->nullable();
            $table->string('room_type');
            $table->string('room_number');
            $table->string('room_service');
            $table->TEXT('special_request')->nullable();
            $table->string('per_stay')->nullable();
            $table->string('checkin')->nullable();
            $table->string('checkout')->nullable();
            $table->integer('price');
            $table->string('status');
            $table->foreign('user_id')->references('id')->on('hrms_users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrms_h1_guest_details');
    }
};

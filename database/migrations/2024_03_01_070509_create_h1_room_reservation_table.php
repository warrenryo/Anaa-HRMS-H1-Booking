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
        Schema::create('hrms_h1_room_reservation', function (Blueprint $table) {
            $table->id();
            $table->integer('ReservationID');
            $table->unsignedBigInteger('RoomID');
            $table->foreign('RoomID')->references('id')->on('hrms_h1_room_details')->onDelete('cascade');
            $table->date('CheckInDate');
            $table->date('CheckOutDate');
            $table->string('GuestName');
            $table->string('ContactInfo');
            $table->decimal('TotalAmount', 10, 2);
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrms_h1_room_reservation');
    }
};

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
        Schema::create('hrms_h1_room_service', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('RoomID');
            $table->foreign('RoomID')->references('id')->on('hrms_h1_room_details')-> onDelete('cascade');
            $table->string('ServiceName');
            $table->text('Description')->nullable();
            $table->decimal('Price', 10, 2);
            $table->timestamps();
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrms_h1_room_service');
    }
};

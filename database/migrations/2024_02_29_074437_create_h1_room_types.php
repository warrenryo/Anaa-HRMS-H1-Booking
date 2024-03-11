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
        Schema::create('hrms_h1_room_types', function (Blueprint $table) {
            $table->id();
            $table->integer('RoomTypeID');
            $table->string('RoomType');
            $table->string('RoomNumber');
            $table->string('RoomStatus')->default('Vacant');
            $table->integer('MaxGuests');
            $table->text('Description')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrms_h1_room_types');
    }
};

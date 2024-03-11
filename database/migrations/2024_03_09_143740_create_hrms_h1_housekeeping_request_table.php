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
        Schema::create('hrms_h1_housekeeping_request', function (Blueprint $table) {
            $table->id();
            $table->string('request_code');
            $table->string('room_no');
            $table->string('housekeeping_request');
            $table->string('items_services');
            $table->longText('additional_request')->nullable();
            $table->string('time_issue');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hrms_h1_housekeeping_request');
    }
};

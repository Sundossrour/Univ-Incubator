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
        Schema::create('college_events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('dayName');
            $table->string('eventDate');
            $table->string('eventTime');
            $table->string('details');
            $table->tinyInteger('status');
            $table->foreignId('created_by')->references('id')->on('l_admins');
            $table->foreignId('univCollegeID')->references('id')->on('university_colleges');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('college_events');
    }
};

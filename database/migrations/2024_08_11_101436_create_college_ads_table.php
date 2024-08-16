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
        Schema::create('college_ads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('body');
            $table->string('details');
            $table->string('img')->nullable();
            $table->foreignId('univCollegeID')->references('id')->on('university_colleges');
            $table->foreignId('created_by')->references('id')->on('l_admins');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('college_ads');
    }
};

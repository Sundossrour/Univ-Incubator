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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('phone');
            $table->tinyInteger('status');
            $table->tinyInteger('type');
            $table->string('img')->nullable();
            $table->foreignId('address_id')->nullable()->references('id')->on('addresses')->cascadeOnDelete();
            $table->foreignId('created_by')->references('id')->on('g_admins');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};

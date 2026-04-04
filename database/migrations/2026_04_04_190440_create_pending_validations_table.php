<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public $withinTransaction = false;
    public function up(): void
    {
        Schema::create('pending_validations', function (Blueprint $table) {
             $table->id();
    $table->foreignId('room_id')->constrained()->onDelete('cascade');
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->string('scanned_otp');
    // 'status' tracks the admin's decision: pending, approved, or rejected
    $table->string('status')->default('pending'); 
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pending_validations');
    }
};

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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->uuid('room_uuid')->unique();
            $table->enum("room_type",["unstructured","structured"]);
            $table->macAddress("wifi_bssid");
            $table->string("metadata")->nullable();
            $table->enum("verification_type",["qrcode","fingerprint","device_check","otp"])->nullable();
            $table->foreignId("created_by")->constrained("users","id")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("location");
            $table->string("description")->nullable();
            $table->timestamps();
            $table->boolean("delete_status")->default(0);
        });

        Schema::create('room_memberships', function (Blueprint $table){
            $table->id();
            $table->foreignId("user_id")->constrained("users","id")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("room_id")->references("id")->on("rooms")->cascadeOnDelete()->cascadeOnUpdate();
            $table->json("metadata");
            $table->timestampTz("joined_at");
            $table->boolean("delete_status")->default(0);
        });

        Schema::create('qr_codes', function (Blueprint $table){
            $table->id();
            $table->string("code");
            $table->foreignId("room_id")->references("id")->on("rooms")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("generated_for")->constrained("users")->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamp("expires_at");
            $table->timestamp("created_at");
        });

        // Schema::create('nonces', function (Blueprint $table){
        //     $table->id();
        //     $table->foreignId("user_id")->constrained("users","id")->cascadeOnDelete()->cascadeOnUpdate();
        //     $table->foreignId("room_id")->references("id")->on("rooms")->cascadeOnDelete()->cascadeOnUpdate();
        //     $table->string("value");
        //     $table->boolean("used")->default(0);
        // });



        Schema::create('time_windows', function (Blueprint $table){
            $table->id();
            $table->string("name");
            $table->foreignId("room_id")->references("id")->on("rooms")->cascadeOnDelete()->cascadeOnUpdate();
            $table->string("day");
            $table->timeTz("start_time");
            $table->timeTz("end_time");
            $table->timestamps();
            $table->boolean("delete_status")->default(0);
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
        Schema::dropIfExists("Qr_codes");
        Schema::dropIfExists("room_memberships");
        Schema::dropIfExists("time_windows");
        // Schema::dropIfExists("nonces");
    }
};

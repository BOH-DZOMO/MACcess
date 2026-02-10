<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public $withinTransaction = false;
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->references("id")->on("users")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("room_id")->references("id")->on("rooms")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("device_id")->references("id")->on("devices")->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId("time_window")->constrained("time_windows","id")->cascadeOnDelete()->cascadeOnUpdate();;
            $table->enum("status", ["early","late"]);
            $table->timestampTz("joined_at");
        
            $table->timestamps();
            $table->boolean("delete_status")->default(0);
        });

        // $hasPostgis = DB::select("SELECT 'postgis'::regclass");

        // Schema::create('geofences', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name', 100);
        //     $table->string('type');
        //     $table->foreignId("room_id")->constrained("rooms","id");
        //     $table->timestamps();
        // });

        // if (!empty($hasPostgis)) {
        //     // Add the PostGIS geometry column for flexible shapes (polygons, circles, etc.)
        //     DB::statement('ALTER TABLE geofences ADD COLUMN geom geometry(Geometry, 4326)');
        //     // Add a spatial index to the geometry column for fast lookups
        //     // DB::statement('CREATE INDEX geofences_geom_gix ON geofences USING GIST (geom)');
        // }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};

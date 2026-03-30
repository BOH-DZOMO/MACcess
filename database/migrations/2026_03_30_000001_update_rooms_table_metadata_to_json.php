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
        // First drop the old column (some DBs like SQLite struggle with change())
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('metadata');
        });

        // Add it back as JSON
        Schema::table('rooms', function (Blueprint $table) {
            $table->json('metadata')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('metadata');
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->string('metadata')->nullable();
        });
    }
};

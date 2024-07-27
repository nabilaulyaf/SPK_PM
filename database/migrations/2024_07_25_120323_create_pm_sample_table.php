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
        Schema::create('pm_sample', function (Blueprint $table) {
            $table->unsignedInteger('id_sample')->primary();
            $table->unsignedTinyInteger('id_pelamar');
            $table->unsignedTinyInteger('id_faktor');
            $table->unsignedTinyInteger('value');
            $table->engine = 'MyISAM';
            $table->charset = 'utf8mb4';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pm_sample');
    }
};

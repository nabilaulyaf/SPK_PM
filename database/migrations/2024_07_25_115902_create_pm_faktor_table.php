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
        Schema::create('pm_faktor', function (Blueprint $table) {
            $table->tinyInteger('id_faktor', false, true)->primary();
            $table->tinyInteger('id_aspek', false, true)->unsigned();
            $table->string('faktor', 30);
            $table->tinyInteger('target');
            $table->enum('type', ['core', 'secondary'])->nullable();
            $table->engine = 'MyISAM';
            $table->charset = 'utf8mb4';
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pm_faktor');
    }
};

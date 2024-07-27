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
        Schema::create('pm_aspek', function (Blueprint $table) {
            $table->tinyInteger('id_aspek', false, true)->unsigned()->primary();
            $table->string('aspek', 100);
            $table->float('prosentase');
            $table->float('bobot_core');
            $table->float('bobot_secondary');
            $table->engine = 'MyISAM';
            $table->charset = 'utf8mb4';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pm_aspek');
    }
};

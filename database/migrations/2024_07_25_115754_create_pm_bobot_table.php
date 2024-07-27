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
        Schema::create('pm_bobot', function (Blueprint $table) {
            $table->tinyInteger('selisih');
            $table->float('bobot');
            $table->string('keterangan', 100);
            $table->engine = 'MyISAM';
            $table->charset = 'utf8mb4';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pm_bobot');
    }
};

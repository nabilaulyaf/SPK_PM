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
        Schema::create('master_pelamar', function (Blueprint $table) {
            $table->integer('id_pelamar')->primary();
            $table->string('nama_pelamar', 50);
            $table->string('no_hp', 12);
            $table->string('email', 50);
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_pelamar');
    }
};

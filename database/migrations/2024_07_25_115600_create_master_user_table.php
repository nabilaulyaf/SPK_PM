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
        Schema::create('master_user', function (Blueprint $table) {
            $table->integer('id_user')->primary();
            $table->string('username', 30);
            $table->string('nama', 100);
            $table->string('password', 50);
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_user');
    }
};

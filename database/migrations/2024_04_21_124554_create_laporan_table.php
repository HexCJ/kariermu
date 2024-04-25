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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->string('nisn');
            $table->foreign('nisn')->references('nisn')->on('users')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('jurusan')->nullable();
            $table->enum('status', ['Menganggur', 'Kuliah', 'Bekerja', 'Wirausaha'])->nullable();
            $table->string('tempat_kerja_kuliah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};

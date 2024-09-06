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
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->string('nisn');
            $table->foreign('nisn')->references('nisn')->on('users')->onDelete('cascade');
            $table->string('semester')->nullable();
            $table->foreign('semester')->references('id_semester')->on('semester')->onDelete('cascade');
            $table->string('mata_pelajaran')->nullable();
            $table->foreign('mata_pelajaran')->references('id_mata_pelajaran')->on('mata_pelajaran')->onDelete('cascade');
            $table->integer('nilai')->nullable(); 
            $table->enum('status', ['Pending', 'Tidak Terverifikasi', 'Terverifikasi'])->nullable();
            $table->string('pesan')->nullable();
            $table->string('id_guru')->nullable();
            $table->foreign('id_guru')->references('nip')->on('guru')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_semester');
    }
};

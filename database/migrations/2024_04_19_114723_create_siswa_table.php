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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nisn')->unique();
            $table->foreign('nisn')->references('nisn')->on('users')->onDelete('cascade'); 
            $table->string('name');
            $table->string('email')->unique()->nullable();
            // $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
            $table->string('password');
            // $table->foreign('password')->references('password')->on('users')->onDelete('cascade');
            $table->string('alamat')->nullable();
            $table->string('tahun_lulus')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            $table->enum('status', ['Lulus', 'Belum Lulus'])->default('Belum Lulus')->nullable();
            $table->enum('kelas', ['X', 'XI', 'XII', 'Lulus'])->nullable();
            $table->string('urutan_kelas')->nullable();
            $table->string('jurusan')->nullable();
            $table->foreign('jurusan')->references('id_jurusan')->on('jurusan')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};

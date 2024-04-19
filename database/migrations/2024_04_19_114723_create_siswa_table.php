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
            $table->string('password');
            $table->string('alamat');
            $table->string('tahun_lulus');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('status', ['Lulus', 'Belum Lulus'])->default('Belum Lulus');
            $table->enum('kelas', ['X', 'XI', 'XII', 'Lulus']);
            $table->string('jurusan');
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

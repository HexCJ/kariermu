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
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->string('alamat');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('mata_pelajaran');
            $table->foreign('mata_pelajaran')->references('id_mata_pelajaran')->on('mata_pelajaran')->onDelete('cascade');
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};

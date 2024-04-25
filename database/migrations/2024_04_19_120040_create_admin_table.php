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
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('id_admin')->unique();
            $table->foreign('id_admin')->references('id_admin')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->unique();
            // $table->foreign('email')->references('email')->on('users')->onDelete('cascade');
            $table->string('password')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
            // $table->foreign('password')->references('password')->on('users')->onDelete('cascade');
            $table->string('alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};

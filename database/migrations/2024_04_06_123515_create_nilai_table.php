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
        Schema::create('nilai_semester', function (Blueprint $table) {
            $table->string('nisn');
            $table->foreign('nisn')->references('nisn')->on('users')->onDelete('cascade');
            $table->integer('nilai_semester_1')->nullable();
            $table->integer('nilai_semester_2')->nullable();
            $table->integer('nilai_semester_3')->nullable();
            $table->integer('nilai_semester_4')->nullable();
            $table->integer('nilai_semester_5')->nullable();
            $table->integer('nilai_semester_6')->nullable();
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

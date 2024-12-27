<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('kategori', ['Sistem Berbasis Komputer', 'Mekatronika', 'Sistem Tertanam']);
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->string('code')->nullable();
            $table->integer('harga');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

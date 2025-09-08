<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');       // Judul menu
            $table->string('description'); // Deskripsi
            $table->string('image_path');  // Path foto
            $table->enum('type', ['carousel', 'special']); // carousel = slide utama, special = menu spesial kami
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('menus');
    }
};

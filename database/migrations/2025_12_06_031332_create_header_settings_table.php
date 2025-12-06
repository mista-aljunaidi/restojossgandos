<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('header_settings', function (Blueprint $table) {
            $table->id();
            $table->enum('video_type', ['youtube', 'file'])->default('youtube');
            $table->string('youtube_id')->nullable(); // Simpan ID Youtube
            $table->string('video_path')->nullable(); // Simpan path file upload
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('header_settings');
    }
};

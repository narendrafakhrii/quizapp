<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('learns', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('slide_type', ['material', 'quiz'])->default('material');
            $table->integer('slide_number')->default(1);
            $table->longText('content')->nullable();
            $table->string('learn_group'); // untuk mengelompokkan slide yang sama
            $table->timestamps();
            
            // Index untuk performa
            $table->index(['learn_group', 'slide_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learns');
    }
};
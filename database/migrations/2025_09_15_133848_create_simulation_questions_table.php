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
        Schema::create('simulation_questions', function (Blueprint $table) {
            $table->id();
            $table->text('question'); // isi pertanyaan atau judul passage
            $table->enum('type', ['option', 'true_false', 'multiple', 'text', 'passage'])
                  ->default('option'); // tipe soal
            $table->string('subject')->nullable(); 
            $table->foreignId('passage_id')->nullable()->constrained('passages')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simulation_questions');
    }
};

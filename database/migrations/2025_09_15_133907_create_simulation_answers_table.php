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
        Schema::create('simulation_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('simulation_question_id')->constrained()->onDelete('cascade');

            $table->string('option', 2)->nullable(); 
            $table->string('text')->nullable(); 
            $table->boolean('is_correct')->default(false); // jawaban benar/tidak

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simulation_answers');
    }
};

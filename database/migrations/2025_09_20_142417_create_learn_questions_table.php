<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('learn_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('learn_id')->constrained('learns')->onDelete('cascade');
            $table->text('question_text');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learn_questions');
    }
};

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
        Schema::create('passages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();           // Judul passage
            $table->string('type')->default('paragraph'); // paragraph, table, two_text, etc
            $table->json('content');                       // Konten dalam format JSON
            $table->string('subject')->nullable();        // Mapel, misal English
            $table->timestamps();

            // Index opsional untuk pencarian lebih cepat
            $table->index('type');
            $table->index('subject');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passages');
    }
};

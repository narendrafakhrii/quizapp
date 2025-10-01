<?php

namespace Database\Seeders;

use App\Models\Learn;
use App\Models\LearnAnswer;
use App\Models\LearnQuestion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LearnSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('learn_answers')->delete();
        DB::table('learn_questions')->delete();
        DB::table('learns')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        /*
        |--------------------------------------------------------------------------
        | Materi & Quiz Grammar
        |--------------------------------------------------------------------------
        */

        // 1. Materi Parts of Speech
        $slide1 = Learn::create([
            'title' => 'Parts of Speech',
            'slide_type' => 'material',
            'slide_number' => 1,
            'content' => 'Dalam bahasa Inggris, kata dibagi menjadi beberapa kelas kata utama:

    • Noun → kata benda (book, car, happiness)
    • Verb → kata kerja (run, eat, is)  
    • Adjective → kata sifat (big, beautiful, smart)
    • Adverb → kata keterangan (quickly, very, well)
    • Pronoun → kata ganti (he, she, it, they)
    • Preposition → kata depan (in, on, at, with)
    • Conjunction → kata sambung (and, but, because)
    • Interjection → kata seru (oh!, wow!)',
            'learn_group' => 'grammar',
        ]);

        // 2. Quiz Parts of Speech
        $slide2 = Learn::create([
            'title' => 'Parts of Speech',
            'slide_type' => 'quiz',
            'slide_number' => 2,
            'content' => null,
            'learn_group' => 'grammar',
        ]);

        $q1 = LearnQuestion::create([
            'learn_id' => $slide2->id,
            'question_text' => 'I have _____ apple.',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q1->id, 'answer_text' => 'a', 'is_correct' => false],
            ['learn_question_id' => $q1->id, 'answer_text' => 'an', 'is_correct' => true],
            ['learn_question_id' => $q1->id, 'answer_text' => 'the', 'is_correct' => false],
            ['learn_question_id' => $q1->id, 'answer_text' => 'some', 'is_correct' => false],
            ['learn_question_id' => $q1->id, 'answer_text' => 'any', 'is_correct' => false],
        ]);

        $q2 = LearnQuestion::create([
            'learn_id' => $slide2->id,
            'question_text' => 'This is _____ book.',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q2->id, 'answer_text' => 'I', 'is_correct' => false],
            ['learn_question_id' => $q2->id, 'answer_text' => 'me', 'is_correct' => false],
            ['learn_question_id' => $q2->id, 'answer_text' => 'my', 'is_correct' => true],
            ['learn_question_id' => $q2->id, 'answer_text' => 'mine', 'is_correct' => false],
            ['learn_question_id' => $q2->id, 'answer_text' => 'ours', 'is_correct' => false],
        ]);

        // 3. Materi Subject-Verb Agreement
        $slide3 = Learn::create([
            'title' => 'Subject-Verb Agreement',
            'slide_type' => 'material',
            'slide_number' => 3,
            'content' => 'Aturan dasar dalam bahasa Inggris:

    • Subjek tunggal → verb + s/es
    Contoh: He plays, She goes

    • Subjek jamak → verb dasar  
    Contoh: They play, We go

    • "I" & "You" → selalu pakai verb dasar
    Contoh: I go, You like

    Penting untuk selalu memperhatikan kesesuaian antara subjek dan kata kerja dalam kalimat.',
            'learn_group' => 'grammar',
        ]);

        // 4. Quiz Subject-Verb Agreement
        $slide4 = Learn::create([
            'title' => 'Subject-Verb Agreement',
            'slide_type' => 'quiz',
            'slide_number' => 4,
            'content' => null,
            'learn_group' => 'grammar',
        ]);

        $q3 = LearnQuestion::create([
            'learn_id' => $slide4->id,
            'question_text' => 'She _____ to school every day.',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q3->id, 'answer_text' => 'go', 'is_correct' => false],
            ['learn_question_id' => $q3->id, 'answer_text' => 'goes', 'is_correct' => true],
            ['learn_question_id' => $q3->id, 'answer_text' => 'going', 'is_correct' => false],
            ['learn_question_id' => $q3->id, 'answer_text' => 'gone', 'is_correct' => false],
            ['learn_question_id' => $q3->id, 'answer_text' => 'will go', 'is_correct' => false],
        ]);

        $q4 = LearnQuestion::create([
            'learn_id' => $slide4->id,
            'question_text' => 'They _____ football every Sunday.',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q4->id, 'answer_text' => 'play', 'is_correct' => true],
            ['learn_question_id' => $q4->id, 'answer_text' => 'plays', 'is_correct' => false],
            ['learn_question_id' => $q4->id, 'answer_text' => 'playing', 'is_correct' => false],
            ['learn_question_id' => $q4->id, 'answer_text' => 'played', 'is_correct' => false],
            ['learn_question_id' => $q4->id, 'answer_text' => 'will play', 'is_correct' => false],
        ]);

        // 5. Materi Tenses
        $slide5 = Learn::create([
            'title' => 'Basic Tenses',
            'slide_type' => 'material',
            'slide_number' => 5,
            'content' => 'Simple Present vs Simple Past:

    • Simple Present: Fakta atau kebiasaan
    Contoh: I study every night

    • Simple Past: Kejadian lampau
    Contoh: I studied yesterday

    Kata kunci:
    • Present → always, usually, every day
    • Past → yesterday, last night, two days ago

    Gunakan tenses yang tepat sesuai dengan waktu kejadian.',
            'learn_group' => 'grammar',
        ]);

        // 6. Quiz Tenses
        $slide6 = Learn::create([
            'title' => 'Basic Tenses',
            'slide_type' => 'quiz',
            'slide_number' => 6,
            'content' => null,
            'learn_group' => 'grammar',
        ]);

        $q5 = LearnQuestion::create([
            'learn_id' => $slide6->id,
            'question_text' => 'I _____ English every day.',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q5->id, 'answer_text' => 'study', 'is_correct' => true],
            ['learn_question_id' => $q5->id, 'answer_text' => 'studied', 'is_correct' => false],
            ['learn_question_id' => $q5->id, 'answer_text' => 'studying', 'is_correct' => false],
            ['learn_question_id' => $q5->id, 'answer_text' => 'studies', 'is_correct' => false],
            ['learn_question_id' => $q5->id, 'answer_text' => 'will study', 'is_correct' => false],
        ]);

        $q6 = LearnQuestion::create([
            'learn_id' => $slide6->id,
            'question_text' => 'Yesterday, I _____ to the park.',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q6->id, 'answer_text' => 'go', 'is_correct' => false],
            ['learn_question_id' => $q6->id, 'answer_text' => 'goes', 'is_correct' => false],
            ['learn_question_id' => $q6->id, 'answer_text' => 'went', 'is_correct' => true],
            ['learn_question_id' => $q6->id, 'answer_text' => 'going', 'is_correct' => false],
            ['learn_question_id' => $q6->id, 'answer_text' => 'will go', 'is_correct' => false],
        ]);

        // 7. Materi Pronouns
        $slide7 = Learn::create([
            'title' => 'Pronouns',
            'slide_type' => 'material',
            'slide_number' => 7,
            'content' => 'Pronoun = kata ganti untuk menghindari pengulangan noun.

Jenis-jenis Pronoun & Kegunaannya:
• Subject Pronoun: I, you, he, she, it, we, they  
  → menggantikan subjek dalam kalimat.  
  Contoh: Anna is smart. She studies hard.  

• Object Pronoun: me, you, him, her, it, us, them  
  → menggantikan objek dalam kalimat.  
  Contoh: I like Anna. I like her.  

• Possessive Adjective: my, your, his, her, its, our, their  
  → menunjukkan kepemilikan, selalu diikuti noun.  
  Contoh: This is my book.  

• Possessive Pronoun: mine, yours, his, hers, ours, theirs  
  → menunjukkan kepemilikan tanpa diikuti noun.  
  Contoh: This book is mine.  

• Reflexive Pronoun: myself, yourself, himself, herself, itself, ourselves, yourselves, themselves  
  → digunakan saat subjek & objek sama.  
  Contoh: I taught myself English.',
            'learn_group' => 'grammar',
        ]);

        // 8. Quiz Pronouns
        $slide8 = Learn::create([
            'title' => 'Pronouns',
            'slide_type' => 'quiz',
            'slide_number' => 8,
            'content' => null,
            'learn_group' => 'grammar',
        ]);

        $q7a = LearnQuestion::create([
            'learn_id' => $slide8->id,
            'question_text' => 'This is my brother. __ is tall.',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q7a->id, 'answer_text' => 'He', 'is_correct' => true],
            ['learn_question_id' => $q7a->id, 'answer_text' => 'Him', 'is_correct' => false],
            ['learn_question_id' => $q7a->id, 'answer_text' => 'His', 'is_correct' => false],
            ['learn_question_id' => $q7a->id, 'answer_text' => 'They', 'is_correct' => false],
            ['learn_question_id' => $q7a->id, 'answer_text' => 'She', 'is_correct' => false],
        ]);

        $q7b = LearnQuestion::create([
            'learn_id' => $slide8->id,
            'question_text' => 'That is my book. It is ___.',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q7b->id, 'answer_text' => 'mine', 'is_correct' => true],
            ['learn_question_id' => $q7b->id, 'answer_text' => 'my', 'is_correct' => false],
            ['learn_question_id' => $q7b->id, 'answer_text' => 'me', 'is_correct' => false],
            ['learn_question_id' => $q7b->id, 'answer_text' => 'her', 'is_correct' => false],
            ['learn_question_id' => $q7b->id, 'answer_text' => 'ours', 'is_correct' => false],
        ]);

        $q7c = LearnQuestion::create([
            'learn_id' => $slide8->id,
            'question_text' => 'I love Anna. I always talk to __.',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q7c->id, 'answer_text' => 'she', 'is_correct' => false],
            ['learn_question_id' => $q7c->id, 'answer_text' => 'her', 'is_correct' => true],
            ['learn_question_id' => $q7c->id, 'answer_text' => 'hers', 'is_correct' => false],
            ['learn_question_id' => $q7c->id, 'answer_text' => 'him', 'is_correct' => false],
            ['learn_question_id' => $q7c->id, 'answer_text' => 'them', 'is_correct' => false],
        ]);

        // 9. Materi Adjectives & Adverbs
        $slide9 = Learn::create([
            'title' => 'Adjectives & Adverbs',
            'slide_type' => 'material',
            'slide_number' => 9,
            'content' => 'Adjectives = kata sifat → menjelaskan noun/pronoun.  
Contoh: She is a smart student. (smart = adjective)  

Fungsi utama Adjective:  
• Menjelaskan noun → a beautiful house  
• Menjadi complement setelah linking verb (be, seem, look) → The food is delicious.  

Adverbs = kata keterangan → menjelaskan verb, adjective, atau adverb lain.  
Contoh: She runs quickly. (quickly = adverb)  

Fungsi utama Adverb:  
• Menjelaskan verb → He speaks slowly.  
• Menjelaskan adjective → It is very hot.  
• Menjelaskan adverb lain → She drives too fast.  

Banyak adverb terbentuk dari adjective + -ly:  
quick → quickly, happy → happily  

⚠️ Pengecualian:  
• good (adj) → well (adv)  
• fast, hard, late → bentuk adjective & adverb sama.',
            'learn_group' => 'grammar',
        ]);

        // 10. Quiz Adjectives & Adverbs
        $slide10 = Learn::create([
            'title' => 'Adjectives & Adverbs',
            'slide_type' => 'quiz',
            'slide_number' => 10,
            'content' => null,
            'learn_group' => 'grammar',
        ]);

        $q9a = LearnQuestion::create([
            'learn_id' => $slide10->id,
            'question_text' => 'He is a __ driver. (careful/carefully)',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q9a->id, 'answer_text' => 'careful', 'is_correct' => true],
            ['learn_question_id' => $q9a->id, 'answer_text' => 'carefully', 'is_correct' => false],
            ['learn_question_id' => $q9a->id, 'answer_text' => 'carefulness', 'is_correct' => false],
            ['learn_question_id' => $q9a->id, 'answer_text' => 'carelessly', 'is_correct' => false],
            ['learn_question_id' => $q9a->id, 'answer_text' => 'care', 'is_correct' => false],
        ]);

        $q9b = LearnQuestion::create([
            'learn_id' => $slide10->id,
            'question_text' => 'She sings __. (beautiful/beautifully)',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q9b->id, 'answer_text' => 'beautiful', 'is_correct' => false],
            ['learn_question_id' => $q9b->id, 'answer_text' => 'beautifully', 'is_correct' => true],
            ['learn_question_id' => $q9b->id, 'answer_text' => 'beauty', 'is_correct' => false],
            ['learn_question_id' => $q9b->id, 'answer_text' => 'beautifulness', 'is_correct' => false],
            ['learn_question_id' => $q9b->id, 'answer_text' => 'beautifuls', 'is_correct' => false],
        ]);

        $q9c = LearnQuestion::create([
            'learn_id' => $slide10->id,
            'question_text' => 'This is a __ day. (happy/happily)',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q9c->id, 'answer_text' => 'happy', 'is_correct' => true],
            ['learn_question_id' => $q9c->id, 'answer_text' => 'happily', 'is_correct' => false],
            ['learn_question_id' => $q9c->id, 'answer_text' => 'happiness', 'is_correct' => false],
            ['learn_question_id' => $q9c->id, 'answer_text' => 'unhappy', 'is_correct' => false],
            ['learn_question_id' => $q9c->id, 'answer_text' => 'happier', 'is_correct' => false],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Materi & Quiz Vocabulary: Vocabulary
        |--------------------------------------------------------------------------
        */

        // 1. Materi Synonym 1
        $slide1 = Learn::create([
            'title' => 'Synonym 1',
            'slide_type' => 'material',
            'slide_number' => 1,
            'content' => "Topik: Synonym (Umum)\n\nSynonym = kata/frasa dengan arti sama atau mirip.\nContoh: big ≈ large, small ≈ tiny, happy ≈ joyful\n\nTips: lihat konteks kalimat sebelum memilih jawaban",
            'learn_group' => 'vocabulary',
        ]);

        // 2. Quiz Synonym 1
        $slide2 = Learn::create([
            'title' => 'Synonym 1',
            'slide_type' => 'quiz',
            'slide_number' => 2,
            'content' => null,
            'learn_group' => 'vocabulary',
        ]);

        $q1 = LearnQuestion::create([
            'learn_id' => $slide2->id,
            'question_text' => 'The house is very big and spacious. The word big can be best replaced by …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q1->id, 'answer_text' => 'A. small', 'is_correct' => false],
            ['learn_question_id' => $q1->id, 'answer_text' => 'B. tiny', 'is_correct' => false],
            ['learn_question_id' => $q1->id, 'answer_text' => 'C. large', 'is_correct' => true],
            ['learn_question_id' => $q1->id, 'answer_text' => 'D. narrow', 'is_correct' => false],
            ['learn_question_id' => $q1->id, 'answer_text' => 'E. short', 'is_correct' => false],
        ]);

        // 3. Materi Synonym 2
        $slide3 = Learn::create([
            'title' => 'Synonym 2',
            'slide_type' => 'material',
            'slide_number' => 3,
            'content' => "Topik: Synonym dalam sifat/karakter\n\nBrave = berani → courageous\nHonest = jujur → truthful\nHappy = senang → glad",
            'learn_group' => 'vocabulary',
        ]);

        // 4. Quiz Synonym 2
        $slide4 = Learn::create([
            'title' => 'Synonym 2',
            'slide_type' => 'quiz',
            'slide_number' => 4,
            'content' => null,
            'learn_group' => 'vocabulary',
        ]);

        $q2 = LearnQuestion::create([
            'learn_id' => $slide4->id,
            'question_text' => 'She was very honest about her mistake. The word honest can be best replaced by …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q2->id, 'answer_text' => 'A. truthful', 'is_correct' => true],
            ['learn_question_id' => $q2->id, 'answer_text' => 'B. deceitful', 'is_correct' => false],
            ['learn_question_id' => $q2->id, 'answer_text' => 'C. lazy', 'is_correct' => false],
            ['learn_question_id' => $q2->id, 'answer_text' => 'D. rude', 'is_correct' => false],
            ['learn_question_id' => $q2->id, 'answer_text' => 'E. shy', 'is_correct' => false],
        ]);

        // 5. Materi Synonym 3
        $slide5 = Learn::create([
            'title' => 'Synonym 3',
            'slide_type' => 'material',
            'slide_number' => 5,
            'content' => "Topik: Synonym dalam keadaan/perasaan\n\nTired = lelah → exhausted\nCold = dingin → chilly\nBright = terang → shiny",
            'learn_group' => 'vocabulary',
        ]);

        // 6. Quiz Synonym 3
        $slide6 = Learn::create([
            'title' => 'Synonym 3',
            'slide_type' => 'quiz',
            'slide_number' => 6,
            'content' => null,
            'learn_group' => 'vocabulary',
        ]);

        $q3 = LearnQuestion::create([
            'learn_id' => $slide6->id,
            'question_text' => 'After running for an hour, he felt very tired. The word tired can be best replaced by …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q3->id, 'answer_text' => 'A. lazy', 'is_correct' => false],
            ['learn_question_id' => $q3->id, 'answer_text' => 'B. exhausted', 'is_correct' => true],
            ['learn_question_id' => $q3->id, 'answer_text' => 'C. sleepy', 'is_correct' => false],
            ['learn_question_id' => $q3->id, 'answer_text' => 'D. weak', 'is_correct' => false],
            ['learn_question_id' => $q3->id, 'answer_text' => 'E. bored', 'is_correct' => false],
        ]);

        // 7. Materi Antonym 1
        $slide7 = Learn::create([
            'title' => 'Antonym 1',
            'slide_type' => 'material',
            'slide_number' => 7,
            'content' => "Topik: Antonym (Umum)\n\nAntonym = kata yang berlawanan arti.\nContoh: hot ↔ cold, big ↔ small, fast ↔ slow",
            'learn_group' => 'vocabulary',
        ]);

        // 8. Quiz Antonym 1
        $slide8 = Learn::create([
            'title' => 'Antonym 1',
            'slide_type' => 'quiz',
            'slide_number' => 8,
            'content' => null,
            'learn_group' => 'vocabulary',
        ]);

        $q4 = LearnQuestion::create([
            'learn_id' => $slide8->id,
            'question_text' => 'The road was very narrow. The antonym of narrow is …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q4->id, 'answer_text' => 'A. tight', 'is_correct' => false],
            ['learn_question_id' => $q4->id, 'answer_text' => 'B. wide', 'is_correct' => true],
            ['learn_question_id' => $q4->id, 'answer_text' => 'C. thin', 'is_correct' => false],
            ['learn_question_id' => $q4->id, 'answer_text' => 'D. short', 'is_correct' => false],
            ['learn_question_id' => $q4->id, 'answer_text' => 'E. small', 'is_correct' => false],
        ]);

        // 9. Materi Antonym 2
        $slide9 = Learn::create([
            'title' => 'Antonym 2',
            'slide_type' => 'material',
            'slide_number' => 9,
            'content' => "Topik: Antonym dalam sifat/karakter\n\nBrave ↔ coward\nKind ↔ cruel\nHonest ↔ dishonest",
            'learn_group' => 'vocabulary',
        ]);

        // 10. Quiz Antonym 2
        $slide10 = Learn::create([
            'title' => 'Antonym 2',
            'slide_type' => 'quiz',
            'slide_number' => 10,
            'content' => null,
            'learn_group' => 'vocabulary',
        ]);

        $q5 = LearnQuestion::create([
            'learn_id' => $slide10->id,
            'question_text' => 'She is a kind teacher who helps everyone. The antonym of kind is …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q5->id, 'answer_text' => 'A. cruel', 'is_correct' => true],
            ['learn_question_id' => $q5->id, 'answer_text' => 'B. caring', 'is_correct' => false],
            ['learn_question_id' => $q5->id, 'answer_text' => 'C. friendly', 'is_correct' => false],
            ['learn_question_id' => $q5->id, 'answer_text' => 'D. polite', 'is_correct' => false],
            ['learn_question_id' => $q5->id, 'answer_text' => 'E. helpful', 'is_correct' => false],
        ]);

        // 11. Materi Antonym 3
        $slide11 = Learn::create([
            'title' => 'Antonym 3',
            'slide_type' => 'material',
            'slide_number' => 11,
            'content' => "Topik: Antonym dalam keadaan/hal umum\n\nEasy ↔ difficult\nLight ↔ heavy\nOld ↔ new",
            'learn_group' => 'vocabulary',
        ]);

        // 12. Quiz Antonym 3
        $slide12 = Learn::create([
            'title' => 'Antonym 3',
            'slide_type' => 'quiz',
            'slide_number' => 12,
            'content' => null,
            'learn_group' => 'vocabulary',
        ]);

        $q6 = LearnQuestion::create([
            'learn_id' => $slide12->id,
            'question_text' => 'The bag was very light. The antonym of light is …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q6->id, 'answer_text' => 'A. soft', 'is_correct' => false],
            ['learn_question_id' => $q6->id, 'answer_text' => 'B. heavy', 'is_correct' => true],
            ['learn_question_id' => $q6->id, 'answer_text' => 'C. small', 'is_correct' => false],
            ['learn_question_id' => $q6->id, 'answer_text' => 'D. weak', 'is_correct' => false],
            ['learn_question_id' => $q6->id, 'answer_text' => 'E. thin', 'is_correct' => false],
        ]);

        // 13. Materi Word Form 1
        $slide13 = Learn::create([
            'title' => 'Word Form 1',
            'slide_type' => 'material',
            'slide_number' => 13,
            'content' => "Topik: Kata kerja → Bentuk kata lain\n\nteach → teacher, teaching, taught\ncreate → creation, creative, creatively\nbuild → builder, building",
            'learn_group' => 'vocabulary',
        ]);

        // 14. Quiz Word Form 1
        $slide14 = Learn::create([
            'title' => 'Word Form 1',
            'slide_type' => 'quiz',
            'slide_number' => 14,
            'content' => null,
            'learn_group' => 'vocabulary',
        ]);

        $q7 = LearnQuestion::create([
            'learn_id' => $slide14->id,
            'question_text' => 'She is a very creative student. The word creative comes from the verb …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q7->id, 'answer_text' => 'A. create', 'is_correct' => true],
            ['learn_question_id' => $q7->id, 'answer_text' => 'B. creation', 'is_correct' => false],
            ['learn_question_id' => $q7->id, 'answer_text' => 'C. creatively', 'is_correct' => false],
            ['learn_question_id' => $q7->id, 'answer_text' => 'D. creativity', 'is_correct' => false],
            ['learn_question_id' => $q7->id, 'answer_text' => 'E. built', 'is_correct' => false],
        ]);

        // 15. Materi Word Form 2
        $slide15 = Learn::create([
            'title' => 'Word Form 2',
            'slide_type' => 'material',
            'slide_number' => 15,
            'content' => "Topik: Kata sifat → Bentuk lain\n\nhappy → happiness, happily\ncare → careful, carefully, careless\nbeauty → beautiful, beautifully",
            'learn_group' => 'vocabulary',
        ]);

        // 16. Quiz Word Form 2
        $slide16 = Learn::create([
            'title' => 'Word Form 2',
            'slide_type' => 'quiz',
            'slide_number' => 16,
            'content' => null,
            'learn_group' => 'vocabulary',
        ]);

        $q8 = LearnQuestion::create([
            'learn_id' => $slide16->id,
            'question_text' => 'He solved the problem very carefully. The adjective form of carefully is …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q8->id, 'answer_text' => 'A. careful', 'is_correct' => true],
            ['learn_question_id' => $q8->id, 'answer_text' => 'B. careless', 'is_correct' => false],
            ['learn_question_id' => $q8->id, 'answer_text' => 'C. care', 'is_correct' => false],
            ['learn_question_id' => $q8->id, 'answer_text' => 'D. caring', 'is_correct' => false],
            ['learn_question_id' => $q8->id, 'answer_text' => 'E. created', 'is_correct' => false],
        ]);

        // 17. Materi Word Form 3
        $slide17 = Learn::create([
            'title' => 'Word Form 3',
            'slide_type' => 'material',
            'slide_number' => 17,
            'content' => "Topik: Kata benda → Bentuk kata lain\n\nfriend → friendly, friendship\nteach → teacher, teaching\nhelp → helpful, helpless",
            'learn_group' => 'vocabulary',
        ]);

        // 18. Quiz Word Form 3
        $slide18 = Learn::create([
            'title' => 'Word Form 3',
            'slide_type' => 'quiz',
            'slide_number' => 18,
            'content' => null,
            'learn_group' => 'vocabulary',
        ]);

        $q9 = LearnQuestion::create([
            'learn_id' => $slide18->id,
            'question_text' => 'She is my best friend. The adjective form of friend is …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q9->id, 'answer_text' => 'A. friendly', 'is_correct' => true],
            ['learn_question_id' => $q9->id, 'answer_text' => 'B. friendship', 'is_correct' => false],
            ['learn_question_id' => $q9->id, 'answer_text' => 'C. friends', 'is_correct' => false],
            ['learn_question_id' => $q9->id, 'answer_text' => 'D. help', 'is_correct' => false],
            ['learn_question_id' => $q9->id, 'answer_text' => 'E. helpful', 'is_correct' => false],
        ]);

        // 19. Materi Phrasal Verb 1
        $slide19 = Learn::create([
            'title' => 'Phrasal Verb 1',
            'slide_type' => 'material',
            'slide_number' => 19,
            'content' => "Topik: Phrasal Verb umum\n\nlook after → take care of\ngive up → stop trying\nturn on → switch on",
            'learn_group' => 'vocabulary',
        ]);

        // 20. Quiz Phrasal Verb 1
        $slide20 = Learn::create([
            'title' => 'Phrasal Verb 1',
            'slide_type' => 'quiz',
            'slide_number' => 20,
            'content' => null,
            'learn_group' => 'vocabulary',
        ]);

        $q10 = LearnQuestion::create([
            'learn_id' => $slide20->id,
            'question_text' => 'She has to look after her little brother after school. The phrasal verb look after means …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q10->id, 'answer_text' => 'A. ignore', 'is_correct' => false],
            ['learn_question_id' => $q10->id, 'answer_text' => 'B. take care of', 'is_correct' => true],
            ['learn_question_id' => $q10->id, 'answer_text' => 'C. visit', 'is_correct' => false],
            ['learn_question_id' => $q10->id, 'answer_text' => 'D. call', 'is_correct' => false],
            ['learn_question_id' => $q10->id, 'answer_text' => 'E. find', 'is_correct' => false],
        ]);

        // 21. Materi Phrasal Verb 2
        $slide21 = Learn::create([
            'title' => 'Phrasal Verb 2',
            'slide_type' => 'material',
            'slide_number' => 21,
            'content' => "Topik: Phrasal Verb aktivitas sehari-hari\n\nrun out of → have none left\nput off → delay\npick up → collect",
            'learn_group' => 'vocabulary',
        ]);

        // 22. Quiz Phrasal Verb 2
        $slide22 = Learn::create([
            'title' => 'Phrasal Verb 2',
            'slide_type' => 'quiz',
            'slide_number' => 22,
            'content' => null,
            'learn_group' => 'vocabulary',
        ]);

        $q11 = LearnQuestion::create([
            'learn_id' => $slide22->id,
            'question_text' => 'We ran out of sugar, so we need to buy more. The phrasal verb ran out of means …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q11->id, 'answer_text' => 'A. have plenty', 'is_correct' => false],
            ['learn_question_id' => $q11->id, 'answer_text' => 'B. have none left', 'is_correct' => true],
            ['learn_question_id' => $q11->id, 'answer_text' => 'C. store', 'is_correct' => false],
            ['learn_question_id' => $q11->id, 'answer_text' => 'D. buy', 'is_correct' => false],
            ['learn_question_id' => $q11->id, 'answer_text' => 'E. use', 'is_correct' => false],
        ]);

        // 23. Materi Phrasal Verb 3
        $slide23 = Learn::create([
            'title' => 'Phrasal Verb 3',
            'slide_type' => 'material',
            'slide_number' => 23,
            'content' => "Topik: Phrasal Verb emosional/perasaan\n\nlook forward to → excited about\ncheer up → become happier\ncalm down → become relaxed",
            'learn_group' => 'vocabulary',
        ]);

        // 24. Quiz Phrasal Verb 3
        $slide24 = Learn::create([
            'title' => 'Phrasal Verb 3',
            'slide_type' => 'quiz',
            'slide_number' => 24,
            'content' => null,
            'learn_group' => 'vocabulary',
        ]);

        $q12 = LearnQuestion::create([
            'learn_id' => $slide24->id,
            'question_text' => 'I look forward to the weekend. The phrasal verb look forward to means …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q12->id, 'answer_text' => 'A. ignore', 'is_correct' => false],
            ['learn_question_id' => $q12->id, 'answer_text' => 'B. dislike', 'is_correct' => false],
            ['learn_question_id' => $q12->id, 'answer_text' => 'C. excited about', 'is_correct' => true],
            ['learn_question_id' => $q12->id, 'answer_text' => 'D. worry about', 'is_correct' => false],
            ['learn_question_id' => $q12->id, 'answer_text' => 'E. postpone', 'is_correct' => false],
        ]);

        // 25. Materi Collocation 1
        $slide25 = Learn::create([
            'title' => 'Collocation 1',
            'slide_type' => 'material',
            'slide_number' => 25,
            'content' => "Topik: Collocation umum\n\nmake a decision\nstrong coffee\nheavy rain",
            'learn_group' => 'vocabulary',
        ]);

        // 26. Quiz Collocation 1
        $slide26 = Learn::create([
            'title' => 'Collocation 1',
            'slide_type' => 'quiz',
            'slide_number' => 26,
            'content' => null,
            'learn_group' => 'vocabulary',
        ]);

        $q13 = LearnQuestion::create([
            'learn_id' => $slide26->id,
            'question_text' => 'I need to ___ about my future.',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q13->id, 'answer_text' => 'A. do a decision', 'is_correct' => false],
            ['learn_question_id' => $q13->id, 'answer_text' => 'B. make a decision', 'is_correct' => true],
            ['learn_question_id' => $q13->id, 'answer_text' => 'C. take a decision', 'is_correct' => false],
            ['learn_question_id' => $q13->id, 'answer_text' => 'D. build a decision', 'is_correct' => false],
            ['learn_question_id' => $q13->id, 'answer_text' => 'E. create a decision', 'is_correct' => false],
        ]);

        // 27. Materi Collocation 2
        $slide27 = Learn::create([
            'title' => 'Collocation 2',
            'slide_type' => 'material',
            'slide_number' => 27,
            'content' => "Topik: Collocation aktivitas\n\ntake a break\ndo homework\nfast food",
            'learn_group' => 'vocabulary',
        ]);

        // 28. Quiz Collocation 2
        $slide28 = Learn::create([
            'title' => 'Collocation 2',
            'slide_type' => 'quiz',
            'slide_number' => 28,
            'content' => null,
            'learn_group' => 'vocabulary',
        ]);

        $q14 = LearnQuestion::create([
            'learn_id' => $slide28->id,
            'question_text' => 'She is doing ___ work.',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q14->id, 'answer_text' => 'A. hard', 'is_correct' => true],
            ['learn_question_id' => $q14->id, 'answer_text' => 'B. heavy', 'is_correct' => false],
            ['learn_question_id' => $q14->id, 'answer_text' => 'C. difficult', 'is_correct' => false],
            ['learn_question_id' => $q14->id, 'answer_text' => 'D. light', 'is_correct' => false],
            ['learn_question_id' => $q14->id, 'answer_text' => 'E. small', 'is_correct' => false],
        ]);

        // 29. Materi Collocation 3
        $slide29 = Learn::create([
            'title' => 'Collocation 3',
            'slide_type' => 'material',
            'slide_number' => 29,
            'content' => "Topik: Collocation emosi/perasaan\n\nfeel happy\nhave fun\npay attention",
            'learn_group' => 'vocabulary',
        ]);

        // 30. Quiz Collocation 3
        $slide30 = Learn::create([
            'title' => 'Collocation 3',
            'slide_type' => 'quiz',
            'slide_number' => 30,
            'content' => null,
            'learn_group' => 'vocabulary',
        ]);

        $q15 = LearnQuestion::create([
            'learn_id' => $slide30->id,
            'question_text' => 'Children must ___ in class to learn well.',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q15->id, 'answer_text' => 'A. pay attention', 'is_correct' => true],
            ['learn_question_id' => $q15->id, 'answer_text' => 'B. have fun', 'is_correct' => false],
            ['learn_question_id' => $q15->id, 'answer_text' => 'C. feel happy', 'is_correct' => false],
            ['learn_question_id' => $q15->id, 'answer_text' => 'D. make noise', 'is_correct' => false],
            ['learn_question_id' => $q15->id, 'answer_text' => 'E. run around', 'is_correct' => false],
        ]);

        // 31. Materi Context Clues 1
        $slide31 = Learn::create([
            'title' => 'Context Clues 1',
            'slide_type' => 'material',
            'slide_number' => 31,
            'content' => "Topik: Menebak arti kata dari kalimat\n\narid → dry\ntedious → boring\nluminous → shining",
            'learn_group' => 'vocabulary',
        ]);

        // 32. Quiz Context Clues 1
        $slide32 = Learn::create([
            'title' => 'Context Clues 1',
            'slide_type' => 'quiz',
            'slide_number' => 32,
            'content' => null,
            'learn_group' => 'vocabulary',
        ]);

        $q16 = LearnQuestion::create([
            'learn_id' => $slide32->id,
            'question_text' => 'The lecture was so tedious that I almost fell asleep. The word tedious means …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q16->id, 'answer_text' => 'A. exciting', 'is_correct' => false],
            ['learn_question_id' => $q16->id, 'answer_text' => 'B. boring', 'is_correct' => true],
            ['learn_question_id' => $q16->id, 'answer_text' => 'C. short', 'is_correct' => false],
            ['learn_question_id' => $q16->id, 'answer_text' => 'D. funny', 'is_correct' => false],
            ['learn_question_id' => $q16->id, 'answer_text' => 'E. long', 'is_correct' => false],
        ]);

        // 33. Materi Context Clues 2
        $slide33 = Learn::create([
            'title' => 'Context Clues 2',
            'slide_type' => 'material',
            'slide_number' => 33,
            'content' => "Topik: Context Clues – lingkungan/alam\n\ndense → thick\nabundant → plenty\nchilly → cold",
            'learn_group' => 'vocabulary',
        ]);

        // 34. Quiz Context Clues 2
        $slide34 = Learn::create([
            'title' => 'Context Clues 2',
            'slide_type' => 'quiz',
            'slide_number' => 34,
            'content' => null,
            'learn_group' => 'vocabulary',
        ]);

        $q17 = LearnQuestion::create([
            'learn_id' => $slide34->id,
            'question_text' => 'The forest was dense with trees. The word dense means …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q17->id, 'answer_text' => 'A. thin', 'is_correct' => false],
            ['learn_question_id' => $q17->id, 'answer_text' => 'B. thick', 'is_correct' => true],
            ['learn_question_id' => $q17->id, 'answer_text' => 'C. light', 'is_correct' => false],
            ['learn_question_id' => $q17->id, 'answer_text' => 'D. open', 'is_correct' => false],
            ['learn_question_id' => $q17->id, 'answer_text' => 'E. short', 'is_correct' => false],
        ]);

        // 35. Materi Context Clues 3
        $slide35 = Learn::create([
            'title' => 'Context Clues 3',
            'slide_type' => 'material',
            'slide_number' => 35,
            'content' => "Topik: Context Clues – sifat/perasaan\n\nexhausted → very tired\ndelighted → very happy\ngloomy → sad",
            'learn_group' => 'vocabulary',
        ]);

        // 36. Quiz Context Clues 3
        $slide36 = Learn::create([
            'title' => 'Context Clues 3',
            'slide_type' => 'quiz',
            'slide_number' => 36,
            'content' => null,
            'learn_group' => 'vocabulary',
        ]);

        $q18 = LearnQuestion::create([
            'learn_id' => $slide36->id,
            'question_text' => 'After a long day, she felt exhausted. The word exhausted means …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q18->id, 'answer_text' => 'A. sleepy', 'is_correct' => false],
            ['learn_question_id' => $q18->id, 'answer_text' => 'B. very tired', 'is_correct' => true],
            ['learn_question_id' => $q18->id, 'answer_text' => 'C. lazy', 'is_correct' => false],
            ['learn_question_id' => $q18->id, 'answer_text' => 'D. weak', 'is_correct' => false],
            ['learn_question_id' => $q18->id, 'answer_text' => 'E. happy', 'is_correct' => false],
        ]);

        /*
|--------------------------------------------------------------------------
| Reading Comprehension: Motivation, Tone, Paraphrase
|--------------------------------------------------------------------------
*/

        // 1. Materi Motivation / Purpose
        $slide1 = Learn::create([
            'title' => 'Motivation / Purpose',
            'slide_type' => 'material',
            'slide_number' => 1,
            'content' => "Definisi: Alasan penulis menulis teks.\n\nTo Inform → memberi fakta\nMount Everest is the highest mountain in the world, standing at 8,848 meters.\n\nTo Persuade → membujuk\nYou should recycle to protect the environment.\n\nTo Entertain → menghibur\nOnce upon a time, a little girl could talk to animals.\n\nTo Explain → memberi instruksi\nHow to make a cup of tea: Boil water, pour it into a cup, add tea leaves.",
            'learn_group' => 'reading-comprehension',
        ]);

        // 2. Kuis Motivation (Mudah)
        $slide2 = Learn::create([
            'title' => 'Motivation (Mudah)',
            'slide_type' => 'quiz',
            'slide_number' => 2,
            'content' => null,
            'learn_group' => 'reading-comprehension',
        ]);

        $q1 = LearnQuestion::create([
            'learn_id' => $slide2->id,
            'question_text' => 'Mount Everest is the highest mountain in the world, standing at 8,848 meters. The purpose of the text is …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q1->id, 'answer_text' => 'A. To entertain', 'is_correct' => false],
            ['learn_question_id' => $q1->id, 'answer_text' => 'B. To explain', 'is_correct' => false],
            ['learn_question_id' => $q1->id, 'answer_text' => 'C. To inform', 'is_correct' => true],
            ['learn_question_id' => $q1->id, 'answer_text' => 'D. To persuade', 'is_correct' => false],
        ]);

        // 3. Kuis Motivation (Sedang)
        $slide3 = Learn::create([
            'title' => 'Motivation (Sedang)',
            'slide_type' => 'quiz',
            'slide_number' => 3,
            'content' => null,
            'learn_group' => 'reading-comprehension',
        ]);

        $q2 = LearnQuestion::create([
            'learn_id' => $slide3->id,
            'question_text' => 'Please join our campaign to save endangered animals. Together, we can protect nature for future generations. The purpose of the text is …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q2->id, 'answer_text' => 'A. To inform', 'is_correct' => false],
            ['learn_question_id' => $q2->id, 'answer_text' => 'B. To persuade', 'is_correct' => true],
            ['learn_question_id' => $q2->id, 'answer_text' => 'C. To entertain', 'is_correct' => false],
            ['learn_question_id' => $q2->id, 'answer_text' => 'D. To explain', 'is_correct' => false],
        ]);

        // 4. Kuis Motivation (UTBK)
        $slide4 = Learn::create([
            'title' => 'Motivation (UTBK)',
            'slide_type' => 'quiz',
            'slide_number' => 4,
            'content' => null,
            'learn_group' => 'reading-comprehension',
        ]);

        $q3 = LearnQuestion::create([
            'learn_id' => $slide4->id,
            'question_text' => 'Once upon a time, there was a village that disappeared every full moon. The people believed it was taken by a magical power. The purpose of the text is …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q3->id, 'answer_text' => 'A. To explain', 'is_correct' => false],
            ['learn_question_id' => $q3->id, 'answer_text' => 'B. To entertain', 'is_correct' => true],
            ['learn_question_id' => $q3->id, 'answer_text' => 'C. To persuade', 'is_correct' => false],
            ['learn_question_id' => $q3->id, 'answer_text' => 'D. To inform', 'is_correct' => false],
        ]);

        // 5. Materi Tone
        $slide5 = Learn::create([
            'title' => 'Tone',
            'slide_type' => 'material',
            'slide_number' => 5,
            'content' => "Definisi: Sikap/perasaan penulis dalam teks.\n\nExcited / Enthusiastic → bersemangat\nI’m thrilled to announce our new project!\n\nNeutral / Informative → netral, memberi info\nThe library opens at 8 a.m. and closes at 5 p.m.\n\nSerious / Concerned → serius, prihatin\nMany species are endangered due to human activities.",
            'learn_group' => 'reading-comprehension',
        ]);

        // 6. Kuis Tone (Mudah)
        $slide6 = Learn::create([
            'title' => 'Tone (Mudah)',
            'slide_type' => 'quiz',
            'slide_number' => 6,
            'content' => null,
            'learn_group' => 'reading-comprehension',
        ]);

        $q4 = LearnQuestion::create([
            'learn_id' => $slide6->id,
            'question_text' => 'The library opens at 8 a.m. and closes at 5 p.m. The tone of the text is …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q4->id, 'answer_text' => 'A. Excited', 'is_correct' => false],
            ['learn_question_id' => $q4->id, 'answer_text' => 'B. Neutral', 'is_correct' => true],
            ['learn_question_id' => $q4->id, 'answer_text' => 'C. Serious', 'is_correct' => false],
            ['learn_question_id' => $q4->id, 'answer_text' => 'D. Humorous', 'is_correct' => false],
        ]);

        // 7. Kuis Tone (Sedang)
        $slide7 = Learn::create([
            'title' => 'Tone (Sedang)',
            'slide_type' => 'quiz',
            'slide_number' => 7,
            'content' => null,
            'learn_group' => 'reading-comprehension',
        ]);

        $q5 = LearnQuestion::create([
            'learn_id' => $slide7->id,
            'question_text' => 'I’m so happy to share this great news with you all. Let’s celebrate our success together! The tone of the text is …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q5->id, 'answer_text' => 'A. Excited', 'is_correct' => true],
            ['learn_question_id' => $q5->id, 'answer_text' => 'B. Neutral', 'is_correct' => false],
            ['learn_question_id' => $q5->id, 'answer_text' => 'C. Serious', 'is_correct' => false],
            ['learn_question_id' => $q5->id, 'answer_text' => 'D. Sad', 'is_correct' => false],
        ]);

        // 8. Kuis Tone (UTBK)
        $slide8 = Learn::create([
            'title' => 'Tone (UTBK)',
            'slide_type' => 'quiz',
            'slide_number' => 8,
            'content' => null,
            'learn_group' => 'reading-comprehension',
        ]);

        $q6 = LearnQuestion::create([
            'learn_id' => $slide8->id,
            'question_text' => 'Many children in remote areas cannot access proper education. This situation requires urgent attention from the government. The tone of the text is …',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q6->id, 'answer_text' => 'A. Humorous', 'is_correct' => false],
            ['learn_question_id' => $q6->id, 'answer_text' => 'B. Excited', 'is_correct' => false],
            ['learn_question_id' => $q6->id, 'answer_text' => 'C. Serious', 'is_correct' => true],
            ['learn_question_id' => $q6->id, 'answer_text' => 'D. Neutral', 'is_correct' => false],
        ]);

        // 9. Materi Paraphrase
        $slide9 = Learn::create([
            'title' => 'Paraphrase',
            'slide_type' => 'material',
            'slide_number' => 9,
            'content' => "Definisi: Menyampaikan ide dengan kata lain tanpa mengubah arti.\n\nContoh:\nRani was very excited about the trip. → Rani felt extremely happy.\n\nThe students completed their homework carefully. → They finished their homework with attention.",
            'learn_group' => 'reading-comprehension',
        ]);

        // 10. Kuis Paraphrase (Mudah)
        $slide10 = Learn::create([
            'title' => 'Paraphrase (Mudah)',
            'slide_type' => 'quiz',
            'slide_number' => 10,
            'content' => null,
            'learn_group' => 'reading-comprehension',
        ]);

        $q7 = LearnQuestion::create([
            'learn_id' => $slide10->id,
            'question_text' => 'Rani was very excited about the trip. Which sentence is a paraphrase?',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q7->id, 'answer_text' => 'A. Rani was angry', 'is_correct' => false],
            ['learn_question_id' => $q7->id, 'answer_text' => 'B. Rani was bored', 'is_correct' => false],
            ['learn_question_id' => $q7->id, 'answer_text' => 'C. Rani felt extremely happy', 'is_correct' => true],
            ['learn_question_id' => $q7->id, 'answer_text' => 'D. Rani was tired', 'is_correct' => false],
        ]);

        // 11. Kuis Paraphrase (Sedang)
        $slide11 = Learn::create([
            'title' => 'Paraphrase (Sedang)',
            'slide_type' => 'quiz',
            'slide_number' => 11,
            'content' => null,
            'learn_group' => 'reading-comprehension',
        ]);

        $q8 = LearnQuestion::create([
            'learn_id' => $slide11->id,
            'question_text' => 'The teacher explained the lesson clearly, so students understood it easily. Which sentence has the same meaning?',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q8->id, 'answer_text' => 'A. The teacher explained in a confusing way', 'is_correct' => false],
            ['learn_question_id' => $q8->id, 'answer_text' => 'B. The teacher gave a simple explanation', 'is_correct' => true],
            ['learn_question_id' => $q8->id, 'answer_text' => 'C. The teacher did not explain', 'is_correct' => false],
            ['learn_question_id' => $q8->id, 'answer_text' => 'D. The students were confused', 'is_correct' => false],
        ]);

        // 12. Kuis Paraphrase (UTBK)
        $slide12 = Learn::create([
            'title' => 'Paraphrase (UTBK)',
            'slide_type' => 'quiz',
            'slide_number' => 12,
            'content' => null,
            'learn_group' => 'reading-comprehension',
        ]);

        $q9 = LearnQuestion::create([
            'learn_id' => $slide12->id,
            'question_text' => 'The company decided to cut costs by reducing unnecessary expenses. Which sentence is closest in meaning?',
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q9->id, 'answer_text' => 'A. The company wanted to increase spending', 'is_correct' => false],
            ['learn_question_id' => $q9->id, 'answer_text' => 'B. The company chose to save money', 'is_correct' => true],
            ['learn_question_id' => $q9->id, 'answer_text' => 'C. The company hired more workers', 'is_correct' => false],
            ['learn_question_id' => $q9->id, 'answer_text' => 'D. The company was losing profits', 'is_correct' => false],
        ]);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Learn;
use App\Models\LearnQuestion;
use App\Models\LearnAnswer;

class LearnSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | SLIDE 1 – Parts of Speech (Materi)
        |--------------------------------------------------------------------------
        */
        $learn1 = Learn::create([
            'title' => 'Parts of Speech',
            'content' => 'Dalam bahasa Inggris, kata dibagi menjadi beberapa kelas kata utama:

• Noun → kata benda (book, car, happiness)
• Verb → kata kerja (run, eat, is)  
• Adjective → kata sifat (big, beautiful, smart)
• Adverb → kata keterangan (quickly, very, well)
• Pronoun → kata ganti (he, she, it, they)
• Preposition → kata depan (in, on, at, with)
• Conjunction → kata sambung (and, but, because)
• Interjection → kata seru (oh!, wow!)'
        ]);

        /*
        |--------------------------------------------------------------------------
        | SLIDE 2 – Parts of Speech Quiz 1
        |--------------------------------------------------------------------------
        */
        $learn2 = Learn::create([
            'title' => 'Parts of Speech',
            'content' => ''
        ]);

        $q1 = LearnQuestion::create(['learn_id' => $learn2->id, 'question_text' => 'I have _____ apple.']);
        LearnAnswer::insert([
            ['learn_question_id' => $q1->id, 'answer_text' => 'an', 'is_correct' => true],
            ['learn_question_id' => $q1->id, 'answer_text' => 'the', 'is_correct' => false],
            ['learn_question_id' => $q1->id, 'answer_text' => 'some', 'is_correct' => false],
            ['learn_question_id' => $q1->id, 'answer_text' => 'any', 'is_correct' => false],
        ]);

        /*
        |--------------------------------------------------------------------------
        | SLIDE 3 – Subject-Verb Agreement (Materi)
        |--------------------------------------------------------------------------
        */
        $learn3 = Learn::create([
            'title' => 'Subject–Verb Agreement',
            'content' => 'Aturan dasar dalam bahasa Inggris:

• Subjek tunggal → verb + s/es
  Contoh: He plays, She goes

• Subjek jamak → verb dasar  
  Contoh: They play, We go

• "I" & "You" → selalu pakai verb dasar
  Contoh: I go, You like

Penting untuk selalu memperhatikan kesesuaian antara subjek dan kata kerja dalam kalimat.'
        ]);

        /*
        |--------------------------------------------------------------------------
        | SLIDE 4 – Subject-Verb Agreement Quiz 1
        |--------------------------------------------------------------------------
        */
        $learn4 = Learn::create([
            'title' => 'Subject–Verb Agreement',
            'content' => ''
        ]);

        $q2 = LearnQuestion::create(['learn_id' => $learn4->id, 'question_text' => 'She ____ to school every day.']);
        LearnAnswer::insert([
            ['learn_question_id' => $q2->id, 'answer_text' => 'go', 'is_correct' => false],
            ['learn_question_id' => $q2->id, 'answer_text' => 'goes', 'is_correct' => true],
            ['learn_question_id' => $q2->id, 'answer_text' => 'going', 'is_correct' => false],
            ['learn_question_id' => $q2->id, 'answer_text' => 'gone', 'is_correct' => false],
        ]);

        /*
        |--------------------------------------------------------------------------
        | SLIDE 5 – Subject-Verb Agreement Quiz 2
        |--------------------------------------------------------------------------
        */
        $learn5 = Learn::create([
            'title' => 'Subject–Verb Agreement',
            'content' => ''
        ]);

        $q3 = LearnQuestion::create(['learn_id' => $learn5->id, 'question_text' => 'They ____ football every Sunday.']);
        LearnAnswer::insert([
            ['learn_question_id' => $q3->id, 'answer_text' => 'play', 'is_correct' => true],
            ['learn_question_id' => $q3->id, 'answer_text' => 'plays', 'is_correct' => false],
            ['learn_question_id' => $q3->id, 'answer_text' => 'playing', 'is_correct' => false],
            ['learn_question_id' => $q3->id, 'answer_text' => 'played', 'is_correct' => false],
        ]);

        /*
        |--------------------------------------------------------------------------
        | SLIDE 6 – Tenses Dasar (Materi)
        |--------------------------------------------------------------------------
        */
        $learn6 = Learn::create([
            'title' => 'Tenses Dasar',
            'content' => 'Simple Present vs Simple Past:

• Simple Present: Fakta atau kebiasaan
  Contoh: I study every night

• Simple Past: Kejadian lampau
  Contoh: I studied yesterday

Kata kunci:
• Present → always, usually, every day
• Past → yesterday, last night, two days ago

Gunakan tenses yang tepat sesuai dengan waktu kejadian.'
        ]);

        /*
        |--------------------------------------------------------------------------
        | SLIDE 7 – Tenses Quiz 1
        |--------------------------------------------------------------------------
        */
        $learn7 = Learn::create([
            'title' => 'Tenses Dasar',
            'content' => ''
        ]);

        $q4 = LearnQuestion::create(['learn_id' => $learn7->id, 'question_text' => 'I ____ English every day.']);
        LearnAnswer::insert([
            ['learn_question_id' => $q4->id, 'answer_text' => 'study', 'is_correct' => true],
            ['learn_question_id' => $q4->id, 'answer_text' => 'studied', 'is_correct' => false],
            ['learn_question_id' => $q4->id, 'answer_text' => 'studying', 'is_correct' => false],
            ['learn_question_id' => $q4->id, 'answer_text' => 'studies', 'is_correct' => false],
        ]);

        /*
        |--------------------------------------------------------------------------
        | SLIDE 8 – Pronouns (Materi)
        |--------------------------------------------------------------------------
        */
        $learn8 = Learn::create([
            'title' => 'Pronouns',
            'content' => 'Jenis-jenis pronoun dalam bahasa Inggris:

• Subject Pronoun: I, you, he, she, it, we, they
• Object Pronoun: me, you, him, her, it, us, them  
• Possessive Adjective: my, your, his, her, its, our, their
• Possessive Pronoun: mine, yours, his, hers, ours, theirs

Gunakan pronoun yang tepat sesuai dengan fungsinya dalam kalimat.'
        ]);

        /*
        |--------------------------------------------------------------------------
        | SLIDE 9 – Pronouns Quiz 1
        |--------------------------------------------------------------------------
        */
        $learn9 = Learn::create([
            'title' => 'Pronouns',
            'content' => ''
        ]);

        $q5 = LearnQuestion::create(['learn_id' => $learn9->id, 'question_text' => 'This is my brother. ____ is tall.']);
        LearnAnswer::insert([
            ['learn_question_id' => $q5->id, 'answer_text' => 'He', 'is_correct' => true],
            ['learn_question_id' => $q5->id, 'answer_text' => 'Him', 'is_correct' => false],
            ['learn_question_id' => $q5->id, 'answer_text' => 'His', 'is_correct' => false],
            ['learn_question_id' => $q5->id, 'answer_text' => 'Her', 'is_correct' => false],
        ]);

        /*
        |--------------------------------------------------------------------------
        | SLIDE 10 – Adjectives & Adverbs (Materi)
        |--------------------------------------------------------------------------
        */
        $learn10 = Learn::create([
            'title' => 'Adjectives & Adverbs',
            'content' => 'Perbedaan Adjective dan Adverb:

• Adjective: menerangkan noun (kata benda)
  Contoh: She is a smart student

• Adverb: menerangkan verb, adjective, atau adverb lain
  Contoh: She runs quickly

• Banyak adverb terbentuk dari adjective + -ly
  Contoh: quick → quickly, careful → carefully'
        ]);
    }
}
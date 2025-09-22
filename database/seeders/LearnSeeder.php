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
        | SLIDE 1 & 2 – Parts of Speech + Quiz
        |--------------------------------------------------------------------------
        */
        $learn1 = Learn::create([
            'title' => 'Parts of Speech',
            'content' => 'Dalam bahasa Inggris, kata dibagi menjadi beberapa kelas kata utama: 
            Noun → kata benda (book, car, happiness).
            Verb → kata kerja (run, eat, is).
            Adjective → kata sifat (big, beautiful, smart).
            Adverb → kata keterangan (quickly, very, well).
            Pronoun → kata ganti (he, she, it, they).
            Preposition → kata depan (in, on, at, with).
            Conjunction → kata sambung (and, but, because).
            Interjection → kata seru (oh!, wow!).'
        ]);

        $q1 = LearnQuestion::create(['learn_id' => $learn1->id, 'question_text' => 'She is a beautiful girl. (kata bergaris bawah = "beautiful")']);
        LearnAnswer::insert([
            ['learn_question_id' => $q1->id, 'answer_text' => 'Noun', 'is_correct' => false],
            ['learn_question_id' => $q1->id, 'answer_text' => 'Verb', 'is_correct' => false],
            ['learn_question_id' => $q1->id, 'answer_text' => 'Adjective', 'is_correct' => true],
            ['learn_question_id' => $q1->id, 'answer_text' => 'Adverb', 'is_correct' => false],
        ]);

        $q2 = LearnQuestion::create(['learn_id' => $learn1->id, 'question_text' => 'They run every morning. (kata bergaris bawah = "run")']);
        LearnAnswer::insert([
            ['learn_question_id' => $q2->id, 'answer_text' => 'Noun', 'is_correct' => false],
            ['learn_question_id' => $q2->id, 'answer_text' => 'Verb', 'is_correct' => true],
            ['learn_question_id' => $q2->id, 'answer_text' => 'Adjective', 'is_correct' => false],
            ['learn_question_id' => $q2->id, 'answer_text' => 'Pronoun', 'is_correct' => false],
        ]);

        $q3 = LearnQuestion::create(['learn_id' => $learn1->id, 'question_text' => 'He went to school with his friends. (kata bergaris bawah = "with")']);
        LearnAnswer::insert([
            ['learn_question_id' => $q3->id, 'answer_text' => 'Preposition', 'is_correct' => true],
            ['learn_question_id' => $q3->id, 'answer_text' => 'Conjunction', 'is_correct' => false],
            ['learn_question_id' => $q3->id, 'answer_text' => 'Adjective', 'is_correct' => false],
            ['learn_question_id' => $q3->id, 'answer_text' => 'Verb', 'is_correct' => false],
        ]);

        /*
        |--------------------------------------------------------------------------
        | SLIDE 3 & 4 – Subject-Verb Agreement + Quiz
        |--------------------------------------------------------------------------
        */
        $learn2 = Learn::create([
            'title' => 'Subject–Verb Agreement',
            'content' => 'Aturan dasar:
            - Subjek tunggal → verb + s/es (He plays, She goes).
            - Subjek jamak → verb dasar (They play, We go).
            - "I" & "You" → selalu pakai verb dasar (I go, You like).'
        ]);

        $q4 = LearnQuestion::create(['learn_id' => $learn2->id, 'question_text' => 'She ____ to school every day.']);
        LearnAnswer::insert([
            ['learn_question_id' => $q4->id, 'answer_text' => 'go', 'is_correct' => false],
            ['learn_question_id' => $q4->id, 'answer_text' => 'goes', 'is_correct' => true],
        ]);

        $q5 = LearnQuestion::create(['learn_id' => $learn2->id, 'question_text' => 'They ____ football every Sunday.']);
        LearnAnswer::insert([
            ['learn_question_id' => $q5->id, 'answer_text' => 'play', 'is_correct' => true],
            ['learn_question_id' => $q5->id, 'answer_text' => 'plays', 'is_correct' => false],
        ]);

        $q6 = LearnQuestion::create(['learn_id' => $learn2->id, 'question_text' => 'You ____ my best friend.']);
        LearnAnswer::insert([
            ['learn_question_id' => $q6->id, 'answer_text' => 'is', 'is_correct' => false],
            ['learn_question_id' => $q6->id, 'answer_text' => 'are', 'is_correct' => true],
        ]);

        /*
        |--------------------------------------------------------------------------
        | SLIDE 5 & 6 – Tenses Dasar + Quiz
        |--------------------------------------------------------------------------
        */
        $learn3 = Learn::create([
            'title' => 'Tenses Dasar (Simple Present & Simple Past)',
            'content' => 'Simple Present: Fakta atau kebiasaan. (I study every night).
            Simple Past: Kejadian lampau. (I studied yesterday).
            Kata kunci:
            - Present → always, usually, every day.
            - Past → yesterday, last night, two days ago.'
        ]);

        $q7 = LearnQuestion::create(['learn_id' => $learn3->id, 'question_text' => 'I ____ English every day. (study/studied)']);
        LearnAnswer::insert([
            ['learn_question_id' => $q7->id, 'answer_text' => 'study', 'is_correct' => true],
            ['learn_question_id' => $q7->id, 'answer_text' => 'studied', 'is_correct' => false],
        ]);

        $q8 = LearnQuestion::create(['learn_id' => $learn3->id, 'question_text' => 'She ____ to Bali last year. (go/goes/went)']);
        LearnAnswer::insert([
            ['learn_question_id' => $q8->id, 'answer_text' => 'go', 'is_correct' => false],
            ['learn_question_id' => $q8->id, 'answer_text' => 'goes', 'is_correct' => false],
            ['learn_question_id' => $q8->id, 'answer_text' => 'went', 'is_correct' => true],
        ]);

        $q9 = LearnQuestion::create(['learn_id' => $learn3->id, 'question_text' => 'They ____ football yesterday. (play/played)']);
        LearnAnswer::insert([
            ['learn_question_id' => $q9->id, 'answer_text' => 'play', 'is_correct' => false],
            ['learn_question_id' => $q9->id, 'answer_text' => 'played', 'is_correct' => true],
        ]);

        /*
        |--------------------------------------------------------------------------
        | SLIDE 7 & 8 – Pronouns + Quiz
        |--------------------------------------------------------------------------
        */
        $learn4 = Learn::create([
            'title' => 'Pronouns',
            'content' => 'Jenis-jenis pronoun:
            - Subject Pronoun: I, you, he, she, it, we, they.
            - Object Pronoun: me, you, him, her, it, us, them.
            - Possessive Adjective: my, your, his, her, its, our, their.
            - Possessive Pronoun: mine, yours, his, hers, ours, theirs.'
        ]);

        $q10 = LearnQuestion::create(['learn_id' => $learn4->id, 'question_text' => 'This is my brother. ____ is tall.']);
        LearnAnswer::insert([
            ['learn_question_id' => $q10->id, 'answer_text' => 'He', 'is_correct' => true],
            ['learn_question_id' => $q10->id, 'answer_text' => 'Him', 'is_correct' => false],
            ['learn_question_id' => $q10->id, 'answer_text' => 'His', 'is_correct' => false],
        ]);

        $q11 = LearnQuestion::create(['learn_id' => $learn4->id, 'question_text' => 'That is my book. It is _____.']);
        LearnAnswer::insert([
            ['learn_question_id' => $q11->id, 'answer_text' => 'mine', 'is_correct' => true],
            ['learn_question_id' => $q11->id, 'answer_text' => 'my', 'is_correct' => false],
            ['learn_question_id' => $q11->id, 'answer_text' => 'me', 'is_correct' => false],
        ]);

        $q12 = LearnQuestion::create(['learn_id' => $learn4->id, 'question_text' => 'I love Anna. I always talk to ____.']);
        LearnAnswer::insert([
            ['learn_question_id' => $q12->id, 'answer_text' => 'she', 'is_correct' => false],
            ['learn_question_id' => $q12->id, 'answer_text' => 'her', 'is_correct' => true],
            ['learn_question_id' => $q12->id, 'answer_text' => 'hers', 'is_correct' => false],
        ]);

        /*
        |--------------------------------------------------------------------------
        | SLIDE 9 & 10 – Adjectives & Adverbs + Quiz
        |--------------------------------------------------------------------------
        */
        $learn5 = Learn::create([
            'title' => 'Adjectives & Adverbs',
            'content' => 'Adjective: menerangkan noun. (She is a smart student).
            Adverb: menerangkan verb/adjective/adverb lain. (She runs quickly).
            Banyak adverb terbentuk dari adjective + -ly (quick → quickly).'
        ]);

        $q13 = LearnQuestion::create(['learn_id' => $learn5->id, 'question_text' => 'He is a ____ driver. (careful/carefully)']);
        LearnAnswer::insert([
            ['learn_question_id' => $q13->id, 'answer_text' => 'careful', 'is_correct' => true],
            ['learn_question_id' => $q13->id, 'answer_text' => 'carefully', 'is_correct' => false],
        ]);

        $q14 = LearnQuestion::create(['learn_id' => $learn5->id, 'question_text' => 'She sings ____. (beautiful/beautifully)']);
        LearnAnswer::insert([
            ['learn_question_id' => $q14->id, 'answer_text' => 'beautiful', 'is_correct' => false],
            ['learn_question_id' => $q14->id, 'answer_text' => 'beautifully', 'is_correct' => true],
        ]);

        $q15 = LearnQuestion::create(['learn_id' => $learn5->id, 'question_text' => 'This is a ____ day. (happy/happily)']);
        LearnAnswer::insert([
            ['learn_question_id' => $q15->id, 'answer_text' => 'happy', 'is_correct' => true],
            ['learn_question_id' => $q15->id, 'answer_text' => 'happily', 'is_correct' => false],
        ]);
    }
}

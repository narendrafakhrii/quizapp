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
        // Hapus data lama
        LearnAnswer::query()->delete();
        LearnQuestion::query()->delete();
        Learn::query()->delete();

        /*
        |--------------------------------------------------------------------------
        | LEARN 1 - Parts of Speech (3 slides total)
        |--------------------------------------------------------------------------
        */
        
        // Slide 1: Materi Parts of Speech
        $learn1_slide1 = Learn::create([
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
            'learn_group' => 'parts-of-speech'
        ]);

        // Slide 2: Quiz 1 - Parts of Speech
        $learn1_slide2 = Learn::create([
            'title' => 'Parts of Speech',
            'slide_type' => 'quiz',
            'slide_number' => 2,
            'content' => null,
            'learn_group' => 'parts-of-speech'
        ]);

        $q1 = LearnQuestion::create([
            'learn_id' => $learn1_slide2->id, 
            'question_text' => 'I have _____ apple.'
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q1->id, 'answer_text' => 'a', 'is_correct' => false],
            ['learn_question_id' => $q1->id, 'answer_text' => 'an', 'is_correct' => true],
            ['learn_question_id' => $q1->id, 'answer_text' => 'the', 'is_correct' => false],
            ['learn_question_id' => $q1->id, 'answer_text' => 'some', 'is_correct' => false],
        ]);

        // Slide 3: Quiz 2 - Parts of Speech
        $learn1_slide3 = Learn::create([
            'title' => 'Parts of Speech',
            'slide_type' => 'quiz',
            'slide_number' => 3,
            'content' => null,
            'learn_group' => 'parts-of-speech'
        ]);

        $q2 = LearnQuestion::create([
            'learn_id' => $learn1_slide3->id, 
            'question_text' => 'This is _____ book.'
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q2->id, 'answer_text' => 'I', 'is_correct' => false],
            ['learn_question_id' => $q2->id, 'answer_text' => 'me', 'is_correct' => false],
            ['learn_question_id' => $q2->id, 'answer_text' => 'my', 'is_correct' => true],
            ['learn_question_id' => $q2->id, 'answer_text' => 'mine', 'is_correct' => false],
        ]);

        /*
        |--------------------------------------------------------------------------
        | LEARN 2 - Subject-Verb Agreement (3 slides total)
        |--------------------------------------------------------------------------
        */
        
        // Slide 1: Materi Subject-Verb Agreement
        $learn2_slide1 = Learn::create([
            'title' => 'Subject-Verb Agreement',
            'slide_type' => 'material',
            'slide_number' => 1,
            'content' => 'Aturan dasar dalam bahasa Inggris:

• Subjek tunggal → verb + s/es
  Contoh: He plays, She goes

• Subjek jamak → verb dasar  
  Contoh: They play, We go

• "I" & "You" → selalu pakai verb dasar
  Contoh: I go, You like

Penting untuk selalu memperhatikan kesesuaian antara subjek dan kata kerja dalam kalimat.',
            'learn_group' => 'subject-verb-agreement'
        ]);

        // Slide 2: Quiz 1 - Subject-Verb Agreement
        $learn2_slide2 = Learn::create([
            'title' => 'Subject-Verb Agreement',
            'slide_type' => 'quiz',
            'slide_number' => 2,
            'content' => null,
            'learn_group' => 'subject-verb-agreement'
        ]);

        $q3 = LearnQuestion::create([
            'learn_id' => $learn2_slide2->id, 
            'question_text' => 'She _____ to school every day.'
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q3->id, 'answer_text' => 'go', 'is_correct' => false],
            ['learn_question_id' => $q3->id, 'answer_text' => 'goes', 'is_correct' => true],
            ['learn_question_id' => $q3->id, 'answer_text' => 'going', 'is_correct' => false],
            ['learn_question_id' => $q3->id, 'answer_text' => 'gone', 'is_correct' => false],
        ]);

        // Slide 3: Quiz 2 - Subject-Verb Agreement
        $learn2_slide3 = Learn::create([
            'title' => 'Subject-Verb Agreement',
            'slide_type' => 'quiz',
            'slide_number' => 3,
            'content' => null,
            'learn_group' => 'subject-verb-agreement'
        ]);

        $q4 = LearnQuestion::create([
            'learn_id' => $learn2_slide3->id, 
            'question_text' => 'They _____ football every Sunday.'
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q4->id, 'answer_text' => 'play', 'is_correct' => true],
            ['learn_question_id' => $q4->id, 'answer_text' => 'plays', 'is_correct' => false],
            ['learn_question_id' => $q4->id, 'answer_text' => 'playing', 'is_correct' => false],
            ['learn_question_id' => $q4->id, 'answer_text' => 'played', 'is_correct' => false],
        ]);

        /*
        |--------------------------------------------------------------------------
        | LEARN 3 - Tenses (3 slides total)
        |--------------------------------------------------------------------------
        */
        
        // Slide 1: Materi Tenses
        $learn3_slide1 = Learn::create([
            'title' => 'Basic Tenses',
            'slide_type' => 'material',
            'slide_number' => 1,
            'content' => 'Simple Present vs Simple Past:

• Simple Present: Fakta atau kebiasaan
  Contoh: I study every night

• Simple Past: Kejadian lampau
  Contoh: I studied yesterday

Kata kunci:
• Present → always, usually, every day
• Past → yesterday, last night, two days ago

Gunakan tenses yang tepat sesuai dengan waktu kejadian.',
            'learn_group' => 'basic-tenses'
        ]);

        // Slide 2: Quiz 1 - Tenses
        $learn3_slide2 = Learn::create([
            'title' => 'Basic Tenses',
            'slide_type' => 'quiz',
            'slide_number' => 2,
            'content' => null,
            'learn_group' => 'basic-tenses'
        ]);

        $q5 = LearnQuestion::create([
            'learn_id' => $learn3_slide2->id, 
            'question_text' => 'I _____ English every day.'
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q5->id, 'answer_text' => 'study', 'is_correct' => true],
            ['learn_question_id' => $q5->id, 'answer_text' => 'studied', 'is_correct' => false],
            ['learn_question_id' => $q5->id, 'answer_text' => 'studying', 'is_correct' => false],
            ['learn_question_id' => $q5->id, 'answer_text' => 'studies', 'is_correct' => false],
        ]);

        // Slide 3: Quiz 2 - Tenses
        $learn3_slide3 = Learn::create([
            'title' => 'Basic Tenses',
            'slide_type' => 'quiz',
            'slide_number' => 3,
            'content' => null,
            'learn_group' => 'basic-tenses'
        ]);

        $q6 = LearnQuestion::create([
            'learn_id' => $learn3_slide3->id, 
            'question_text' => 'Yesterday, I _____ to the park.'
        ]);
        LearnAnswer::insert([
            ['learn_question_id' => $q6->id, 'answer_text' => 'go', 'is_correct' => false],
            ['learn_question_id' => $q6->id, 'answer_text' => 'goes', 'is_correct' => false],
            ['learn_question_id' => $q6->id, 'answer_text' => 'went', 'is_correct' => true],
            ['learn_question_id' => $q6->id, 'answer_text' => 'going', 'is_correct' => false],
        ]);
    }
}
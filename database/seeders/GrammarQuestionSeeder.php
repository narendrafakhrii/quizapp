<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Database\Seeder;

class GrammarQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama
        Option::query()->delete();
        Question::query()->delete();

        // Soal Level Newbie (Dasar)
        $newbieQuestions = [
            [
                'question_text' => 'Choose the correct verb: She ___ to school every day.',
                'level' => 'newbie',
                'category' => 'grammar',
                'options' => [
                    ['option_text' => 'go', 'is_correct' => false],
                    ['option_text' => 'going', 'is_correct' => false],
                    ['option_text' => 'goes', 'is_correct' => true],
                    ['option_text' => 'gone', 'is_correct' => false],
                    ['option_text' => 'goed', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'I have ___ apple.',
                'level' => 'newbie',
                'category' => 'grammar',
                'options' => [
                    ['option_text' => 'a', 'is_correct' => false],
                    ['option_text' => 'an', 'is_correct' => true],
                    ['option_text' => 'the', 'is_correct' => false],
                    ['option_text' => 'some', 'is_correct' => false],
                    ['option_text' => 'any', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'This is ___ book.',
                'level' => 'newbie',
                'category' => 'grammar',
                'options' => [
                    ['option_text' => 'I', 'is_correct' => false],
                    ['option_text' => 'me', 'is_correct' => false],
                    ['option_text' => 'my', 'is_correct' => true],
                    ['option_text' => 'mine', 'is_correct' => false],
                    ['option_text' => 'myself', 'is_correct' => false],
                ],
            ],
        ];

        // Soal Level Intermediate (Menengah)
        $intermediateQuestions = [
            [
                'question_text' => 'If I ___ you, I would study harder.',
                'level' => 'intermediate',
                'category' => 'grammar',
                'options' => [
                    ['option_text' => 'am', 'is_correct' => false],
                    ['option_text' => 'was', 'is_correct' => false],
                    ['option_text' => 'were', 'is_correct' => true],
                    ['option_text' => 'will be', 'is_correct' => false],
                    ['option_text' => 'would be', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'The book ___ by millions of people.',
                'level' => 'intermediate',
                'category' => 'grammar',
                'options' => [
                    ['option_text' => 'reads', 'is_correct' => false],
                    ['option_text' => 'is read', 'is_correct' => true],
                    ['option_text' => 'read', 'is_correct' => false],
                    ['option_text' => 'reading', 'is_correct' => false],
                    ['option_text' => 'was reading', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'She suggested ___ early.',
                'level' => 'intermediate',
                'category' => 'grammar',
                'options' => [
                    ['option_text' => 'to leave', 'is_correct' => false],
                    ['option_text' => 'leave', 'is_correct' => false],
                    ['option_text' => 'leaving', 'is_correct' => true],
                    ['option_text' => 'left', 'is_correct' => false],
                    ['option_text' => 'leaves', 'is_correct' => false],
                ],
            ],
        ];

        // Soal Level Expert (Ahli)
        $expertQuestions = [
            [
                'question_text' => 'Had I known about the meeting, I ___ attended.',
                'level' => 'expert',
                'category' => 'grammar',
                'options' => [
                    ['option_text' => 'will have', 'is_correct' => false],
                    ['option_text' => 'would have', 'is_correct' => true],
                    ['option_text' => 'would', 'is_correct' => false],
                    ['option_text' => 'will', 'is_correct' => false],
                    ['option_text' => 'had', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'The committee ___ its decision after much deliberation.',
                'level' => 'expert',
                'category' => 'grammar',
                'options' => [
                    ['option_text' => 'have made', 'is_correct' => false],
                    ['option_text' => 'has made', 'is_correct' => true],
                    ['option_text' => 'made', 'is_correct' => false],
                    ['option_text' => 'makes', 'is_correct' => false],
                    ['option_text' => 'making', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Scarcely ___ the door when the phone rang.',
                'level' => 'expert',
                'category' => 'grammar',
                'options' => [
                    ['option_text' => 'I had opened', 'is_correct' => false],
                    ['option_text' => 'had I opened', 'is_correct' => true],
                    ['option_text' => 'I opened', 'is_correct' => false],
                    ['option_text' => 'did I open', 'is_correct' => false],
                    ['option_text' => 'I have opened', 'is_correct' => false],
                ],
            ],
        ];

        // Gabungkan semua soal
        $allQuestions = array_merge($newbieQuestions, $intermediateQuestions, $expertQuestions);

        // Insert ke database
        foreach ($allQuestions as $q) {
            $question = Question::create([
                'question_text' => $q['question_text'],
                'level' => $q['level'],
                'category' => $q['category'],
            ]);

            foreach ($q['options'] as $opt) {
                $question->options()->create($opt);
            }
        }
    }
}

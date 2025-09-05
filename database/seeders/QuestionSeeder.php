<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;    
use App\Models\Option;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

            Option::query()->delete();
            Question::query()->delete();

        $questions = [
    [
        'question' => 'Choose the correct verb: She ___ to school every day.',
        'options' => [
            ['option_text'=>'go','is_correct'=>false],
            ['option_text'=>'going','is_correct'=>false],
            ['option_text'=>'goes','is_correct'=>true],
            ['option_text'=>'gone','is_correct'=>false],
            ['option_text'=>'goed','is_correct'=>false],
        ]
    ],
    [
        'question' => 'I have ___ apple.',
        'options' => [
            ['option_text'=>'a','is_correct'=>false],
            ['option_text'=>'an','is_correct'=>true],
            ['option_text'=>'the','is_correct'=>false],
            ['option_text'=>'some','is_correct'=>false],
            ['option_text'=>'any','is_correct'=>false],
        ]
    ],
    [
        'question' => 'Choose the correct pronoun: ___ is my best friend.',
        'options' => [
            ['option_text'=>'He','is_correct'=>false],
            ['option_text'=>'She','is_correct'=>true],
            ['option_text'=>'They','is_correct'=>false],
            ['option_text'=>'It','is_correct'=>false],
            ['option_text'=>'We','is_correct'=>false],
        ]
    ],
    [
        'question' => 'I am good ___ playing football.',
        'options' => [
            ['option_text'=>'on','is_correct'=>false],
            ['option_text'=>'in','is_correct'=>false],
            ['option_text'=>'at','is_correct'=>true],
            ['option_text'=>'for','is_correct'=>false],
            ['option_text'=>'with','is_correct'=>false],
        ]
    ],
    [
        'question' => 'They ___ dinner now.',
        'options' => [
            ['option_text'=>'eat','is_correct'=>false],
            ['option_text'=>'eats','is_correct'=>false],
            ['option_text'=>'eating','is_correct'=>false],
            ['option_text'=>'are eating','is_correct'=>true],
            ['option_text'=>'eaten','is_correct'=>false],
        ]
    ],
    [
        'question' => 'I have two ___.',
        'options' => [
            ['option_text'=>'cat','is_correct'=>false],
            ['option_text'=>'cats','is_correct'=>true],
            ['option_text'=>'caties','is_correct'=>false],
            ['option_text'=>'cates','is_correct'=>false],
            ['option_text'=>'catz','is_correct'=>false],
        ]
    ],
    [
        'question' => 'This is ___ book.',
        'options' => [
            ['option_text'=>'I','is_correct'=>false],
            ['option_text'=>'me','is_correct'=>false],
            ['option_text'=>'my','is_correct'=>true],
            ['option_text'=>'mine','is_correct'=>false],
            ['option_text'=>'myself','is_correct'=>false],
        ]
    ],
    [
        'question' => 'My house is ___ than yours.',
        'options' => [
            ['option_text'=>'big','is_correct'=>false],
            ['option_text'=>'bigger','is_correct'=>true],
            ['option_text'=>'biggest','is_correct'=>false],
            ['option_text'=>'more big','is_correct'=>false],
            ['option_text'=>'most big','is_correct'=>false],
        ]
    ],
    [
        'question' => 'She ___ like pizza.',
        'options' => [
            ['option_text'=>'do not','is_correct'=>false],
            ['option_text'=>'does not','is_correct'=>true],
            ['option_text'=>'not','is_correct'=>false],
            ['option_text'=>'is not','is_correct'=>false],
            ['option_text'=>'are not','is_correct'=>false],
        ]
    ],
    [
        'question' => '___ you like ice cream?',
        'options' => [
            ['option_text'=>'Do','is_correct'=>true],
            ['option_text'=>'Does','is_correct'=>false],
            ['option_text'=>'Did','is_correct'=>false],
            ['option_text'=>'Are','is_correct'=>false],
            ['option_text'=>'Is','is_correct'=>false],
        ]
    ],
    [
        'question' => 'I ___ a new bike yesterday.',
        'options' => [
            ['option_text'=>'buy','is_correct'=>false],
            ['option_text'=>'buys','is_correct'=>false],
            ['option_text'=>'buying','is_correct'=>false],
            ['option_text'=>'bought','is_correct'=>true],
            ['option_text'=>'buyed','is_correct'=>false],
        ]
    ],
    [
        'question' => 'I want to eat, ___ I am not hungry.',
        'options' => [
            ['option_text'=>'and','is_correct'=>false],
            ['option_text'=>'but','is_correct'=>true],
            ['option_text'=>'or','is_correct'=>false],
            ['option_text'=>'so','is_correct'=>false],
            ['option_text'=>'because','is_correct'=>false],
        ]
    ],
    [
        'question' => 'It is ___ today.',
        'options' => [
            ['option_text'=>'sunny','is_correct'=>true],
            ['option_text'=>'sun','is_correct'=>false],
            ['option_text'=>'sunning','is_correct'=>false],
            ['option_text'=>'suns','is_correct'=>false],
            ['option_text'=>'sunly','is_correct'=>false],
        ]
    ],
    [
        'question' => 'She can ___ well.',
        'options' => [
            ['option_text'=>'sings','is_correct'=>false],
            ['option_text'=>'singing','is_correct'=>false],
            ['option_text'=>'sing','is_correct'=>true],
            ['option_text'=>'sang','is_correct'=>false],
            ['option_text'=>'sung','is_correct'=>false],
        ]
    ],
    [
        'question' => 'There are many ___ in the sky.',
        'options' => [
            ['option_text'=>'star','is_correct'=>false],
            ['option_text'=>'stars','is_correct'=>true],
            ['option_text'=>'starrs','is_correct'=>false],
            ['option_text'=>'starry','is_correct'=>false],
            ['option_text'=>'starz','is_correct'=>false],
        ]
    ],
    [
        'question' => 'This pen is ___.',
        'options' => [
            ['option_text'=>'my','is_correct'=>false],
            ['option_text'=>'mine','is_correct'=>true],
            ['option_text'=>'me','is_correct'=>false],
            ['option_text'=>'I','is_correct'=>false],
            ['option_text'=>'myself','is_correct'=>false],
        ]
    ],
    [
        'question' => 'He runs very ___.',
        'options' => [
            ['option_text'=>'quick','is_correct'=>false],
            ['option_text'=>'quickly','is_correct'=>true],
            ['option_text'=>'quicker','is_correct'=>false],
            ['option_text'=>'quickest','is_correct'=>false],
            ['option_text'=>'quickness','is_correct'=>false],
        ]
    ],
    [
        'question' => 'We ___ to the park yesterday.',
        'options' => [
            ['option_text'=>'go','is_correct'=>false],
            ['option_text'=>'goes','is_correct'=>false],
            ['option_text'=>'went','is_correct'=>true],
            ['option_text'=>'going','is_correct'=>false],
            ['option_text'=>'gone','is_correct'=>false],
        ]
    ],
    [
        'question' => 'She ___ breakfast every morning.',
        'options' => [
            ['option_text'=>'have','is_correct'=>false],
            ['option_text'=>'has','is_correct'=>true],
            ['option_text'=>'having','is_correct'=>false],
            ['option_text'=>'had','is_correct'=>false],
            ['option_text'=>'haves','is_correct'=>false],
        ]
    ],
    [
        'question' => 'Choose the correct sentence:',
        'options' => [
            ['option_text'=>'I am a student.','is_correct'=>true],
            ['option_text'=>'I am student.','is_correct'=>false],
            ['option_text'=>'I is a student.','is_correct'=>false],
            ['option_text'=>'I are student.','is_correct'=>false],
            ['option_text'=>'Me am a student.','is_correct'=>false],
        ]
    ],
];


        foreach($questions as $q){
            $question = Question::create(['question_text'=>$q['question']]);
            foreach($q['options'] as $opt){
                $question->options()->create($opt);
            }
        }

    }
}

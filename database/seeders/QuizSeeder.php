<?php

namespace Database\Seeders;

use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        // Hapus data lama
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('quiz_answers')->truncate();
        DB::table('quiz_questions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Semua soal grammar
        $allQuestions = [
            /*
            |-------------------------------------------------------------------------------
            | Grammar
            |-------------------------------------------------------------------------------
            */
            [
                'text' => 'I ___ to school every day.',
                'options' => ['go', 'goes', 'going', 'gone', 'went'],
                'answer' => 'go',
                'category' => 'grammar',
            ],
            [
                'text' => 'She ___ a book now.',
                'options' => ['reads', 'is reading', 'read', 'reading', 'has read'],
                'answer' => 'is reading',
                'category' => 'grammar',
            ],
            [
                'text' => 'They ___ breakfast at 7 a.m. yesterday.',
                'options' => ['have', 'had', 'has', 'having', 'will have'],
                'answer' => 'had',
                'category' => 'grammar',
            ],
            [
                'text' => 'He ___ in the garden every morning.',
                'options' => ['work', 'works', 'working', 'worked', 'has worked'],
                'answer' => 'works',
                'category' => 'grammar',
            ],
            [
                'text' => 'We ___ to the beach last weekend.',
                'options' => ['goes', 'went', 'going', 'go', 'had gone'],
                'answer' => 'went',
                'category' => 'grammar',
            ],
            [
                'text' => 'I ___ watching TV now.',
                'options' => ['am', 'is', 'are', 'was', 'be'],
                'answer' => 'am',
                'category' => 'grammar',
            ],
            [
                'text' => 'She usually ___ coffee in the morning.',
                'options' => ['drink', 'drinks', 'drinking', 'drank', 'has drunk'],
                'answer' => 'drinks',
                'category' => 'grammar',
            ],
            [
                'text' => 'They ___ dinner when I arrived.',
                'options' => ['have', 'had', 'were having', 'has', 'are having'],
                'answer' => 'were having',
                'category' => 'grammar',
            ],
            [
                'text' => 'He ___ play football yesterday.',
                'options' => ['didn’t', 'doesn’t', 'not', 'hasn’t', 'won’t'],
                'answer' => 'didn’t',
                'category' => 'grammar',
            ],
            [
                'text' => 'This is my pen. Is it ___?',
                'options' => ['your', 'yours', 'you', 'yours’', 'yourself'],
                'answer' => 'yours',
                'category' => 'grammar',
            ],
            [
                'text' => '___ are going to the park tomorrow.',
                'options' => ['He', 'They', 'It', 'She', 'We'],
                'answer' => 'They',
                'category' => 'grammar',
            ],
            [
                'text' => 'I gave the book to ___.',
                'options' => ['she', 'her', 'hers', 'him', 'myself'],
                'answer' => 'her',
                'category' => 'grammar',
            ],
            [
                'text' => '___ is my best friend.',
                'options' => ['He', 'Him', 'His', 'Himself', 'They'],
                'answer' => 'He',
                'category' => 'grammar',
            ],
            [
                'text' => 'This bag is mine, not ___.',
                'options' => ['yours', 'you', 'your', 'yourself', 'theirs'],
                'answer' => 'yours',
                'category' => 'grammar',
            ],
            [
                'text' => '___ have finished our homework.',
                'options' => ['We', 'Us', 'Our', 'Ours', 'They'],
                'answer' => 'We',
                'category' => 'grammar',
            ],
            [
                'text' => 'Can you help ___?',
                'options' => ['I', 'me', 'mine', 'myself', 'us'],
                'answer' => 'me',
                'category' => 'grammar',
            ],
            [
                'text' => 'She sings very ___.',
                'options' => ['beautiful', 'beautifully', 'beauty', 'more beautiful', 'beautify'],
                'answer' => 'beautifully',
                'category' => 'grammar',
            ],
            [
                'text' => 'This is a ___ car.',
                'options' => ['fast', 'fastly', 'faster', 'fastest', 'more fast'],
                'answer' => 'fast',
                'category' => 'grammar',
            ],
            [
                'text' => 'He is a ___ boy.',
                'options' => ['kind', 'kindly', 'kindness', 'more kind', 'kindest'],
                'answer' => 'kind',
                'category' => 'grammar',
            ],
            [
                'text' => 'They speak English ___.',
                'options' => ['good', 'well', 'better', 'best', 'goodness'],
                'answer' => 'well',
                'category' => 'grammar',
            ],
            [
                'text' => 'The movie was ___.',
                'options' => ['excite', 'exciting', 'excited', 'excites', 'excitement'],
                'answer' => 'exciting',
                'category' => 'grammar',
            ],
            [
                'text' => 'He runs ___.',
                'options' => ['quick', 'quickly', 'quicker', 'quickest', 'more quickly'],
                'answer' => 'quickly',
                'category' => 'grammar',
            ],
            [
                'text' => 'This problem is ___.',
                'options' => ['easy', 'easily', 'easier', 'easiest', 'more easy'],
                'answer' => 'easy',
                'category' => 'grammar',
            ],

            /*
            |-------------------------------------------------------------------------------
            | VOCABULARY
            |-------------------------------------------------------------------------------
            */

            // ================= VOCABULARY: SYNONYMS =================
            [
                'text' => 'The word “obvious” is closest in meaning to ___.',
                'options' => ['hidden', 'clear', 'doubtful', 'strange', 'vague'],
                'answer' => 'clear',
                'category' => 'vocabulary',
            ],
            [
                'text' => 'The synonym of “reluctant” is ___.',
                'options' => ['willing', 'eager', 'hesitant', 'happy', 'enthusiastic'],
                'answer' => 'hesitant',
                'category' => 'vocabulary',
            ],
            [
                'text' => '“Rapid” most nearly means ___.',
                'options' => ['slow', 'quick', 'steady', 'weak', 'late'],
                'answer' => 'quick',
                'category' => 'vocabulary',
            ],
            [
                'text' => 'The word “assist” means ___.',
                'options' => ['refuse', 'reject', 'help', 'hinder', 'ignore'],
                'answer' => 'help',
                'category' => 'vocabulary',
            ],
            [
                'text' => '“Generous” is closest in meaning to ___.',
                'options' => ['selfish', 'kind', 'greedy', 'strict', 'rude'],
                'answer' => 'kind',
                'category' => 'vocabulary',
            ],
            [
                'text' => '“Accurate” is nearly the same as ___.',
                'options' => ['wrong', 'precise', 'rough', 'false', 'doubtful'],
                'answer' => 'precise',
                'category' => 'vocabulary',
            ],
            [
                'text' => '“Fragile” is closest in meaning to ___.',
                'options' => ['strong', 'weak', 'tough', 'delicate', 'solid'],
                'answer' => 'delicate',
                'category' => 'vocabulary',
            ],
            [
                'text' => '“Complicated” is similar in meaning to ___.',
                'options' => ['easy', 'simple', 'difficult', 'plain', 'ordinary'],
                'answer' => 'difficult',
                'category' => 'vocabulary',
            ],

            // ================= VOCABULARY: ANTONYMS =================
            [
                'text' => 'The opposite of “expand” is ___.',
                'options' => ['grow', 'extend', 'shrink', 'increase', 'enlarge'],
                'answer' => 'shrink',
                'category' => 'vocabulary',
            ],
            [
                'text' => 'The antonym of “optimistic” is ___.',
                'options' => ['hopeful', 'cheerful', 'positive', 'pessimistic', 'confident'],
                'answer' => 'pessimistic',
                'category' => 'vocabulary',
            ],
            [
                'text' => 'The word “transparent” is opposite to ___.',
                'options' => ['clear', 'obvious', 'hidden', 'open', 'bright'],
                'answer' => 'hidden',
                'category' => 'vocabulary',
            ],
            [
                'text' => 'The antonym of “temporary” is ___.',
                'options' => ['short', 'brief', 'permanent', 'instant', 'sudden'],
                'answer' => 'permanent',
                'category' => 'vocabulary',
            ],
            [
                'text' => 'The opposite of “scarce” is ___.',
                'options' => ['rare', 'limited', 'abundant', 'few', 'little'],
                'answer' => 'abundant',
                'category' => 'vocabulary',
            ],
            [
                'text' => 'The antonym of “include” is ___.',
                'options' => ['contain', 'involve', 'exclude', 'consist', 'add'],
                'answer' => 'exclude',
                'category' => 'vocabulary',
            ],
            [
                'text' => 'The opposite of “ancient” is ___.',
                'options' => ['old', 'historical', 'past', 'modern', 'traditional'],
                'answer' => 'modern',
                'category' => 'vocabulary',
            ],

            // ================= VOCABULARY: WORD FORM =================
            [
                'text' => 'Choose the correct form: She is a very ___ person. (creativity)',
                'options' => ['create', 'created', 'creative', 'creatively', 'creation'],
                'answer' => 'creative',
                'category' => 'vocabulary',
            ],
            [
                'text' => 'His ___ impressed everyone. (decide)',
                'options' => ['decisive', 'deciding', 'decision', 'decided', 'decides'],
                'answer' => 'decision',
                'category' => 'vocabulary',
            ],
            [
                'text' => 'We should act ___ to solve the problem. (quick)',
                'options' => ['quick', 'quickly', 'quickest', 'quicker', 'quickness'],
                'answer' => 'quickly',
                'category' => 'vocabulary',
            ],
            [
                'text' => 'The ___ of pollution is dangerous. (increase)',
                'options' => ['increasing', 'increases', 'increased', 'increase', 'increasingly'],
                'answer' => 'increase',
                'category' => 'vocabulary',
            ],
            [
                'text' => 'He is one of the most ___ students in the class. (intelligence)',
                'options' => ['intelligently', 'intelligence', 'intelligent', 'intelligible', 'intelligency'],
                'answer' => 'intelligent',
                'category' => 'vocabulary',
            ],
            [
                'text' => 'The teacher explained the lesson very ___. (clear)',
                'options' => ['clarity', 'clear', 'clearly', 'clearer', 'clearness'],
                'answer' => 'clearly',
                'category' => 'vocabulary',
            ],
            [
                'text' => 'His ___ behavior surprised us. (child)',
                'options' => ['child', 'childish', 'childly', 'children', 'childhood'],
                'answer' => 'childish',
                'category' => 'vocabulary',
            ],
            [
                'text' => 'The book was very ___. (interest)',
                'options' => ['interesting', 'interested', 'interests', 'interest', 'interestingly'],
                'answer' => 'interesting',
                'category' => 'vocabulary',
            ],

            // ================= VOCABULARY: PHRASAL VERBS & COLLOCATION =================
            [
                'text' => 'The phrasal verb “give up” means ___.',
                'options' => ['continue', 'surrender', 'begin', 'keep', 'fight'],
                'answer' => 'surrender',
                'category' => 'vocabulary',
            ],
            [
                'text' => '“Look after” means ___.',
                'options' => ['watch TV', 'take care of', 'find out', 'look for', 'search'],
                'answer' => 'take care of',
                'category' => 'vocabulary',
            ],
            [
                'text' => '“Carry out” is closest in meaning to ___.',
                'options' => ['cancel', 'perform', 'break', 'leave', 'ignore'],
                'answer' => 'perform',
                'category' => 'vocabulary',
            ],
            [
                'text' => '“Turn down” a job offer means ___.',
                'options' => ['accept', 'reject', 'receive', 'continue', 'finish'],
                'answer' => 'reject',
                'category' => 'vocabulary',
            ],
            [
                'text' => 'The phrasal verb “set up” means ___.',
                'options' => ['destroy', 'build', 'establish', 'fall', 'lose'],
                'answer' => 'establish',
                'category' => 'vocabulary',
            ],
            [
                'text' => 'Which collocation is correct?',
                'options' => ['heavy rain', 'strong rain', 'powerful rain', 'large rain', 'tough rain'],
                'answer' => 'heavy rain',
                'category' => 'vocabulary',
            ],
            [
                'text' => 'Which collocation is correct?',
                'options' => ['make a homework', 'do homework', 'create homework', 'build homework', 'take homework'],
                'answer' => 'do homework',
                'category' => 'vocabulary',
            ],

            /*
            |-------------------------------------------------------------------------------
            | READING COMPREHNSION
            |-------------------------------------------------------------------------------
            */

            // ===================== A. Tone =====================
            [
                'text' => 'The government has completely failed to address the urgent needs of the poor. Their negligence is unacceptable. What is the tone?',
                'options' => ['Neutral', 'Critical', 'Humorous', 'Hopeful', 'Objective'],
                'answer' => 'Critical',
                'category' => 'reading',
            ],
            [
                'text' => 'The view from the mountain was breathtaking, filling me with awe and admiration. The tone is ___.',
                'options' => ['Angry', 'Sarcastic', 'Admiring', 'Sad', 'Disappointed'],
                'answer' => 'Admiring',
                'category' => 'reading',
            ],
            [
                'text' => 'I can’t believe you did that! How foolish of you. The tone of the sentence is ___.',
                'options' => ['Supportive', 'Sympathetic', 'Critical', 'Encouraging', 'Neutral'],
                'answer' => 'Critical',
                'category' => 'reading',
            ],
            [
                'text' => 'Well, that was just fantastic—getting lost in the middle of nowhere! The tone is ___.',
                'options' => ['Sarcastic', 'Excited', 'Optimistic', 'Encouraging', 'Hopeful'],
                'answer' => 'Sarcastic',
                'category' => 'reading',
            ],
            [
                'text' => 'The author explains the process step by step without expressing any personal feelings. The tone is ___.',
                'options' => ['Objective', 'Emotional', 'Persuasive', 'Humorous', 'Angry'],
                'answer' => 'Objective',
                'category' => 'reading',
            ],
            [
                'text' => 'Despite the difficulties, we remain confident that success will come. The tone is ___.',
                'options' => ['Hopeless', 'Pessimistic', 'Confident', 'Neutral', 'Sarcastic'],
                'answer' => 'Confident',
                'category' => 'reading',
            ],
            [
                'text' => 'If only I had listened, things wouldn’t be this way now. The tone is ___.',
                'options' => ['Regretful', 'Joyful', 'Optimistic', 'Objective', 'Encouraging'],
                'answer' => 'Regretful',
                'category' => 'reading',
            ],
            [
                'text' => 'You’ll never be able to finish this project on time. The tone is ___.',
                'options' => ['Encouraging', 'Doubtful', 'Neutral', 'Hopeful', 'Sympathetic'],
                'answer' => 'Doubtful',
                'category' => 'reading',
            ],
            [
                'text' => 'This is the happiest day of my life! The tone is ___.',
                'options' => ['Sad', 'Angry', 'Joyful', 'Sarcastic', 'Objective'],
                'answer' => 'Joyful',
                'category' => 'reading',
            ],
            [
                'text' => 'The scientist presents her findings cautiously, aware of possible errors. The tone is ___.',
                'options' => ['Confident', 'Cautious', 'Angry', 'Joyful', 'Hopeful'],
                'answer' => 'Cautious',
                'category' => 'reading',
            ],

            // ===================== B. Motivation / Purpose =====================
            [
                'text' => 'Plastic waste causes serious environmental problems. We must reduce its usage. The author’s purpose is ___.',
                'options' => ['To entertain', 'To inform', 'To persuade', 'To explain', 'To describe'],
                'answer' => 'To persuade',
                'category' => 'reading',
            ],
            [
                'text' => 'Mount Everest is the highest mountain in the world, standing at 8,848 meters. The purpose is ___.',
                'options' => ['To persuade', 'To inform', 'To entertain', 'To argue', 'To criticize'],
                'answer' => 'To inform',
                'category' => 'reading',
            ],
            [
                'text' => 'Once upon a time, a farmer found a golden goose that laid one egg every day. The purpose is ___.',
                'options' => ['To entertain', 'To inform', 'To persuade', 'To criticize', 'To explain'],
                'answer' => 'To entertain',
                'category' => 'reading',
            ],
            [
                'text' => 'The new phone has better cameras and faster processors than the old version. The author’s purpose is ___.',
                'options' => ['To persuade', 'To explain', 'To inform', 'To criticize', 'To argue'],
                'answer' => 'To inform',
                'category' => 'reading',
            ],
            [
                'text' => 'You should exercise regularly to maintain your health. The purpose is ___.',
                'options' => ['To persuade', 'To entertain', 'To inform', 'To explain', 'To describe'],
                'answer' => 'To persuade',
                'category' => 'reading',
            ],
            [
                'text' => 'Follow these steps to bake a chocolate cake: first, prepare the ingredients... The purpose is ___.',
                'options' => ['To persuade', 'To inform', 'To explain', 'To entertain', 'To criticize'],
                'answer' => 'To explain',
                'category' => 'reading',
            ],
            [
                'text' => 'The author warns readers about the dangers of smoking and encourages them to quit. The purpose is ___.',
                'options' => ['To persuade', 'To inform', 'To entertain', 'To explain', 'To describe'],
                'answer' => 'To persuade',
                'category' => 'reading',
            ],
            [
                'text' => 'The capital of Japan is Tokyo, a city with over 13 million residents. The purpose is ___.',
                'options' => ['To persuade', 'To inform', 'To explain', 'To entertain', 'To criticize'],
                'answer' => 'To inform',
                'category' => 'reading',
            ],
            [
                'text' => 'Don’t miss the opportunity! Buy one ticket and get one free! The purpose is ___.',
                'options' => ['To explain', 'To persuade', 'To inform', 'To describe', 'To entertain'],
                'answer' => 'To persuade',
                'category' => 'reading',
            ],
            [
                'text' => 'In this manual, you will learn how to operate the washing machine step by step. The purpose is ___.',
                'options' => ['To persuade', 'To entertain', 'To explain', 'To inform', 'To describe'],
                'answer' => 'To explain',
                'category' => 'reading',
            ],

            // ===================== C. Paraphrase =====================
            [
                'text' => 'She doesn’t like coffee. Which has the same meaning?',
                'options' => ['She enjoys coffee.', 'She hates coffee.', 'She doesn’t enjoy coffee.', 'She drinks coffee every day.', 'She likes coffee.'],
                'answer' => 'She doesn’t enjoy coffee.',
                'category' => 'reading',
            ],
            [
                'text' => 'The exam was too difficult for the students. Best paraphrase:',
                'options' => ['The exam was very easy.', 'The exam was so difficult that the students couldn’t do it.', 'The exam was quite simple.', 'The exam was difficult enough for the students.', 'The exam was not challenging.'],
                'answer' => 'The exam was so difficult that the students couldn’t do it.',
                'category' => 'reading',
            ],
            [
                'text' => 'He started studying English two years ago. Best paraphrase:',
                'options' => ['He has studied English for two years.', 'He studied English two years ago and stopped.', 'He will study English in two years.', 'He had studied English two years ago.', 'He has not studied English for two years.'],
                'answer' => 'He has studied English for two years.',
                'category' => 'reading',
            ],
            [
                'text' => 'It is not necessary for you to come early. Best paraphrase:',
                'options' => ['You must come early.', 'You don’t have to come early.', 'You should come early.', 'You are required to come early.', 'You need to come early.'],
                'answer' => 'You don’t have to come early.',
                'category' => 'reading',
            ],
            [
                'text' => 'Although it was raining, they continued playing. Best paraphrase:',
                'options' => ['They stopped playing because of the rain.', 'Despite the rain, they kept playing.', 'They didn’t play since it was raining.', 'They played before the rain started.', 'They waited until the rain stopped.'],
                'answer' => 'Despite the rain, they kept playing.',
                'category' => 'reading',
            ],
            [
                'text' => 'The manager is responsible for the decision. Best paraphrase:',
                'options' => ['The manager takes care of the decision.', 'The decision is the manager’s responsibility.', 'The manager has no relation to the decision.', 'The manager is against the decision.', 'The decision is unrelated to the manager.'],
                'answer' => 'The decision is the manager’s responsibility.',
                'category' => 'reading',
            ],
            [
                'text' => 'She is too young to drive a car. Best paraphrase:',
                'options' => ['She is so young that she cannot drive a car.', 'She is old enough to drive.', 'She is young and can drive a car.', 'She is the youngest person to drive a car.', 'She is not young to drive a car.'],
                'answer' => 'She is so young that she cannot drive a car.',
                'category' => 'reading',
            ],
            [
                'text' => 'This book is more interesting than that one. Best paraphrase:',
                'options' => ['That book is less interesting than this one.', 'This book is not interesting.', 'That book is more interesting.', 'Both books are equally interesting.', 'This book is boring.'],
                'answer' => 'That book is less interesting than this one.',
                'category' => 'reading',
            ],
            [
                'text' => 'I last saw him two days ago. Best paraphrase:',
                'options' => ['I haven’t seen him for two days.', 'I have seen him recently.', 'I will see him in two days.', 'I saw him yesterday.', 'I always see him every two days.'],
                'answer' => 'I haven’t seen him for two days.',
                'category' => 'reading',
            ],
            [
                'text' => 'The train had already left when we arrived. Best paraphrase:',
                'options' => ['We arrived, and then the train left.', 'The train left after we arrived.', 'The train had left before we arrived.', 'The train was leaving when we arrived.', 'We left together with the train.'],
                'answer' => 'The train had left before we arrived.',
                'category' => 'reading',
            ],

        ];

        // Loop semua soal dan insert ke database
        foreach ($allQuestions as $q) {
            $question = QuizQuestion::create([
                'category' => $q['category'],
                'text' => $q['text'],
                'options' => json_encode($q['options']),
                'answer' => $q['answer'],
            ]);

            $answers = [];
            foreach ($q['options'] as $opt) {
                $answers[] = [
                    'question_id' => $question->id,
                    'text' => $opt,
                    'is_correct' => $opt === $q['answer'],
                ];
            }
            QuizAnswer::insert($answers);
        }
    }
}

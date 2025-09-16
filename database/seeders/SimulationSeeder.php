<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SimulationQuestion;
use App\Models\SimulationAnswer;

class SimulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // --- Passage untuk soal 1-3 ---
        $reading = [
            ['author' => 'Sunny', 'date' => '04 September 2022, 06:15 PM', 'content' => 'School is the place where children start their journey towards a competitive life. However, it seems like it is high time that school authorities should take some steps to control the competition. So, should competition be moderated in schools?'],
            ['author' => 'Ardillo_87', 'date' => '05 September 2022, 07:45 AM', 'content' => 'A fish and a bird cannot compete as they have different strengths, and it is the same case with the students.'],
            ['author' => 'Mohades_002', 'date' => '07 September 2022, 06:49 AM', 'content' => 'Competition is a part of life, and whether the school or children want it or not, it will always exist. No one can moderate or control competition.'],
            ['author' => 'Harish Kumar', 'date' => '07 September 2022, 09:54 AM', 'content' => 'Competition plays a major role in shaping up students\' personality. However, too much of it is bad. It often leads to students getting involved in all kinds of wrong things just for the sake of winning. Competition in schools must be moderated so that healthy competition persists among the students.'],
            ['author' => 'Lexi_122', 'date' => '10 September 2022, 05:32 PM', 'content' => 'Schools can keep children away from competition for some time but sooner or later children have to face it. Schools and teachers take the responsibility to explain to children the meaning of healthy competition.'],
            ['author' => 'Deepa Kaushik', 'date' => '11 September 2022, 05:32 PM', 'content' => 'Competition is one good way to track performance. Only a serious competition can make children understand the value of hard work that leads to success.'],
        ];

        // --- Simpan passage sebagai question tipe 'passage' ---
        $passageQuestion = SimulationQuestion::create([
            'question' => 'This table is for question no. 1-3. Read it carefully!',
            'type' => 'passage',
            'subject' => 'English',
            'passage_content' => json_encode($reading)
        ]);

        // --- Soal 1 ---
        $q1 = SimulationQuestion::create([
            'question' => 'Who suggested moderating the school competition in order to create a healthy one?',
            'type' => 'option',
            'subject' => 'English'
        ]);

        SimulationAnswer::insert([
            ['simulation_question_id' => $q1->id, 'option' => 'A', 'text' => 'Mohades_002', 'is_correct' => false],
            ['simulation_question_id' => $q1->id, 'option' => 'B', 'text' => 'Lexi_122', 'is_correct' => false],
            ['simulation_question_id' => $q1->id, 'option' => 'C', 'text' => 'Ardillo_87', 'is_correct' => false],
            ['simulation_question_id' => $q1->id, 'option' => 'D', 'text' => 'Deepa Kaushik', 'is_correct' => false],
            ['simulation_question_id' => $q1->id, 'option' => 'E', 'text' => 'Harish Kumar', 'is_correct' => true],
        ]);

        // --- Soal 2 ---
        $q2 = SimulationQuestion::create([
            'question' => 'The word "persists" in Harish Kumar\'s post is closest in meaning to ....',
            'type' => 'option',
            'subject' => 'English'
        ]);

        SimulationAnswer::insert([
            ['simulation_question_id' => $q2->id, 'option' => 'A', 'text' => 'occurs', 'is_correct' => false],
            ['simulation_question_id' => $q2->id, 'option' => 'B', 'text' => 'remains', 'is_correct' => false],
            ['simulation_question_id' => $q2->id, 'option' => 'C', 'text' => 'continues', 'is_correct' => true],
            ['simulation_question_id' => $q2->id, 'option' => 'D', 'text' => 'prevails', 'is_correct' => false],
            ['simulation_question_id' => $q2->id, 'option' => 'E', 'text' => 'stays', 'is_correct' => false],
        ]);

        // --- Soal 3 ---
        $q3 = SimulationQuestion::create([
            'question' => 'What is the tone of the thread regarding the school competition?',
            'type' => 'option',
            'subject' => 'English'
        ]);

        SimulationAnswer::insert([
            ['simulation_question_id' => $q3->id, 'option' => 'A', 'text' => 'encouraging', 'is_correct' => false],
            ['simulation_question_id' => $q3->id, 'option' => 'B', 'text' => 'passionate', 'is_correct' => false],
            ['simulation_question_id' => $q3->id, 'option' => 'C', 'text' => 'objective', 'is_correct' => true],
            ['simulation_question_id' => $q3->id, 'option' => 'D', 'text' => 'biased', 'is_correct' => false],
            ['simulation_question_id' => $q3->id, 'option' => 'E', 'text' => 'humorous', 'is_correct' => false],
        ]);
    }
}

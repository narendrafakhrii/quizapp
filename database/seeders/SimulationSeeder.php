<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\SimulationQuestion;
use App\Models\SimulationAnswer;
use App\Models\Passage;

class SimulationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Truncate tables in correct order
        SimulationAnswer::truncate();
        SimulationQuestion::truncate();
        Passage::truncate();
        
        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // === PASSAGE 1: School Competition Discussion (Questions 1-3) ===
        $passage1 = Passage::create([
            'title' => 'School Competition Discussion',
            'type' => 'table',
            'subject' => 'English',
            'content' => [
                ['author' => 'Sunny', 'date' => '04 September 2022, 06:15 PM', 'content' => 'School is the place where children start their journey towards a competitive life. However, it seems like it is high time that school authorities should take some steps to control the competition. So, should competition be moderated in schools?'],
                ['author' => 'Ardillo_87', 'date' => '05 September 2022, 07:45 AM', 'content' => 'A fish and a bird cannot compete as they have different strengths, and it is the same case with the students.'],
                ['author' => 'Mohades_002', 'date' => '07 September 2022, 06:49 AM', 'content' => 'Competition is a part of life, and whether the school or children want it or not, it will always exist. No one can moderate or control competition.'],
                ['author' => 'Harish Kumar', 'date' => '07 September 2022, 09:54 AM', 'content' => 'Competition plays a major role in shaping up students\' personality. However, too much of it is bad. It often leads to students getting involved in all kinds of wrong things just for the sake of winning. Competition in schools must be moderated so that healthy competition persists among the students.'],
                ['author' => 'Lexi_122', 'date' => '10 September 2022, 05:32 PM', 'content' => 'Schools can keep children away from competition for some time but sooner or later children have to face it. Schools and teachers take the responsibility to explain to children the meaning of healthy competition.'],
                ['author' => 'Deepa Kaushik', 'date' => '11 September 2022, 05:32 PM', 'content' => 'Competition is one good way to track performance. Only a serious competition can make children understand the value of hard work that leads to success.'],
            ],
        ]);

        $this->createQuestionsForPassage($passage1, [
            [
                'question' => 'Who suggested moderating the school competition in order to create a healthy one?',
                'answers' => [
                    ['option' => 'A', 'text' => 'Mohades_002', 'is_correct' => false],
                    ['option' => 'B', 'text' => 'Lexi_122', 'is_correct' => false],
                    ['option' => 'C', 'text' => 'Ardillo_87', 'is_correct' => false],
                    ['option' => 'D', 'text' => 'Deepa Kaushik', 'is_correct' => false],
                    ['option' => 'E', 'text' => 'Harish Kumar', 'is_correct' => true],
                ],
            ],
            [
                'question' => 'The word "persists" in Harish Kumar\'s post is closest in meaning to ....',
                'answers' => [
                    ['option' => 'A', 'text' => 'occurs', 'is_correct' => false],
                    ['option' => 'B', 'text' => 'remains', 'is_correct' => false],
                    ['option' => 'C', 'text' => 'continues', 'is_correct' => true],
                    ['option' => 'D', 'text' => 'prevails', 'is_correct' => false],
                    ['option' => 'E', 'text' => 'stays', 'is_correct' => false],
                ],
            ],
            [
                'question' => 'What is the tone of the thread regarding the school competition?',
                'answers' => [
                    ['option' => 'A', 'text' => 'encouraging', 'is_correct' => false],
                    ['option' => 'B', 'text' => 'passionate', 'is_correct' => false],
                    ['option' => 'C', 'text' => 'objective', 'is_correct' => true],
                    ['option' => 'D', 'text' => 'biased', 'is_correct' => false],
                    ['option' => 'E', 'text' => 'humorous', 'is_correct' => false],
                ],
            ],
        ]);

        // === PASSAGE 2: Plastic Pollution (Questions 4-6) ===
        $passage2 = Passage::create([
            'title' => 'Plastic Pollution Solutions',
            'type' => 'two_text',
            'subject' => 'English',
            'content' => [
                [
                    'text_number' => 1,
                    'title' => 'TEXT 1',
                    'content' => 'In 2010, researchers estimated that 8 billion kg of plastic entered the ocean in a single year, and that number would sharply increase by 2025. When it enters the ocean, plastic waste disrupts marine ecosystems, travels to central locations, and forms a trash island which can cover an area of more than 1.6 million square km. These plastics never degrade, but rather break up into smaller sizes. They eventually become microplastics that stay in the environment for hundreds of years.\n\nScientists at the University of California San Diego have invented a new biodegradable material that is designed to replace the commonly used plastics. The material started to biodegrade in seawater within four weeks. The team found that various marine organisms colonize the material and break it into nutrients for their consumption.\n\nThe research of this new plastic is joined by experts in biology, chemistry, and marine science. They have shown that it is possible to make durable plastics that also can degrade in the ocean. Plastics should not be going into the ocean in the first place. But now, if they do, this new plastic can become food for microorganisms and not harmful trash.'
                ],
                [
                    'text_number' => 2,
                    'title' => 'TEXT 2',
                    'content' => 'Plastic is everywhere and important to the growth of many industries, such as packaging, building, and automotive. About 83.5% of consumer products rely on plastic in some ways. Food without plastic packaging would spoil long before it reaches consumers\' fridges. PVC pipes made of plastic are an essential building part that reduce leakage and corrosion to conserve water and energy. Plastics make cars dramatically lighter, which increases fuel efficiency.\n\nResearchers have been working to improve the plastic recycling process since it was realized that plastic was harming the environment. Recycling plastic not only helps the environment and reduces trash, but it also creates more jobs. The recycling sector generates up to 30 times more jobs than the common disposal sector. In fact, Tellus Institute reports that over 1.5 million new jobs would be created if the national recycling rate could be increased to 75%.\n\nModern recycling techniques can transform plastic into more useful products. Some experts have seen the opportunity to make jet fuel from plastic. However, even a simple recycling strategy has commercial benefits. Over 3 million plastic bottles have already been converted into pillow fillers by IHG Hotels & Resorts. Customers are happy to sleep well and use a product that benefits the environment, according to IHG. And it is all thanks to plastic.'
                ]
            ],
        ]);

        $this->createQuestionsForPassage($passage2, [
            [
                'question' => 'Which of the following statements is an opinion from Text 1?',
                'answers' => [
                    ['option' => 'A', 'text' => 'These plastics never degrade, but rather break up into smaller sizes.', 'is_correct' => false],
                    ['option' => 'B', 'text' => 'Recycling plastic not only helps the environment and reduces trash, but it also creates more jobs.', 'is_correct' => false],
                    ['option' => 'C', 'text' => 'Plastics should not be going into the ocean in the first place.', 'is_correct' => true],
                    ['option' => 'D', 'text' => 'They eventually become microplastics that stay in the environment for hundreds of years.', 'is_correct' => false],
                    ['option' => 'E', 'text' => 'Customers are happy to sleep well and use a product that benefits the environment.', 'is_correct' => false],
                ],
            ],
            [
                'question' => 'What is the relationship between Texts 1 and 2?',
                'answers' => [
                    ['option' => 'A', 'text' => 'Text 1 discusses the biodegradable material used in many useful products explained in Text 2.', 'is_correct' => false],
                    ['option' => 'B', 'text' => 'Text 1 explains how biodegradable material can help improve the plastic recycling process discussed in Text 2.', 'is_correct' => false],
                    ['option' => 'C', 'text' => 'Both texts explain what scientists have done to provide plastics which do not harm the environment.', 'is_correct' => true],
                    ['option' => 'D', 'text' => 'Text 2 explains how new plastic material mentioned in Text 1 is recycled to create more jobs.', 'is_correct' => false],
                    ['option' => 'E', 'text' => 'Text 2 discusses the plastic recycling process that has been improved by the research findings explained in Text 1.', 'is_correct' => false],
                ],
            ],
            [
                'question' => 'Based on information from the two texts, which of the following will most likely happen in the future?',
                'answers' => [
                    ['option' => 'A', 'text' => 'Plastic waste in the ocean is unavoidable.', 'is_correct' => false],
                    ['option' => 'B', 'text' => 'It is impossible to preserve customer food without biodegradable plastics.', 'is_correct' => false],
                    ['option' => 'C', 'text' => 'Disposing plastic waste into seawater will create more job opportunities.', 'is_correct' => false],
                    ['option' => 'D', 'text' => 'Marine organisms can be used to recycle plastics into pillows.', 'is_correct' => false],
                    ['option' => 'E', 'text' => 'There is no need to completely ban plastic usage from this world.', 'is_correct' => true],
                ],
            ],
        ]);

        // === PASSAGE 3: Retirement Planning (Questions 7-10) ===
        $passage3 = Passage::create([
            'title' => 'Retirement and Financial Planning',
            'type' => 'two_text',
            'subject' => 'English',
            'content' => [
                [
                    'text_number' => 1,
                    'title' => 'TEXT 1',
                    'content' => 'You\'ve been working and saving for decades for just this moment: retirement. Even though you may be ready to stop working full-time, now comes the hard part: letting yourself use your savings, since you no longer will be bringing in that paycheck, which until now has covered your monthly expenses. Making the psychological shift from saver to spender is no small effort for most people.\n\n"Now you have this lump sum and have to draw it down. For some it\'s almost physically painful," said David John, a senior strategic policy advisor. Unpredictable factors like market performance, life expectancy, and health issues make spending your money easier said than done. That\'s why people may be hesitant to tap their savings because they think, "I have X dollars and it has to last me my whole life, but I have a very uncertain future. So, if I touch that I\'m putting myself at risk."\n\nResearch shows that among retirees with savings, many do not draw down very much, choosing instead to live off fixed sources of funds, such as Social Security, pensions, or income from part-time work they take up. A study found that the vast majority of retirees in America still have at least 80% of their savings after two decades in retirement. No doubt this is partly because they are among the last generation of workers to benefit from corporate pensions.\n\nThe psychological reluctance to tap one\'s savings is a factor for most people regardless of their financial condition. It may become more acute for soon-to-be retirees as they face inflation, unstable markets, and a lack of pensions, John said. They\'re trying to figure out who they are now that their primary career is over and figuring out what they can and can\'t do financially.'
                ],
                [
                    'text_number' => 2,
                    'title' => 'TEXT 2',
                    'content' => 'It\'s hard to manage your money well in retirement unless you\'re realistic about what you have. The first thing to do is to make a budget and sketch out a plan to cover your expenses.\n\nBefore retiring, keep track of your spending and regular expenses, like housing, food, health care, etc. Then assess how those expenses might change in retirement (e.g., if you plan to move to a less expensive home or area; and if your insurance costs will be subsidized by your old employer).\n\nYou should also consider paying for a child\'s wedding, buying a car, or taking a major vacation. Then assess what fixed income you will have coming in (e.g., Social Security or pension payments). The difference between your expected spending and your fixed income is the amount you will need to draw from your savings.\n\nIt would also help to consult with a professional. A financial advisor can help you strategize how to manage and use your money in the years ahead. The one common feeling is that people say they are overwhelmed with all the choices they need to make to live off their savings in retirement. With the different types of accounts many have, the potential for penalties and higher taxes if withdrawals are taken incorrectly, and sorting out how their investments may need to shift for retirement income, it can be a lot for a new retiree to get their head around.'
                ]
            ],
        ]);

        $this->createQuestionsForPassage($passage3, [
            [
                'question' => 'What is the main idea of Text 1?',
                'answers' => [
                    ['option' => 'A', 'text' => 'Life uncertainty is happening among newly retired people in America.', 'is_correct' => false],
                    ['option' => 'B', 'text' => 'There are some reasons why retirees use their savings.', 'is_correct' => false],
                    ['option' => 'C', 'text' => 'The retirees\' financial condition affects how much they are willing to spend their savings.', 'is_correct' => false],
                    ['option' => 'D', 'text' => 'Most retirees in America do not use their savings a lot in retirement.', 'is_correct' => true],
                    ['option' => 'E', 'text' => 'How the newly retired people spend their savings is quite similar.', 'is_correct' => false],
                ],
            ],
            [
                'question' => 'Which of the following best restates the second sentence in Paragraph 1 in Text 2?',
                'answers' => [
                    ['option' => 'A', 'text' => 'Covering all costs is the first thing to plan in relation to budget expenses.', 'is_correct' => false],
                    ['option' => 'B', 'text' => 'Preparing a budget and drafting a plan of your costs is the first thing you should carry out.', 'is_correct' => true],
                    ['option' => 'C', 'text' => 'Planning and calculating the budget expenses is the first thing to be carried out.', 'is_correct' => false],
                    ['option' => 'D', 'text' => 'Drafting your plan that includes your costs should be done first to prepare a good budget.', 'is_correct' => false],
                    ['option' => 'E', 'text' => 'Budgeting and planning should be prepared first to be able to pay your costs.', 'is_correct' => false],
                ],
            ],
            [
                'question' => 'The purpose of Text 2 is to ....',
                'answers' => [
                    ['option' => 'A', 'text' => 'provide advice for newly retired people on how to manage their money in retirement.', 'is_correct' => true],
                    ['option' => 'B', 'text' => 'explain the process of managing your expenses during retirement.', 'is_correct' => false],
                    ['option' => 'C', 'text' => 'explain how to get a professional financial advisor to manage your savings after you retire.', 'is_correct' => false],
                    ['option' => 'D', 'text' => 'discuss what newly retired people should do to monitor their expenses.', 'is_correct' => false],
                    ['option' => 'E', 'text' => 'argue which investment is the best for retirement income.', 'is_correct' => false],
                ],
            ],
            [
                'question' => 'Which of the following statements shows the author\'s positive attitude toward an investment analyst?',
                'answers' => [
                    ['option' => 'A', 'text' => '"For some it\'s almost physically painful," said David John, a senior strategic policy advisor.', 'is_correct' => false],
                    ['option' => 'B', 'text' => 'No doubt this is partly because they are among the last generation of workers to benefit from corporate pensions.', 'is_correct' => false],
                    ['option' => 'C', 'text' => 'They\'re trying to figure out who they are now that their primary career is over and figuring out what they can and can\'t do financially.', 'is_correct' => false],
                    ['option' => 'D', 'text' => 'It\'s hard to manage your money well in retirement unless you\'re realistic about what you have.', 'is_correct' => false],
                    ['option' => 'E', 'text' => 'A financial advisor can help you strategize how to manage and use your money in the years ahead.', 'is_correct' => true],
                ],
            ],
        ]);

        // === PASSAGE 4: Thrift Store Business (Questions 11-13) ===
        $passage4 = Passage::create([
            'title' => 'The Thrift Store Business Revolution',
            'type' => 'paragraph',
            'subject' => 'English',
            'content' => [
                ['content' => 'The thrift store business has gone big-time. What used to be a local, mom-and-pop business has been tech-enabled. The technology inclusion allows what were local inventories of unique items to be available worldwide, the resale business, as it is now known, has scaled up. All are facilitated by venture capital and private equity. This business type handles thousands of items and hundreds of millions of dollars of product. The appeal is manifold. Consumers save money on brands they love and help the environment by giving old products new life. Consumers can turn their old stuff into money to buy replacement or other products. The impact goes well beyond resale and has potential to further chip away at the performance of department stores and off-price retailers like Burlington Coat, TJX.']
            ],
        ]);

        $this->createQuestionsForPassage($passage4, [
            [
                'question' => 'The underlined word "appeal" in the passage means ....',
                'answers' => [
                    ['option' => 'A', 'text' => 'Bargaining', 'is_correct' => false],
                    ['option' => 'B', 'text' => 'Attractiveness', 'is_correct' => true],
                    ['option' => 'C', 'text' => 'Request', 'is_correct' => false],
                    ['option' => 'D', 'text' => 'Preparedness', 'is_correct' => false],
                    ['option' => 'E', 'text' => 'Reasoning', 'is_correct' => false],
                ],
            ],
            [
                'question' => 'The underlined word "can" in the passage means ....',
                'answers' => [
                    ['option' => 'A', 'text' => 'Possibility', 'is_correct' => true],
                    ['option' => 'B', 'text' => 'Request', 'is_correct' => false],
                    ['option' => 'C', 'text' => 'Recommendation', 'is_correct' => false],
                    ['option' => 'D', 'text' => 'Ability', 'is_correct' => false],
                    ['option' => 'E', 'text' => 'Certainty', 'is_correct' => false],
                ],
            ],
            [
                'question' => '.... plays an important role in the rise and success of resale business.',
                'answers' => [
                    ['option' => 'A', 'text' => 'Consumption', 'is_correct' => false],
                    ['option' => 'B', 'text' => 'Environment', 'is_correct' => false],
                    ['option' => 'C', 'text' => 'Application', 'is_correct' => false],
                    ['option' => 'D', 'text' => 'Technology', 'is_correct' => true],
                    ['option' => 'E', 'text' => 'Performance', 'is_correct' => false],
                ],
            ],
        ]);

        // === PASSAGE 5: College Admission and Perfection (Questions 14-16) ===
        $passage5 = Passage::create([
            'title' => 'College Admission: Beyond Perfection',
            'type' => 'paragraph',
            'subject' => 'English',
            'content' => [
                ['content' => 'I ask every student I interview for admission to my institution, Pitzer College, the same question: "What do you look forward to the most in college?" I was stunned and delighted recently when a student sat across from me at a Starbucks in New York City and replied, "I look forward to the possibility of failure." Of course, this is not how most students respond to the question when sitting before the person who makes decisions about their academic futures. However, this young man took a risk. They do silly things, mess up, fall down, and lack confidence.'],
                ['content' => '"My parents have never let me fail," he said. "When I want to take a chance at something, they remind me it\'s not a safe route to take. Taking a more rigorous course or trying an activity I may not succeed in, they tell me, will ruin my chances at college admission."'],
                ['content' => 'I wish I could tell you this is an uncommon story, but kids all over the world admit they are under tremendous pressure to be perfect. When I was traveling in China last fall and asked a student what she did for fun, she replied: "I thought I wasn\'t supposed to tell you that? I wouldn\'t want you to think I am not serious about my work!"'],
                ['content' => 'Students are usually in shock when I chuckle and tell them I never expect perfection. In fact, I prefer they not project it in their college applications. Of course, this goes against everything they\'ve been told and makes young people uncomfortable. How could a dean of admission at one of America\'s most selective institutions not want the best and the brightest? The reality is, perfection does not exist, and we do not expect to see it in a college application. In fact, admission officers tend to be skeptical of students who present themselves as individuals without flaws.'],
                ['content' => 'These days, finding imperfections in a college application is like looking for a needle in a haystack. Students try their best to hide factors they perceive to be negative and only tell us things they believe we will find impressive.']
            ],
        ]);

        $this->createQuestionsForPassage($passage5, [
            [
                'question' => 'Which sentence is not relevant in paragraph 1?',
                'answers' => [
                    ['option' => 'A', 'text' => 'Sentence 1', 'is_correct' => false],
                    ['option' => 'B', 'text' => 'Sentence 2', 'is_correct' => false],
                    ['option' => 'C', 'text' => 'Sentence 3', 'is_correct' => false],
                    ['option' => 'D', 'text' => 'Sentence 4', 'is_correct' => false],
                    ['option' => 'E', 'text' => 'Sentence 5', 'is_correct' => true],
                ],
            ],
            [
                'question' => 'Which paragraph illustrates that college admission accept imperfection?',
                'answers' => [
                    ['option' => 'A', 'text' => 'Paragraph 1', 'is_correct' => false],
                    ['option' => 'B', 'text' => 'Paragraph 2', 'is_correct' => false],
                    ['option' => 'C', 'text' => 'Paragraph 3', 'is_correct' => false],
                    ['option' => 'D', 'text' => 'Paragraph 4', 'is_correct' => true],
                    ['option' => 'E', 'text' => 'Paragraph 5', 'is_correct' => false],
                ],
            ],
            [
                'question' => 'How are ideas in sentences 1 and 2 in paragraph 4 related?',
                'answers' => [
                    ['option' => 'A', 'text' => 'Sentence 1 indicates the students are fine to be imperfect, and sentence 2 provides the reason.', 'is_correct' => false],
                    ['option' => 'B', 'text' => 'Sentence 1 explains that students should show perfection, and sentence 2 agrees with it.', 'is_correct' => false],
                    ['option' => 'C', 'text' => 'Sentence 1 states that the students are allowed to be imperfect, and sentence 2 confirms it.', 'is_correct' => true],
                    ['option' => 'D', 'text' => 'Sentence 1 argues what students should do, and sentence 2 counters the argument.', 'is_correct' => false],
                    ['option' => 'E', 'text' => 'Sentence 2 shows that the students are surprised with what is stated in sentence 1.', 'is_correct' => false],
                ],
            ],
        ]);

        // === PASSAGE 6: Vaping and E-cigarettes (Questions 17-20) ===
        $passage6 = Passage::create([
            'title' => 'The Vaping Debate: Safety and Regulations',
            'type' => 'paragraph',
            'subject' => 'English',
            'content' => [
                ['content' => 'A doctor in pediatric respiratory medicine reported that with the rising popularity of vaping, hospitals are treating many life-threatening cases. The doctor is concerned that e-cigarettes are advertised in the UK, given the severe reactions they can cause in children and the lack of scientific studies on their safety.'],
                ['content' => 'E-cigarettes are promoted in the UK as a way to quit smoking because they let people inhale nicotine in vapor rather than breathing in smoke. The Director of Public Health England said vaping is 95% safer than smoking but is not without risks. He asserted that smoking kills half of lifelong smokers and accounts for almost 220 deaths in England every day. While it is not completely risk-free, UK-regulated e-cigarettes carry only a fraction of the risk of smoked tobacco.'],
                ['content' => 'This is supported by Dr. Hopkinson, the Medical Director of the British Lung Foundation. He stated that if people switch completely from smoking to vaping, they will substantially reduce their health risks, as e-cigarettes do not contain tobacco and any harmful components are present at a much lower level. He advises people who switch to vaping to try to quit vaping in the long term too, but not at the expense of relapsing to smoking.'],
                ['content' => 'However, there are arguments about how safe vaping really is. The World Health Organization says e-cigarettes are undoubtedly harmful and should therefore be subject to regulation. It also raises concerns about vaping being aggressively marketed at young people, as well as the possibility of e-smoking leading to the re-normalizing of smoking.'],
                ['content' => 'A researcher studying the effects of vaping said the findings show that vaping is not safe, especially for the lungs or for young people. He believes that it is dangerous to announce that e-cigarettes are much safer than tobacco.'],
                ['content' => 'In conclusion, the best advice that can be given is: "If you smoke, switch to vaping; if you don\'t smoke, don\'t vape."']
            ],
        ]);

        $this->createQuestionsForPassage($passage6, [
            [
                'question' => 'The paragraph preceding the passage most likely concerns ...',
                'answers' => [
                    ['option' => 'A', 'text' => 'A severe lung disease triggered by vaping that nearly caused the death of a young patient.', 'is_correct' => false],
                    ['option' => 'B', 'text' => 'Statistics on diseases that inflict young people who are smoking e-cigarettes.', 'is_correct' => false],
                    ['option' => 'C', 'text' => 'Pediatric respiratory medicine and its role in keeping young people healthy.', 'is_correct' => false],
                    ['option' => 'D', 'text' => 'A national campaign to ban vaping and e-cigarettes among students.', 'is_correct' => false],
                    ['option' => 'E', 'text' => 'The growing popularity of vaping and e-cigarettes.', 'is_correct' => true],
                ],
            ],
            [
                'question' => 'What is the author\'s attitude toward the topic of the passage?',
                'answers' => [
                    ['option' => 'A', 'text' => 'Anxious', 'is_correct' => false],
                    ['option' => 'B', 'text' => 'Neutral', 'is_correct' => false],
                    ['option' => 'C', 'text' => 'Ambiguous', 'is_correct' => false],
                    ['option' => 'D', 'text' => 'Doubtful', 'is_correct' => false],
                    ['option' => 'E', 'text' => 'Concerned', 'is_correct' => true],
                ],
            ],
            [
                'question' => 'Which of the following is the best summary of the passage?',
                'answers' => [
                    ['option' => 'A', 'text' => 'Vaping is being aggressively advertised as an effective means to help smokers stop this habit. As a result, both smokers and non-smokers are turning to e-cigarettes. This might reduce the number of deaths caused by smoking.', 'is_correct' => false],
                    ['option' => 'B', 'text' => 'Severe lung diseases caused by vaping have caused a lot of concern among health authorities in the UK. This is mainly caused by the successful marketing strategies of e-cigarettes who are targeting the most vulnerable sector, the youth.', 'is_correct' => false],
                    ['option' => 'C', 'text' => 'A heated argument is going on about the benefits and safety of vaping. The parties against vaping say that there is no scientific evidence that it is safe. However, opposing parties claim that vaping is 95 percent safer than smoking which caused the deaths of hundreds of people daily.', 'is_correct' => false],
                    ['option' => 'D', 'text' => 'It is argued that vaping is much safer than smoking and can be used as a method to stop smoking. Nevertheless, arguments are being raised about its safety. There is evidence that it can cause severe reactions, particularly in teenager. Therefore, people who are non-smokers are advised to avoid vaping.', 'is_correct' => true],
                    ['option' => 'E', 'text' => 'Although vaping has already caused some deaths among young people, nothing has been done to prohibit the marketing of e-cigarettes. This is because health authorities believe that it is still better on vape than to smoke regular tobacco cigarettes. The latter takes the live of approximately 200 people a day.', 'is_correct' => false],
                ],
            ],
            [
                'question' => 'From the passage it can be concluded that the more ....',
                'answers' => [
                    ['option' => 'A', 'text' => 'People start e-smoking, the less possible it is for them to completely stop smoking', 'is_correct' => false],
                    ['option' => 'B', 'text' => 'E-cigarettes are marketed, the more young people will be buying tobacco-based cigarettes', 'is_correct' => false],
                    ['option' => 'C', 'text' => 'E-cigarettes are advertised in the UK, the more young people will be attracted to start vaping', 'is_correct' => true],
                    ['option' => 'D', 'text' => 'People know about the risks of vaping, the less important it is to do research on its effects on its users', 'is_correct' => false],
                    ['option' => 'E', 'text' => 'Research is done on the effects of vaping in the UK, the more evidence will be gained about the dangers of smoking', 'is_correct' => false],
                ],
            ]
        ]);

        // === PASSAGE 7: Lullabies (Questions 21-25) ===
        $passage7 = Passage::create([
            'title' => 'The Science of Lullabies',
            'type' => 'paragraph',
            'subject' => 'English',
            'content' => [
                ['content' => 'The song comes alive as night draws in. Beneath the blanket, between the folds of cradling arms, in rooms across the world, a hidden chorus of caregivers fills the night with song to an audience of children. They are singing lullabies.'],
                ['content' => 'Across cultures, lullabies echo the histories of those who sing them. There is a growing body of research about how lullabies help soothe both caregiver and child.'],
                ['content' => 'Laura Cirelli, professor of developmental psychology at the University of Toronto, studies the science of maternal song. She found that when mothers sang lullabies, stress levels dropped not just for the baby but for mothers as well. In her most recent work, she discovered that familiar songs soothed babies the most—more than speaking or hearing unfamiliar songs.'],
                ['content' => 'However, lullabies tend to have collections of features across cultures. The Harvard University\'s Music Lab project found that people can hear universal traits in music—even when they are listening to songs from other cultures. The project asked 29,000 participants to listen to 118 songs and identify whether it was a healing song, a dance song, a love song, or a lullaby, with the findings statistically showing that people are most consistent in identifying lullabies.'],
            ],
        ]);

$this->createQuestionsForPassage($passage7, [
    [
        'question' => 'According to the passage, singing lullabies can ... the stress of both mothers and children.',
        'answers' => [
            ['option' => 'A', 'text' => 'Remove', 'is_correct' => false],
            ['option' => 'B', 'text' => 'Recover', 'is_correct' => false],
            ['option' => 'C', 'text' => 'Replace', 'is_correct' => false],
            ['option' => 'D', 'text' => 'Reduce', 'is_correct' => true],
            ['option' => 'E', 'text' => 'Release', 'is_correct' => false],
        ],
    ],
    [
        'question' => 'The word "soothed" in paragraph 2 in the passage is closest in meaning to ....',
        'answers' => [
            ['option' => 'A', 'text' => 'Entertained', 'is_correct' => false],
            ['option' => 'B', 'text' => 'Calmed', 'is_correct' => true],
            ['option' => 'C', 'text' => 'Cheered', 'is_correct' => false],
            ['option' => 'D', 'text' => 'Satisfied', 'is_correct' => false],
            ['option' => 'E', 'text' => 'Replaced', 'is_correct' => false],
        ],
    ],
    [
        'question' => 'If unknown songs ... babies will not sleep so easily.',
        'answers' => [
            ['option' => 'A', 'text' => 'are delivered', 'is_correct' => true],
            ['option' => 'B', 'text' => 'are delivering', 'is_correct' => false],
            ['option' => 'C', 'text' => 'delivered', 'is_correct' => false],
            ['option' => 'D', 'text' => 'were delivered', 'is_correct' => false],
            ['option' => 'E', 'text' => 'to deliver', 'is_correct' => false],
        ],
    ],
    [
        'question' => 'Lullabies ... be identified consistently by most participants in the lab project.',
        'answers' => [
            ['option' => 'A', 'text' => 'should', 'is_correct' => false],
            ['option' => 'B', 'text' => 'could', 'is_correct' => true],
            ['option' => 'C', 'text' => 'ought to', 'is_correct' => false],
            ['option' => 'D', 'text' => 'must', 'is_correct' => false],
            ['option' => 'E', 'text' => 'would', 'is_correct' => false],
        ],
    ],
    [
        'question' => 'The paragraph following the passage most likely concerns ...',
        'answers' => [
            ['option' => 'A', 'text' => 'Negative effects of lullabies for mothers and babies', 'is_correct' => false],
            ['option' => 'B', 'text' => 'Comparison of traditional and modern lullabies', 'is_correct' => false],
            ['option' => 'C', 'text' => 'Other studies about lullabies conducted in many modern countries', 'is_correct' => false],
            ['option' => 'D', 'text' => 'Comparison between maternal and paternal song', 'is_correct' => false],
            ['option' => 'E', 'text' => 'Infants\' responses to lullabies from various cultures', 'is_correct' => true],
        ],
    ],
]);

// === PASSAGE 8: Sports (Questions 26-30) ===
$passage8 = Passage::create([
    'title' => 'The Importance of Sports',
    'type' => 'paragraph',
    'subject' => 'English',
    'content' => [
        ['content' => 'Sport refers to an activity involving physical activity and skill. Sports are an integral part of human, and there is importance of sports in all spheres of life. Sports have a massive positive effect both physically and mentally.'],
        ['content' => 'First of all, from the physical point of view, sports strengthen the heart. They serve as an excellent preventive measure against heart diseases leading to an increased life expectancy of individuals. They involve physical activity of the body, because of which blood vessels remain clean. Besides, they reduce the amount of cholesterol and fats in the body because of the increase of flexibility of the wall of the blood vessels. Such flexibility increases due to physical exertion, which is the result of sports.'],
        ['content' => '(1) In addition, sports make a person experience a good quality of breathing. (2) They strengthen the lungs of the body in particular ways. (3) Sports are particularly helpful in making our body fit and slim. (4) By escalating the lung capacity and efficiency of the body, more oxygen enters the blood which is extremely beneficial. (5) Furthermore, there are fewer chances of developing lung diseases due to sports.'],
        ['content' => 'Moreover, from the mental point of view, sports bring discipline in life. They teach the values of dedication and patience. Besides, they also teach people how to handle failure because of a number of difficulties of movements found in sports. The importance of following a time schedule is also present in sport, requiring people to be punctual.'],
        ['content' => 'Finally, sports reduce the stress of mind. People who play sports would certainly experience less depression because sports can ensure the peace of their mind. Most noteworthy, they bring happiness and joy in the life of people who play them.'],
    ],
]);

$this->createQuestionsForPassage($passage8, [
    [
        'question' => 'The author describes the effect of sports on mental health in paragraph ....',
        'answers' => [
            ['option' => 'A', 'text' => '1', 'is_correct' => false],
            ['option' => 'B', 'text' => '2', 'is_correct' => false],
            ['option' => 'C', 'text' => '3', 'is_correct' => false],
            ['option' => 'D', 'text' => '4', 'is_correct' => false],
            ['option' => 'E', 'text' => '5', 'is_correct' => true],
        ],
    ],
    [
        'question' => 'The authors would apparently agree that the relationship between sports and heart disease discussed in the passage is similar to phenomenon between ....',
        'answers' => [
            ['option' => 'A', 'text' => 'Players and their coach', 'is_correct' => false],
            ['option' => 'B', 'text' => 'Ambulance and hospital', 'is_correct' => false],
            ['option' => 'C', 'text' => 'Engine and cars', 'is_correct' => false],
            ['option' => 'D', 'text' => 'Vaccine and Covid-19', 'is_correct' => true],
            ['option' => 'E', 'text' => 'Windows and house', 'is_correct' => false],
        ],
    ],
    [
        'question' => 'The irrelevant statement in paragraphs 3 is sentence ....',
        'answers' => [
            ['option' => 'A', 'text' => '1', 'is_correct' => false],
            ['option' => 'B', 'text' => '2', 'is_correct' => false],
            ['option' => 'C', 'text' => '3', 'is_correct' => true],
            ['option' => 'D', 'text' => '4', 'is_correct' => false],
            ['option' => 'E', 'text' => '5', 'is_correct' => false],
        ],
    ],
    [
        'question' => 'Regarding the advantages of sports to people\'s life, the more .... the less ....',
        'answers' => [
            ['option' => 'A', 'text' => 'Time people spend for sports – life enjoyment they have', 'is_correct' => false],
            ['option' => 'B', 'text' => 'People inhale oxygen – possibility they suffer from lung diseases', 'is_correct' => false],
            ['option' => 'C', 'text' => 'Flexible the walls of their blood vessels are – fats people will have', 'is_correct' => true],
            ['option' => 'D', 'text' => 'People get involved in sports – people want to become punctual', 'is_correct' => false],
            ['option' => 'E', 'text' => 'Difficulties people face in playing sports – their interest to do sport will be', 'is_correct' => false],
        ],
    ],
    [
        'question' => 'Here are the jumbled sentences from the paragraph that follows the above paragraph. Please reorder the following sentences. 
a. Sport is an aspect of human life that is of paramount important 
b. This is because it is as important as education 
c. Everyone must perform at least one sport activity on a regular basis 
d. It certainly increases the quality of human life 
e. Therefore, it must be made mandatory in schools 
The best order of sentences above is ....',
        'answers' => [
            ['option' => 'A', 'text' => 'a-d-e-b-c', 'is_correct' => false],
            ['option' => 'B', 'text' => 'a-b-d-e-c', 'is_correct' => false],
            ['option' => 'C', 'text' => 'a-c-e-b-d', 'is_correct' => false],
            ['option' => 'D', 'text' => 'a-c-e-d-b', 'is_correct' => false],
            ['option' => 'E', 'text' => 'a-d-b-c-e', 'is_correct' => true],
        ],
    ],
]);



        $this->command->info('Successfully seeded 3 passages with their questions!');
    }

    /**
     * Helper method to create questions for a specific passage
     */
    private function createQuestionsForPassage(Passage $passage, array $questionsData)
    {
        foreach ($questionsData as $qData) {
            $question = SimulationQuestion::create([
                'question' => $qData['question'],
                'type' => 'option',
                'subject' => $passage->subject,
                'passage_id' => $passage->id,
            ]);

            foreach ($qData['answers'] as $answerData) {
                SimulationAnswer::create([
                    'simulation_question_id' => $question->id,
                    'option' => $answerData['option'],
                    'text' => $answerData['text'],
                    'is_correct' => $answerData['is_correct'],
                ]);
            }
        }
    }
}
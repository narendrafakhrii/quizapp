<?php

namespace App\Http\Controllers;

use App\Models\Learn;
use App\Models\LearnProgress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearnController extends Controller
{
    // Halaman daftar materi
    public function index()
    {
        // Hardcode 4 materi utama
        $learns = [
[
    'title' => 'Grammar',
    'group' => 'grammar',
    'slides' => 10,
    'icon' => json_decode('"\uD83D\uDCDA"'),
],
[
    'title' => 'Vocabulary',
    'group' => 'vocabulary',
    'slides' => 36,
    'icon' => json_decode('"\u270F\uFE0F"'),
],
[
    'title' => 'Reading Comprehension',
    'group' => 'reading-comprehension',
    'slides' => 12,
    'icon' => json_decode('"\uD83D\uDCD6"'),
],
        ];

        // Ambil progress user dari tabel learn_progress
        $userId = Auth::id();
        $progressData = LearnProgress::where('user_id', $userId)->get()->keyBy('learn_group');

        // Gabungkan progress ke setiap item
        $learns = collect($learns)->map(function ($item) use ($progressData) {
        $item['progress'] = $progressData[$item['group']]->progress ?? 0;
        return $item;
    });

        return view('learn', compact('learns'));
    }

    // Halaman slide per materi
    public function show($group)
    {
        // mapping slug → group di database
        $map = [
            'grammar' => 'grammar',
            'vocabulary' => 'vocabulary',
            'reading-comprehension' => 'reading-comprehension',
        ];

        $dbGroup = $map[$group] ?? $group;

        // Ambil semua slide sesuai group
        $slides = Learn::with(['questions.answers'])
            ->where('learn_group', $dbGroup)
            ->orderBy('slide_number', 'asc')
            ->get();

        // Transform ke format JSON-friendly
        $slidesData = $slides->map(function ($slide) {
            return [
                'id' => $slide->id,
                'slide_type' => $slide->slide_type,
                'content' => $slide->content ?? '',
                'question' => $slide->questions->isNotEmpty()
                    ? [
                        'id' => $slide->questions->first()->id,
                        'question_text' => $slide->questions->first()->question_text,
                        'answers' => $slide->questions->first()->answers->map(function ($a) {
                            return [
                                'id' => $a->id,
                                'answer_text' => $a->answer_text,
                                'is_correct' => (bool) $a->is_correct,
                            ];
                        })->values(),
                    ]
                    : null,
            ];
        })->values();

        // Ambil atau buat progress default user
        $userId = Auth::id();
        $progress = LearnProgress::firstOrCreate(
            ['user_id' => $userId, 'learn_group' => $dbGroup],
            ['progress' => 0]
        );

        return view('learn.learn-show', [
            'slidesData' => $slidesData->toArray(),
            'title' => ucfirst(str_replace('-', ' ', $group)),
            'group' => $dbGroup,
            'progress' => $progress->progress,
        ]);
    }

       public function updateProgress(Request $request, $group)
    {
        $request->validate([
            'progress' => 'required|integer|min:0|max:100',
        ]);

        $userId = Auth::id();

        $progress = LearnProgress::updateOrCreate(
            [
                'user_id' => $userId,
                'learn_group' => $group,
            ],
            [
                'progress' => $request->progress,
            ]
        );

        return response()->json([
            'success' => true,
            'progress' => $progress->progress,
        ]);
    }
}

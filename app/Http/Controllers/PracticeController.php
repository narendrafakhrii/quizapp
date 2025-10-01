<?php

namespace App\Http\Controllers;

class PracticeController extends Controller
{
    public function index()
    {
        $categories = [
            ['title' => 'Grammar', 'description' => __('Practice grammar skills'), 'slug' => 'grammar'],
            ['title' => 'Vocabulary', 'description' => __('Expand your vocabulary'), 'slug' => 'vocabulary'],
            ['title' => 'Reading Comprehension', 'description' => __('Improve reading comprehension'), 'slug' => 'reading'],
        ];

        return view('practice', compact('categories'));
    }
}

<?php

namespace App\Http\Controllers;

class PracticeController extends Controller
{
    public function index()
    {
        $categories = [
            ['title' => 'Grammar', 'description' => 'Latih tata bahasa', 'image' => 'https://placehold.co/600x400', 'slug' => 'grammar'],
            ['title' => 'Vocabulary', 'description' => 'Kosakata', 'image' => 'https://placehold.co/600x400', 'slug' => 'vocabulary'],
            ['title' => 'Reading Comprehension', 'description' => 'Pemahaman bacaan', 'image' => 'https://placehold.co/600x400', 'slug' => 'reading'],
        ];

        return view('practice', compact('categories'));
    }
}

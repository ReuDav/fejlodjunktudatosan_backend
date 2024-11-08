<?php 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $frontend = [
        'HTML', 'CSS', 'JavaScript', 'Vue.js', 'React', 'Angular', 'Next.js', 'React Native', 'Tailwind CSS', 'Bootstrap', 'Figma', 'Canva', 'Svelte'
    ];

    $backend = [
        'PHP', 'Laravel', 'MySQL', 'PostreSQL', 'Kotlin', 'C#'
    ];

    return view('index', compact('frontend', 'backend'));
});
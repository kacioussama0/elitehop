<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/',[\App\Http\Controllers\SiteController::class,'home'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/courses',[\App\Http\Controllers\SiteController::class,'courses']);
Route::get('/courses/{slug}',[\App\Http\Controllers\SiteController::class,'course']);
Route::get('/courses/{slug}/lessons',[\App\Http\Controllers\SiteController::class,'lessons']);

Route::resource('/dashboard/courses','App\Http\Controllers\CourseController')->names('courses');
Route::resource('/dashboard/courses/{slug}/sections','App\Http\Controllers\SectionController')->names('sections');
Route::resource('/dashboard/courses/{course}/sections/{section}/lessons','App\Http\Controllers\LessonController')->names('lessons');

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


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
Route::get('/courses/{courseSlug}/lessons/{lessonSlug}',[\App\Http\Controllers\SiteController::class,'lessons']);

Route::resource('/dashboard/courses','App\Http\Controllers\CourseController')->names('courses');
Route::resource('/dashboard/courses/{slug}/sections','App\Http\Controllers\SectionController')->names('sections');
Route::resource('/dashboard/courses/{course}/sections/{section}/lessons','App\Http\Controllers\LessonController')->names('lessons');
Route::resource('/dashboard/permission', 'App\Http\Controllers\PermissionController')->only(['index','store','edit','update','destroy']);
Route::resource('/dashboard/role', 'App\Http\Controllers\RoleController')->only(['index','store','edit','update','destroy']);

require __DIR__.'/auth.php';

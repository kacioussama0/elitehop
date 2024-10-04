<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/',[\App\Http\Controllers\SiteController::class,'home'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/upload-avatar', [ProfileController::class, 'uploadavatar'])->name('profile.update.avatar');
    Route::put('/profile/update/info', [ProfileController::class, 'updateInfo'])->name('profile.update.info');
    Route::put('/profile/update/additionalInfo', [ProfileController::class, 'updateAdditionalInfo'])->name('profile.update.addinfo');
    Route::put('/profile/update/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    Route::get('/orders',[\App\Http\Controllers\OrderController::class,'userOrders']);
    Route::get('/orders/{orderId}',[\App\Http\Controllers\OrderController::class,'userOrder']);
    Route::post('/orders/{orderId}/upload',[\App\Http\Controllers\OrderController::class,'uploadReceipt']);
    Route::post('/create-order/{courseSlug}',[\App\Http\Controllers\OrderController::class,'createOrder']);
    Route::get('/courses/{courseSlug}/lessons/{lessonSlug}',[\App\Http\Controllers\SiteController::class,'lessons']);
    Route::get('/my-courses',[\App\Http\Controllers\SiteController::class,'myCourses']);
});

Route::get('/courses',[\App\Http\Controllers\SiteController::class,'courses']);
Route::get('/courses/{slug}',[\App\Http\Controllers\SiteController::class,'course']);


Route::resource('/dashboard/courses','App\Http\Controllers\CourseController')->names('courses');
Route::resource('/dashboard/orders','App\Http\Controllers\OrderController')->names('orders');
Route::resource('/dashboard/courses/{slug}/sections','App\Http\Controllers\SectionController')->names('sections');
Route::resource('/dashboard/courses/{course}/sections/{section}/lessons','App\Http\Controllers\LessonController')->names('lessons');
Route::resource('/dashboard/permission', 'App\Http\Controllers\PermissionController')->only(['index','store','edit','update','destroy']);
Route::resource('/dashboard/role', 'App\Http\Controllers\RoleController')->only(['index','store','edit','update','destroy']);


require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Landing Page
Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/contact', [LandingPageController::class, 'contact'])->name('contact');
Route::get('/list-project', [LandingPageController::class, 'listProject'])->name('project.list');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // user-profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // route-resource
    Route::resource('/skill', SkillController::class);

    // category
    Route::get('/category/print-pdf', [CategoryController::class, 'printPDF'])->name('category.printPDF');
    Route::resource('/category', CategoryController::class);

    // project
    Route::resource('/project', ProjectController::class);

    // experience
    Route::resource('/experience', ExperienceController::class);
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['portfolio.access'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/experiences', [ExperienceController::class, 'index'])->name('experiences.index');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
    Route::get('/educations', [EducationController::class, 'index'])->name('educations.index');

    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
});

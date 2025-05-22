<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\SecretoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProfileController::class, 'index'])->name('questions.index');
Route::post('/profiles', [ProfileController::class, 'store'])->name('create.profile');
Route::get('/profiles/{slug}', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profiles/{slug}/answers', [AnswerController::class, 'store'])->name('profile.answer');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;

Route::get('/', function () {
    return view('home');
});

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

// Auth Login Page

route::get('/auth', [AuthController::class, 'index'])
    ->name('auth');

route::post('/auth/login', [AuthController::class, 'login'])
    ->name('auth.login');


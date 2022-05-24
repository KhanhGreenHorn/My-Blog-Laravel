<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EmailVerifycationController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Middleware\IsAdmin;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Authentication
Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [SessionsController::class, 'create'])->name('/login');
    Route::post('/login', [SessionsController::class, 'store']);
});

//Email verification route
Route::get('/email/verify', [EmailVerifycationController::class, 'verifyEmailView'])
    ->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [EmailVerifycationController::class, 'sendEmail'])
    ->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [EmailVerifycationController::class, 'verifyEmail'])
    ->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['verified'])->group(function () {
    //Route to views
    Route::get('/', [PostController::class, 'index']);

    //resource routes
    Route::resource('/posts', PostController::class);
    Route::resource('/comments', CommentController::class);
    Route::resource('/categories', CategoryController::class);

    //Third-parties mailing services
    Route::post('/newsletter', NewsletterController::class);

    Route::post('/logout', [SessionsController::class, 'destroy']);
});

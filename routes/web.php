<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Middleware\IsAdmin;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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

//Email verification route
Route::get('/email/verify', function () {
    return view('register.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


//Authentication
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('/login');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');

Route::middleware(['verified'])->group(function () {
    //Route to views
    Route::get('/', [PostController::class, 'index']);

    Route::get('/posts/{post}', [PostController::class, 'show']);
    Route::get('/categories/{category}', [CategoryController::class, 'show']);

    //user create comment
    Route::post('/posts/{post:title}/comments', [CommentController::class, 'store']);
    Route::delete('/posts/{post:title}/comments/{id}', [CommentController::class, 'destroy']);

    //Third-parties mailing services
    Route::post('/newsletter', NewsletterController::class);

    Route::post('/logout', [SessionsController::class, 'destroy']);

    //User creates posts
    Route::get('user/posts', [PostController::class, 'create']);
    Route::post('user/posts', [PostController::class, 'store']);

    //Admin create category
    Route::get('admin/categories', [CategoryController::class, 'create'])->middleware('isAdmin');
    Route::post('admin/categories', [CategoryController::class, 'store'])->middleware('isAdmin');
    Route::delete('admin/categories', [CategoryController::class, 'destroy'])->middleware('isAdmin');
    //Route::resource(CategoryController::class)->middleware('isAdmin');
});

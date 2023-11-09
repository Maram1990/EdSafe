<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\QuestionController;

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
Route::view('/', 'index');

Route::view('/signs', 'signs');

Route::view('/contact','contactscreate');

Route::get('/rules', [App\Http\Controllers\PostController::class, 'index'])->name('posts');
Route::get('posts/{post}', [App\Http\Controllers\PostController::class, 'show' ])->name('detials');
Route::resource('contacts',ContactController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('is_admin')->group(function () {
    Route::resource('questions',QuestionController::class);
    Route::resource('questions.answers',AnswerController::class);
    Route::view('/posts','welcomelivewire');
});



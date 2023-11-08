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

Route::get('/rules', [App\Http\Controllers\PostController::class, 'index']);

Route::resource('questions',QuestionController::class)->middleware( 'is_admin');
Route::resource('questions.answers',AnswerController::class)->middleware( 'is_admin');
Route::view('/posts','welcomelivewire')->middleware( 'is_admin');
Route::resource('contacts',ContactController::class);

Auth::routes();

Route::get('/test', [App\Http\Controllers\HomeController::class, 'index'])->name('test');

 



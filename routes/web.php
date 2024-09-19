<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\CriaPerguntaController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AprovaPerguntaController;
use App\Http\Controllers\RevisaAprovadaController;
use App\Http\Controllers\RevisaReprovadaController;

//Route::resource('/home' , App\Http\Controllers\InicioController::class);
Route::get('/', function () {
    return view('frontend.index');
})->name('index');

Route::get('/admin', function () {
    return view('frontend.admin');
})->name('admin');
/*
Route::get('/categoria', function () {
    return view('frontend.categoria');
})->name('categoria')->middleware('auth');
*/
Route::get('/opcaoQuiz', function () {
    return view('frontend.opcaoQuiz');
})->name('opcaoQuiz');

Route::get('/quiz', function () {
    return view('frontend.quiz');
})->name('quiz');

/*
Route::get('/entrar', function () {
    return view('frontend.login');
})->name('entrar');

Route::get('/registrar', function () {
    return view('frontend.signup');
})->name('registrar');
*/
//---------------------------------------------------------------------------------------------------------------------------------


Route::resource('criaPergunta', CriaPerguntaController::class)->middleware('auth');
Route::resource('feedback', FeedbackController::class)->middleware('auth');
Route::resource('quiz', QuizController::class)->middleware('auth');
Route::resource('perfil', PerfilController::class)->middleware('auth');

//---------------------- admin --------------------------//
Route::resource('aprova', AprovaPerguntaController::class)->middleware('auth');
Route::resource('revisaA', RevisaAprovadaController::class)->middleware('auth');
Route::resource('revisaR', RevisaReprovadaController::class)->middleware('auth');


Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/papel', App\Http\Controllers\PapelController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\CriaPerguntaController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\CategoriaController;

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

Route::get('/feedback', function () {
    return view('frontend.feedback');
})->name('feedback');

Route::get('/quiz', function () {
    return view('frontend.quiz');
})->name('quiz');

Route::get('/entrar', function () {
    return view('frontend.login');
})->name('entrar');

Route::get('/registrar', function () {
    return view('frontend.signup');
})->name('registrar');
//////////////////////////////////////////////////////////////////////
Route::get('/minhasperguntas', function () {
    return view('frontend.minhaP');
})->name('minhaP');

Route::get('/criapergunta', function () {
    return view('frontend.criaP');
})->name('criaP');

Route::get('/criaalternativa', function () {
    return view('frontend.criaA');
})->name('criaA');

Route::get('/detalhespergunta', function () {
    return view('frontend.detalhesP');
})->name('detalhesP');

//Route::get('/perfil/{id}', [PerfilController::class, 'show']);
//Route::resource('perfil', PerfilController::class);
Route::get('/perfil', function () {
    return view('frontend.perfil');
})->name('perfil');

Route::get('/editarperfil', function () {
    return view('frontend.editPerfil');
})->name('editPerfil');

Route::get('/aprovaperguntas', function () {
    return view('frontend.aprovarP');
})->name('aprovarP');

Route::get('/analisepergunta', function () {
    return view('frontend.aprovaP');
})->name('aprovaP');

Route::get('/perguntaaprovada', function () {
    return view('frontend.aprovada');
})->name('aprovada');
//---------------------------------------------------------------------------------------------------------------------------------
Route::get('/teste', function(){
    return view('frontend.criaPergunta.create');
});

Route::resource('criaPergunta', CriaPerguntaController::class)->middleware('auth');
Route::resource('feedback', FeedbackController::class)->middleware('auth');
Route::resource('categoria', CategoriaController::class)->middleware('auth');


Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/papel', App\Http\Controllers\PapelController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\CriaPerguntaController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\SubcategoriaController;
use App\Http\Controllers\OpcaoController;
use App\Http\Controllers\QuizController ;
use App\Http\Controllers\AprovaPerguntaController;
use App\Http\Controllers\RevisaAprovadaController;
use App\Http\Controllers\RevisaReprovadaController;
use App\Http\Controllers\AdminController;

//Route::resource('/home' , App\Http\Controllers\InicioController::class);
Route::get('/', function () {
    return view('frontend.index');
})->name('index');
/*
Route::get('/admin', function () {
    return view('frontend.admin');
})->name('admin');
*/
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
Route::resource('opcao', OpcaoController::class)->middleware('auth');
Route::resource('quiz', QuizController::class)->middleware('auth') ;
Route::resource('perfil', PerfilController::class)->middleware('auth');

//---------------------- admin --------------------------//
Route::resource('admin', AdminController::class)->middleware('auth');
Route::resource('aprova', AprovaPerguntaController::class)->middleware('auth');
Route::resource('revisaA', RevisaAprovadaController::class)->middleware('auth');
Route::resource('revisaR', RevisaReprovadaController::class)->middleware('auth');
Route::resource('categoria', CategoriaController::class)->middleware('auth');
Route::group(['prefix' => 'subcategoria', 'middleware' => 'auth'], function () {
    Route::get('/{id}', [SubcategoriaController::class, 'index'])->name('subcategoria.index');
    Route::get('/create/{id}', [SubcategoriaController::class, 'create'])->name('subcategoria.create');
    Route::post('/store/{id}', [SubcategoriaController::class, 'store'])->name('subcategoria.store');
    Route::get('/show/{id}/{categoria_id}', [SubcategoriaController::class, 'show'])->name('subcategoria.show');
    Route::get('/edit/{id}/{categoria_id}', [SubcategoriaController::class, 'edit'])->name('subcategoria.edit');
    Route::put('/update/{id}/{categoria_id}', [SubcategoriaController::class, 'update'])->name('subcategoria.update');
    Route::delete('/delete/{id}/{categoria_id}', [SubcategoriaController::class, 'destroy'])->name('subcategoria.destroy');
});
/*
    Route::get('subcategoria/{id}', [SubcategoriaController::class, 'index'])->name('subcategoria.index')->middleware('auth');
    Route::get('subcategoria/create/{id}', [SubcategoriaController::class, 'create'])->name('subcategoria.create')->middleware('auth');
    Route::post('subcategoria/store/{id}', [SubcategoriaController::class, 'store'])->name('subcategoria.store')->middleware('auth');
    Route::get('subcategoria/show/{id}/{categoria_id}', [SubcategoriaController::class, 'show'])->name('subcategoria.show')->middleware('auth');
    Route::get('subcategoria/edit/{id}/{categoria_id}', [SubcategoriaController::class, 'edit'])->name('subcategoria.edit')->middleware('auth');
    Route::put('subcategoria/update/{id}/{categoria_id}', [SubcategoriaController::class, 'update'])->name('subcategoria.update')->middleware('auth');
    Route::delete('subcategoria/delete/{id}/{categoria_id}', [SubcategoriaController::class, 'destroy'])->name('subcategoria.destroy')->middleware('auth');
*/
//Route::resource('subcategoria', SubcategoriaController::class)->middleware('auth');



Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/papel', App\Http\Controllers\PapelController::class);

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UserController;

Route::get('/useres', [UserController::class, 'index'])->name('useres.index') ;

Route::get('/', function () {

    $nome = "Joao";
    $idade = 20;
    $arr = [1, 2, 3, 4, 5];
    $nomes = [
        'Marcos',
        'Matias',
        'Pedro',
        'Afonso',
        'Martins'
    ];

    return view('welcome', [
        'nome'  => $nome,
        'idade' => $idade,
        'arr'   => $arr,
        'nomes' => $nomes
    ]);
});

Route::get('/content', function () {
    return view('content');
});

    //Pasando paramentros na rota podemos pegar tal view especifica  passando o determinado id do elemento
Route::get('/product/{id}', function ($id) {
    return view('product', ['id' => $id]);
});

    //passando o {id?} estamos falando q nss parametro vai ter q vim, mas tbm podemos usar o "?", para q ele se torne opcional 
    //podemos passar um valor por deful como valor do argumento, ou usar o null 
Route::get('/product_test/{id?}', function ($id = null) {
    return view('product', ['id' => $id]);
});

Route::get('/product', function () {
        //estamos pegando o valor q foi passardo pela 'request' - requisição vindo da ('search') q é onde ta sendo atribuido o valor para a requisição
    $busca = request('search');

    return view('content', ['busca' => $busca]);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

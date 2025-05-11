<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);

    # No nosso arquivo q faz a ligaçao para a criancao de um novo envento vamos passar o metoto
    #   middleware('auth') -> esse metodo é oq vai ajir entre a nossa acao de clicak no link ate nss #      viwe ser intregue por isso o "middleware" pois esta no meio de alguma açao e apartir #           disso so podemos criar eventoo se tivermos logado 
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
Route::post('/events', [EventController::class, 'store']);
Route::get('/events/{id}', [EventController::class, 'show']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

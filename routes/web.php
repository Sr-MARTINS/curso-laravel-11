<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);

    # No nosso arquivo q faz a ligaçao para a criancao de um novo envento vamos passar o metoto
    #   middleware('auth') -> esse metodo é oq vai ajir entre a nossa acao de clicak no link ate nss #      viwe ser intregue por isso o "middleware" pois esta no meio de alguma açao e apartir #           disso so podemos criar eventoo se tivermos logado 
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
Route::post('/events', [EventController::class, 'store']);
Route::get('/events/{id}', [EventController::class, 'show']);

    //Passamos pelo http o 'delete' pois seguimos o padra de aplicção, e de fato esse metodo segue sua funcionalida
    //Passmos q noss route espera um "id", pois com ele coseguiremos buscar o item
Route::delete('/events/{id}', [EventController::class, 'destroy']);

    //criamos uma rota para q o usuario logado tenha acesseço ao seus eventos
    // e ultilizando o "middleware(auth)" fazemos q nosso usuario so vai acessar se tiver logado
Route::get('dashboard', [EventController::class, 'dashboard'])->middleware('auth');

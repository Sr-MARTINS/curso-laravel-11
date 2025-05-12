<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Models\Event;

Route::get('/', [EventController::class, 'index']);

//CRIAÇÃO DE EVENTO
    # No nosso arquivo q faz a ligaçao para a criancao de um novo envento vamos passar o metoto
    #   middleware('auth') -> esse metodo é oq vai ajir entre a nossa acao de clicak no link ate nss #      viwe ser intregue por isso o "middleware" pois esta no meio de alguma açao e apartir #           disso so podemos criar eventoo se tivermos logado 
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
Route::post('/events', [EventController::class, 'store']);

//INFOR SOBRE EVENTO
Route::get('/events/{id}', [EventController::class, 'show']);

// DELETAR
    //Passamos pelo http o 'delete' pois seguimos o padra de aplicção, e de fato esse metodo segue sua funcionalida
    //Passmos q noss route espera um "id", pois com ele coseguiremos buscar o item
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth');

//EDITAR
    //"Route::get('/events/edit/{id}' " - Para nos vermos a informações do evento
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
    //"Route::put('/events/update/{id}' " - Routa q nos leva para o metodo de update e fazer a atualização no banco
Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth');

//EXIBIÇÃO DE EVENTOS USER
    //criamos uma rota para q o usuario logado tenha acesseço ao seus eventos
    // e ultilizando o "middleware(auth)" fazemos q nosso usuario so vai acessar se tiver logado
Route::get('dashboard', [EventController::class, 'dashboard'])->middleware('auth');

Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');

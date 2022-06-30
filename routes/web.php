<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\EnderecoController;

/*Rotas*/
Route::get('/', function () {
    return view('welcome');
});

/*Rota Principal*/
Route::get('/', function () {
    return view('index');
});

/*Rota para adicionar dados a lista*/
Route::get('/forms',[FormularioController::class,'store']);
/*Rota para listar dados*/
Route::get('/listar',[FormularioController::class,'show']);
/*Rota para excluir item da lista*/
Route::get('/deletar/{id}',[FormularioController::class,'destroy'])->name('form.destroy');
/*Rota para editar dados da lista*/
Route::get('/edit/{id}',[FormularioController::class,'edit'])->name('form.editar');
/*Rota para atualizar os dados depois de editado*/
Route::post('/edit/{id}',[FormularioController::class,'update'])->name('form.atualizar');
/*Rota para Buscar dados na lista*/
Route::get('/search',[FormularioController::class,'search']);














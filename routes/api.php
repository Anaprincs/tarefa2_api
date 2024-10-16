<?php

use App\Http\Controllers\TarefaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('tarefa', [TarefaController::class, 'store']);
Route::get('tarefa/{id}', [TarefaController::class, 'findById']);
Route::get('tarefa/{id}/Request', [TarefaController::class, 'findByIdRequest']);
Route::get('tarefa', [TarefaController::class, 'getAll']);
Route::delete('tarefa/{id}/deletar', [TarefaController::class, 'delete']);
Route::delete('tarefa/{id}/deletar', [TarefaController::class, 'delete']);
Route::put('tarefa/{id}/update', [TarefaController::class, 'update']);
Route::put('tarefa/pesquisa/mes', [TarefaController::class, 'pesquisa']);

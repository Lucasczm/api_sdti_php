<?php

use App\Http\Controllers\api;
use App\Http\Controllers\configController;
use App\Http\Controllers\conselhosController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\pontosController;
use App\Http\Controllers\testeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/api', [api::class , 'calcular'] );

Route::get('/home', [homeController::class , 'index'] );

Route::get('/configuracoes', [configController::class , 'index'] )->name('configuracoes');;
Route::post('/configuracoes', [configController::class , 'store'] );

Route::get('/teste', [testeController::class , 'mapa'] );
Route::get('/pontos', [pontosController::class , 'index'] );
Route::get('/conselhos', [conselhosController::class , 'index'] );



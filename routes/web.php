<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login'])->name('site.login');


Route::get('/contato/{nome}/{categoria_id}', 
    function(string $nome, int $categoria_id = 1 ){
        echo "Nome: $nome Categoria: $categoria_id ";
    })->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');

Route::prefix('/app')->group(function(){
    Route::get('/cliente', function(){ return 'clientes';})->name('app.clientes');
    Route::get('/produtos', function(){ return 'produtos';} )->name('app.produtos');
    Route::get('/fornecedores', function(){ return 'fornecedores';})->name('app.fornecedores');
});



Route::fallback(function(){
    echo 'Rota não existe';
});
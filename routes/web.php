<?php

use App\Http\Controllers\MovimentosEstoqueController;
use Illuminate\Support\Facades\Auth;
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
use App\Services\CepServices;

Route::get('teste', function (CepServices $cepService) {
    $cepService->consultar('77700000');
});

Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Auth::routes(['register' => false,]);

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('empresas', 'EmpresaController');
    Route::resource('produtos', 'ProdutosController');
    Route::resource('users', 'UsersController');
    Route::resource('movimentofinanceiro', 'MovimentoFinanceiroController')->except('edit', 'update');
    Route::resource('movimentosestoque', 'MovimentosEstoqueController')->only('destroy', 'store');

    Route::post('empresas/buscar-por/nome', 'Selects\EmpresaNomeTipo');
    Route::get('empresas/relatorio/saldo/{empresa}', 'Relatorios\SaldoEmpresa')->name('empresas.relatorio.saldo');

    Route::post('produtos/buscar-por/nome', 'Selects\ProdutoPorNome');
    Route::get('cep/{cep}', 'Selects\CepController');
});

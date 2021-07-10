<?php

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

use App\Http\Controllers\EmpresaController;
Route::middleware(['auth:sanctum', 'verified'])
    ->get('/adminEmpresas', [ EmpresaController::class, 'index' ])
    ->name('/adminEmpresas');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/agregarEmpresa', [ EmpresaController::class, 'create' ])
    ->name('/agregarEmpresa');

Route::middleware(['auth:sanctum', 'verified'])
    ->post('/agregarEmpresa', [ EmpresaController::class, 'store' ])
    ->name('/agregarEmpresa');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/modificarEmpresa/{id}', [ EmpresaController::class, 'edit' ])
    ->name('/modificarEmpresa');

Route::middleware(['auth:sanctum', 'verified'])
    ->put('/modificarEmpresa', [ EmpresaController::class, 'update' ])
    ->name('/modificarEmpresa');

    
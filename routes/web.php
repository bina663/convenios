<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransfereGov;
use App\Http\Controllers\IntegracaoController;
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
Route::get('/', [AuthController::class, "login"])->name('login');
Route::get('/recover', [AuthController::class, "recover"]);

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/convenios', [AdminController::class, 'convenios'])->name('admin.convenios');
    Route::get('/admin/monitoramento', [AdminController::class, 'monitoramento'])->name('admin.monitoramento');
    Route::get('/admin/integracoes', [AdminController::class, 'integracoes'])->name('admin.integracoes');
    Route::get('/admin/restart-integration', [AdminController::class, 'integracoes'])->name('admin.transferegov.restart');
    Route::get('/admin/integracoes/config', [TransfereGov::class, 'configIntegracao'])->name('admin.transferegov.config');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

use Illuminate\Support\Facades\Artisan;

Route::get('/run-migrations', function () {
    Artisan::call('migrate', ['--force' => true]);
    return "Migrations executadas com sucesso!";
});



Route::middleware('auth')->group(function () {
    Route::get('/admin/integracoes/configurar', [IntegracaoController::class, 'create'])->name('integracoes.create');
    Route::post('/admin/integracoes/store', [IntegracaoController::class, 'store'])->name('integracoes.store');
});

Route::post('/auth', [AuthController::class, "authUser"]);
Route::get('/register', [AuthController::class, "register"]);
Route::post('/register/true', [AuthController::class, "registerUser"]);


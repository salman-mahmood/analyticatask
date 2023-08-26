<?php

use App\Http\Controllers\AnalyticaTaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/dboard', [AnalyticaTaskController::class, 'index'])->name('tasks.index');;
Route::get('/create', [AnalyticaTaskController::class, 'create'])->name('tasks.create');
Route::post('/store', [AnalyticaTaskController::class, 'store'])->name('tasks.store');
Route::get('/edit/{id}', [AnalyticaTaskController::class, 'edit'])->name('tasks.edit');
Route::put('/update/{id}', [AnalyticaTaskController::class, 'update'])->name('tasks.update');
Route::put('/updatestatus/{id}', [AnalyticaTaskController::class, 'updatestatus'])->name('tasks.updatestatus');
Route::delete('/tasks/{id}', [AnalyticaTaskController::class, 'destroy'])->name('tasks.destroy');

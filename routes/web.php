<?php

use App\Http\Controllers\Admin\MaestroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('maestros', [MaestroController::class, 'index'])->name('maestros.index');
Route::get('maestros/create', [MaestroController::class, 'create'])->name('maestros.create');
Route::post('maestros', [MaestroController::class, 'store'])->name('maestros.store');
Route::get('maestros/{id}', [MaestroController::class, 'show'])->name('maestros.show');
Route::get('maestros/{id}/edit', [MaestroController::class, 'edit'])->name('maestros.edit');
Route::put('maestros/{id}', [MaestroController::class, 'update'])->name('maestros.update');
Route::delete('maestros/{id}', [MaestroController::class, 'destroy'])->name('maestros.destroy');

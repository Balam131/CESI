<?php
use App\Http\Controllers\Admin\SalonController;
use App\Http\Controllers\Admin\MaestroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('salones', [SalonController::class, 'index'])->name('salones.index');
Route::get('salones/create', [SalonController::class, 'create'])->name('salones.create');
Route::post('salones', [SalonController::class, 'store'])->name('salones.store');
Route::get('salones/{salon}', [SalonController::class, 'show'])->name('salones.show');
Route::get('salones/{salon}/edit', [SalonController::class, 'edit'])->name('salones.edit');
Route::put('salones/{salon}', [SalonController::class, 'update'])->name('salones.update');
Route::delete('salones/{salon}', [SalonController::class, 'destroy'])->name('salones.destroy');

Route::get('maestros', [MaestroController::class, 'index'])->name('maestros.index');
Route::get('maestros/create', [MaestroController::class, 'create'])->name('maestros.create');
Route::post('maestros', [MaestroController::class, 'store'])->name('maestros.store');
Route::get('maestros/{maestro}', [MaestroController::class, 'show'])->name('maestros.show');
Route::get('maestros/{maestro}/edit', [MaestroController::class, 'edit'])->name('maestros.edit');
Route::put('/maestros/{maestro}', [MaestroController::class, 'update'])->name('maestros.update');
Route::delete('maestros/{maestro}', [MaestroController::class, 'destroy'])->name('maestros.destroy');

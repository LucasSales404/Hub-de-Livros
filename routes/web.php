<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('livros')->group(function () {
    Route::post('store', [LivroController::class,'store'])->name('livro.store');
    Route::get('index', [LivroController::class, 'index'])->name('livros.index');
    Route::put('update/{livro}', [LivroController::class, 'update'])->name('livro.update');
    Route::delete('delete/{livro}', [LivroController::class, 'destroy'])->name('livro.delete');
});

<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('livros')->group(function () {
    Route::get('index', [LivroController::class, 'index'])->name('livros.index');
});

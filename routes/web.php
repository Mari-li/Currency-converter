<?php

use App\Http\Controllers\CurrenciesController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CurrenciesController::class, 'show'])->name('show');

Route::post('/convert', [CurrenciesController::class, 'convert']);

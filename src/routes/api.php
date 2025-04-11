<?php

use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\ConfigurationController;
use App\Http\Controllers\Api\OptionController;
use App\Http\Controllers\Api\PriceController;
use Illuminate\Support\Facades\Route;

Route::controller(CarController::class)
    ->prefix('cars')
    ->group(function () {
        Route::post('', 'store');
        Route::patch('{car}', 'update');
        Route::delete('{car}', 'destroy');
        Route::get('available', 'available');
        Route::get('{car}', 'show');
    });

Route::controller(ConfigurationController::class)
    ->prefix('configurations')
    ->group(function () {
        Route::post('', 'store');
        Route::patch('{configuration}', 'update');
        Route::delete('{configuration}', 'destroy');
        Route::get('{configuration}', 'show');
    });

Route::controller(OptionController::class)
    ->prefix('options')
    ->group(function () {
        Route::post('', 'store');
        Route::patch('{option}', 'update');
        Route::delete('{option}', 'destroy');
        Route::get('{option}', 'show');
    });


Route::controller(PriceController::class)
    ->prefix('prices')
    ->group(function () {
        Route::post('', 'store');
        Route::patch('{price}', 'update');
        Route::delete('{price}', 'destroy');
        Route::get('{price}', 'show');
    });


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;

Route::group(['prefix' => '/links'], function() {
    Route::post('/', [Api\LinkController::class, 'create'])->name('links.create');
});

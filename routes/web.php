<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web;

Route::view('/404', '404');

Route::get('/{slug}', Web\RedirectController::class);

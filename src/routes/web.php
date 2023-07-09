<?php

use Illuminate\Support\Facades\Route;
use WemX\Sso\Http\Controllers\SsoController;

Route::middleware(['web'])->group(function () {
    Route::get('/sso-wemx', [SsoController::class, 'webhook']);
    Route::get('/sso-wemx/{token}', [SsoController::class, 'handle']);
});

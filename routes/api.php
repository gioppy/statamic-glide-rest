<?php

use Gioppy\StatamicGlideRest\Http\Controllers\GlideController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api'])
  ->prefix('assets')
  ->group(function () {
    Route::get('glide', [GlideController::class, 'index']);
  });

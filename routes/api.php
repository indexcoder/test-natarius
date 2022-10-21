<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NotaryController;


Route::get('messages', [NotaryController::class, 'index']);
Route::post('messages', [NotaryController::class, 'store']);

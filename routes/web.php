<?php
use Illuminate\Support\Facades\Route;

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->where('any', '.*');


//
//Route::get('/', function () {
//    // return response('Hello')->cookie('id', 'Zubair Idris Aweda');
//    $cookie = request()->cookie('id');
//    echo $cookie;
//    // return view('welcome');
//});

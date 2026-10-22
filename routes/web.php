<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AprendizController;

Route::get('/', function () {
    return redirect()->route('aprendices.index');
});

Route::resource('aprendices', AprendizController::class);

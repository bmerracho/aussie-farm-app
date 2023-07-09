<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KangarooInfoController;
use App\Http\Requests\KangarooCreateRequest;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('kangaroo-info')->controller(KangarooInfoController::class)
    ->group(function () {
        Route::post('/', 'createKangarooInfo');
        Route::get('/', 'getKangarooInfo');
        Route::get('{id}', 'getKangarooInfoById')->whereNumber('id');
        Route::put('{id}', 'updateKangarooInfo')->whereNumber('id');
        Route::delete('{id}', 'deleteKangarooInfo')->whereNumber('id');
    }
);
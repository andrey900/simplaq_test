<?php
/**
 * Created by PhpStorm.
 * Company: ittown.by
 * Project: TestTomas
 * User: Andrey Leo
 * Date: 6/26/21
 * Time: 2:10 PM
 * All rights reserved
 */

use App\Http\Controllers\Api\V1\CustomersController;
use App\Http\Controllers\Api\V1\LocationsController;
use App\Http\Response\PreConfigResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function (){
    Route::get('/status', function (Request $request) {
        return resolve(PreConfigResponse::class)->getResponse();
    });

    Route::middleware('auth.hash')->group(function (){
        Route::get('/customers', [CustomersController::class, 'index']);
        Route::get('/customers/{id}', [CustomersController::class, 'show'])->where('id', '[0-9]+');
        Route::get('/locations', [LocationsController::class, 'index']);
    });
});
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Master;
use App\Models\Child;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ChildController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/masters', [MasterController::class, 'index']);
Route::get('/masters/{master}', [MasterController::class,'show']);
Route::post('/masters', [MasterController::class,'store'])->name('master.store');
Route::put('/masters/{master}', [MasterController::class,'update']);
Route::delete('/masters/{master}', [MasterController::class,'destroy']);
Route::get('/masters/{master}/children', [MasterController::class,'children']);

Route::get('/children', [ChildController::class,'index']);
Route::get('/children/{child}', [ChildController::class,'show']);
Route::post('/children', [ChildController::class,'store']);
Route::put('/children/{child}', [ChildController::class,'update']);
Route::delete('/children/{child}', [ChildController::class,'destroy']);
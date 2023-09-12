<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiasController;

Route::get('/', function(){
    return response()->json([
'sucess' => true
    ]);
});

Route::get('/doceria',[DoceriaController::class,'index']);
Route::get('/doceria/{id}',[DoceriaController::class,'show']);
Route::post('/doceria',[DoceriaController::class,'store']);
Route::delete('/doceria/{id}',[DoceriaController::class,'destroy']);
Route::put('/doceria/{id}',[DoceriaController::class,'update']);
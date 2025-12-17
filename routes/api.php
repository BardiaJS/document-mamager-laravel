<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/users/register' , [UserController::class , 'register']);

Route::post('/users/login' , [UserController::class, 'login']);

Route::patch('/users/{user}/' , [UserController::class , 'update'])->middleware('auth:sanctum');

Route::get('/users/{users}' , [UserController::class, 'get_user'])->middleware('auth:sanctum');

Route::post('/documents/create' , [DocumentController::class , 'create_document'])->middleware('auth:sanctum');

Route::get('/documents/{document}' , [DocumentController::class, 'get_document'])->middleware('auth:sanctum');

Route::delete('/documents/{document}' , [DocumentController::class, 'delete_document'])->middleware('auth:sanctum');
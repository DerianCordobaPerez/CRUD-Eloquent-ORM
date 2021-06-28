<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\ImpartsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});

/*----------------------------------- RUTAS PROFESOR ---------------------------------------------*/
Route::get('/teacher/create', [TeacherController::class, 'create']);
Route::post('/teacher/create', [TeacherController::class, 'store']);

Route::get('/teacher/show', [TeacherController::class, 'show']);

Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit']);
Route::post('/teacher/edit', [TeacherController::class, 'update']);

Route::delete('/teacher/delete/{id}', [TeacherController::class, 'destroy']);
/*------------------------------------------------------------------------------------------------*/

/*----------------------------------- RUTAS AULAS ------------------------------------------------*/
Route::get('/classroom/create', [ClassRoomController::class, 'create']);
Route::post('/classroom/create', [ClassRoomController::class, 'store']);

Route::get('/classroom/show', [ClassRoomController::class, 'show']);

Route::get('/classroom/edit/{id}', [ClassRoomController::class, 'edit']);
Route::post('/classroom/edit', [ClassRoomController::class, 'update']);

Route::delete('/classroom/delete/{id}', [ClassRoomController::class, 'destroy']);
/*------------------------------------------------------------------------------------------------*/

/*----------------------------------- RUTAS CLASES -----------------------------------------------*/
Route::get('/class/create', [ClassesController::class, 'create']);
Route::post('/class/create', [ClassesController::class, 'store']);

Route::get('/class/show', [ClassesController::class, 'show']);

Route::get('/class/edit/{id}', [ClassesController::class, 'edit']);
Route::post('/class/edit', [ClassesController::class, 'update']);

Route::delete('/class/delete/{code}', [ClassesController::class, 'destroy']);
/*------------------------------------------------------------------------------------------------*/

/*----------------------------------- RUTAS IMPARTE ----------------------------------------------*/
Route::get('/impart/create', [ImpartsController::class, 'create']);
Route::post('/impart/create', [ImpartsController::class, 'store']);

Route::get('/impart/show', [ImpartsController::class, 'show']);

Route::get('/impart/edit/{id}', [ImpartsController::class, 'edit']);
Route::post('/impart/edit', [ImpartsController::class, 'update']);

Route::delete('/impart/delete/{id}', [ImpartsController::class, 'destroy']);
/*------------------------------------------------------------------------------------------------*/

<?php

use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\ImpartsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RolesUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

Route::get('/', [IndexController::class, 'index']);

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

/*----------------------------------- RUTAS ROLES ------------------------------------------------*/
Route::get('/role_user/assign', [RolesUserController::class, 'create']);
Route::post('/role_user/assign', [RolesUserController::class, 'store']);

Route::get('/role_user/show', [RolesUserController::class, 'show']);

Route::delete('/role_user/delete/{id}', [RolesUserController::class, 'destroy']);
/*------------------------------------------------------------------------------------------------*/

Auth::routes();

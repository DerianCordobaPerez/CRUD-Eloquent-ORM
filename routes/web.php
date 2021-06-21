<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

Route::get('/', function () {
    return view('welcome');
});

/*----------------------------------- RUTAS PROFESOR ---------------------------------------------*/
Route::get('/teacher/create', [TeacherController::class, 'create']);
Route::post('teacher/create', [TeacherController::class, 'store']);

Route::get('/teacher/show', [TeacherController::class, 'show']);

Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit']);
Route::post('/teacher/edit', [TeacherController::class, 'update']);

Route::post('/teacher/delete/{id}', [TeacherController::class, 'destroy']);
/*------------------------------------------------------------------------------------------------*/

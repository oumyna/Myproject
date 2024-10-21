<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\S_formationController;
use App\Http\Controllers\S_examenController;
use App\Http\Controllers\ReclamationController;
;

Route::get('/',[Authcontroller::class,'login']);
Route::post('/',[Authcontroller::class,'auth_login']);
Route::get('/logout',[Authcontroller::class,'logout']);

Route::group(['middleware'=>'useradmin'],function(){

    Route::get('panel/dashboard',[DashboardController::class,'dashboard']);

    Route::get('panel/role',[RoleController::class,'list']);
    Route::get('panel/role/add',[RoleController::class,'add']);
    Route::post('panel/role/add',[RoleController::class,'insert']);
    Route::get('panel/role/edit/{id}',[RoleController::class,'edit']);
    Route::post('panel/role/edit/{id}',[RoleController::class,'update']);
    Route::get('panel/role/delete/{id}',[RoleController::class,'delete']);

    Route::get('panel/user',[UserController::class,'list']);
    Route::get('panel/user/add',[UserController::class,'add']);
    Route::post('panel/user/add',[UserController::class,'insert']);
    Route::get('panel/user/edit/{id}',[UserController::class,'edit']);
    Route::post('panel/user/edit/{id}',[UserController::class,'update']);
    Route::get('panel/user/delete/{id}',[UserController::class,'delete']);
    Route::get('panel/user/search', [UserController::class, 'search'])->name('user.search');

    Route::get('panel/s_formation',[S_formationController::class,'list']);
    Route::get('panel/s_formation/add',[S_formationController::class,'add']);
    Route::post('panel/s_formation/add',[S_formationController::class,'insert']);
    Route::get('panel/s_formation/edit/{id}',[S_formationController::class,'edit']);
    Route::post('panel/s_formation/edit/{id}',[S_formationController::class,'update']);
    Route::get('panel/s_formation/delete/{id}',[S_formationController::class,'delete']);

    Route::get('panel/s_examen',[S_examenController::class,'list']);
    Route::get('panel/s_examen/add',[S_examenController::class,'add']);
    Route::post('panel/s_examen/add',[S_examenController::class,'insert']);
    Route::get('panel/s_examen/edit/{id}',[S_examenController::class,'edit']);
    Route::post('panel/s_examen/edit/{id}', [S_examenController::class, 'update']);
    Route::get('panel/s_examen/delete/{id}',[S_examenController::class,'delete']);

    Route::get('panel/reclamation',[ReclamationController::class,'list']);
    Route::get('panel/reclamation/add',[ReclamationController::class,'add']);
    Route::post('panel/reclamation/add',[ReclamationController::class,'insert']);
    Route::get('panel/reclamation/edit/{id}',[ReclamationController::class,'edit']);
    Route::post('panel/reclamation/edit/{id}', [ReclamationController::class, 'update']);
    Route::get('panel/reclamation/delete/{id}',[ReclamationController::class,'delete']);

     

});







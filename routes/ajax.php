<?php

use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth:admin,teacher,parent,student'], function(){
    Route::get('get_classrooms/{id}', [AjaxController::class, 'get_classrooms']);
    Route::get('get_sections/{id}', [AjaxController::class, 'get_sections']);
});
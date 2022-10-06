<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\backend\semester\semesterController;
use App\Http\Controllers\backend\department\departmentController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Logout & Chnage Password!
Route::group(['middleware'=>'auth'],function(){
    Route::get('logout',[logoutController::class,'logout'])->name('logout');
    Route::get('passwordChangeFormOpen',[logoutController::class,'passwordChangeFormOpen'])->name('passwordChangeFormOpen');
    Route::post('passwordChangeFormDone',[logoutController::class,'passwordChangeFormDone'])->name('passwordChangeDone');

});

//Creating Semester
Route::group(['middleware'=>'auth'],function(){
    //Creating Semester
    Route::get('/semesterFormOpen',[semesterController::class,'semesterFormOpen'])->name('semesterFormOpen');
    Route::post('/semesterDataInsert',[semesterController::class,'semesterDataInsert'])->name('semesterDataInsert');
    Route::get('/semesterDataShow',[semesterController::class,'semesterDataShow'])->name('semesterDataShow');
    Route::get('/semesterDataUpdate/{id}',[semesterController::class,'semesterDataUpdate'])->name('semesterDataUpdate');
    Route::post('/semesterDataEdit/{id}',[semesterController::class,'semesterDataEdit'])->name('semesterDataEdit');
    Route::get('/semesterDataDelete/{id}',[semesterController::class,'semesterDataDelete'])->name('semesterDataDelete');
});
//Creating Department
Route::group(['middleware'=>'auth'],function(){
    //Creating Departmemnt
    Route::get('/departmentFormOpen',[departmentController::class,'departmentFormOpen'])->name('departmentFormOpen');
    Route::post('/departmentDataInsert',[departmentController::class,'departmentDataInsert'])->name('departmentDataInsert');
    Route::get('/departmentDataShow',[departmentController::class,'departmentDataShow'])->name('departmentDataShow');
    Route::get('/departmentDataUpdate/{id}',[departmentController::class,'departmentDataUpdate'])->name('departmentDataUpdate');
    Route::post('/departmentDataEdit/{id}',[departmentController::class,'departmentDataEdit'])->name('departmentDataEdit');
    Route::get('/departmentDataDelete/{id}',[departmentController::class,'departmentDataDelete'])->name('departmentDataDelete');
});




require __DIR__.'/auth.php';

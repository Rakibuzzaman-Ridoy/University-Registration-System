<?php

use App\Http\Controllers\frontend\PayableAmount\studentPaymentAmountView;
use App\Http\Controllers\frontend\registration\registrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\backend\semester\semesterController;
use App\Http\Controllers\backend\department\departmentController;
use App\Http\Controllers\backend\paymentCategory\paymentCategoryController;
use App\Http\Controllers\backend\paymentAmount\paymentAmountController;
use App\Http\Controllers\backend\course\courseController;
use App\Http\Controllers\backend\credit\creditController;
use App\Http\Controllers\backend\teacher\teacherController;
use App\Http\Controllers\frontend\courses\courseControllers as CoursesCourseControllers;
use App\Http\Controllers\frontend\student\StudentController;
use App\Http\Controllers\frontend\teachers\teacherControllers;

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
Route::get('/dashboardOpen',function(){
    return view('landing/frontend');
})->name('studentDashboard')->middleware('student_auth');
//Route::get('/dashboardOpen',[StudentController::class,'dashboardOpen'])->name('dashboardOpen')->middleware('student_auth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*==========================================Student=================================================*/
//Registration and Login

Route::group(["prefix"=>"student"],function(){
    Route::get('/studentRegisterFormOpen', [StudentController::class,'studentRegisterFormOpen'])->name('studentRegisterFormOpen')
            ->middleware('student_guard');

    Route::post('/studentRegisterFormSubmit', [StudentController::class,'studentRegisterFormSubmit'])->name('studentRegisterFormSubmit');
    Route::get('/studentLoginFormOpen', [StudentController::class,'studentLoginFormOpen'])
            ->name('studentLoginFormOpen')->middleware('student_guard');

    Route::post('/studentLoginFormSubmit', [StudentController::class,'studentLoginFormSubmit'])->name('studentLoginFormSubmit');
    Route::get('/studentLogout', [StudentController::class,'studentLogout'])
                ->name('studentLogout')->middleware('student_auth');

    Route::get('/passwordChangeFormOpen', [StudentController::class,'passwordChangeFormOpen'])
    ->name('PasswordChangeFormOpen')->middleware('student_auth');

    Route::post('/passwordChangeFormSubmit', [StudentController::class,'passwordChangeFormSubmit'])
    ->name('PasswordChangeFormSubmit')->middleware('student_auth');
});


//Payment Amount
Route::group(['middleware'=>'student_auth'],function(){
    Route::get('/studentPaymentAmountDataShow',[studentPaymentAmountView::class,'studentPaymentAmountDataShow'])->name('studentPaymentAmountDataShow');
    Route::get('/studentPaymentAmountDataShowDetails/{paymentCategory_id}',[studentPaymentAmountView::class,'studentPaymentAmountDataShowDetails'])->name('studentPaymentAmountDataShowDetails');
});    

//Student Courses Info
Route::group(['middleware'=>'student_auth'],function(){
    Route::get('/studentCourseDataShow',[CoursesCourseControllers::class,'studentCourseDataShow'])->name('studentCourseDataShow');
});  

//Student viewing Teacher's Data
Route::group(['middleware'=>'student_auth'],function(){
    Route::get('/studenTteacherDataShow',[teacherControllers::class,'studenTteacherDataShow'])->name('studenTteacherDataShow');
});  

//Pre Registration
Route::group(['middleware'=>'student_auth'],function(){
    Route::get('/regFormOpen',[registrationController::class,'regFormOpen'])->name('regFormOpen');
    Route::post('/regFormSubmit',[registrationController::class,'regFormSubmit'])->name('regFormSubmit');
    Route::get('/checkStatusStudent',[registrationController::class,'checkStatusStudent'])->name('checkStatusStudent');

});   


/*==========================================End Student=================================================*/


























/*======================================Admin================================================*/
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
//Payment Category
Route::group(['middleware'=>'auth'],function(){
    //Creating payment category
    Route::get('/paymentCategoryFormOpen',[paymentCategoryController::class,'paymentCategoryFormOpen'])->name('paymentCategoryFormOpen');
    Route::post('/paymentCategoryDataInsert',[paymentCategoryController::class,'paymentCategoryDataInsert'])->name('paymentCategoryDataInsert');
    Route::get('/paymentCategoryDataShow',[paymentCategoryController::class,'paymentCategoryDataShow'])->name('paymentCategoryDataShow');
    Route::get('/paymentCategoryDataUpdate/{id}',[paymentCategoryController::class,'paymentCategoryDataUpdate'])->name('paymentCategoryDataUpdate');
    Route::post('/paymentCategoryDataEdit/{id}',[paymentCategoryController::class,'paymentCategoryDataEdit'])->name('paymentCategoryDataEdit');
    Route::get('/paymentCategoryDataDelete/{id}',[paymentCategoryController::class,'paymentCategoryDataDelete'])->name('paymentCategoryDataDelete');
});

//Payment Amount
Route::group(['middleware'=>'auth'],function(){
    //Creating payment Amount
    Route::get('/paymentAmountFormOpen',[paymentAmountController::class,'paymentAmountFormOpen'])->name('paymentAmountFormOpen');
    Route::post('/paymentAmountDataInsert',[paymentAmountController::class,'paymentAmountDataInsert'])->name('paymentAmountDataInsert');
    Route::get('/paymentAmountDataShow',[paymentAmountController::class,'paymentAmountDataShow'])->name('paymentAmountDataShow');
    Route::get('/paymentAmountDataUpdate/{paymentCategory_id}',[paymentAmountController::class,'paymentAmountDataUpdate'])->name('paymentAmountDataUpdate');
    Route::post('/paymentAmountDataEdit/{paymentCategory_id}',[paymentAmountController::class,'paymentAmountDataEdit'])->name('paymentAmountDataEdit');
    //Route::get('/paymentAmountDataDelete/{id}',[paymentAmountController::class,'paymentAmountDataDelete'])->name('paymentAmountDataDelete');
    Route::get('/paymentAmountDataShowDetails/{paymentCategory_id}',[paymentAmountController::class,'paymentAmountDataShowDetails'])->name('paymentAmountDataShowDetails');
});
//Creating Course
Route::group(['middleware'=>'auth'],function(){
    //Creating Course
    Route::get('/courseFormOpen',[courseController::class,'courseFormOpen'])->name('courseFormOpen');
    Route::post('/courseDataInsert',[courseController::class,'courseDataInsert'])->name('courseDataInsert');
    Route::get('/courseDataShow',[courseController::class,'courseDataShow'])->name('courseDataShow');
    Route::get('/courseDataUpdate/{id}',[courseController::class,'courseDataUpdate'])->name('courseDataUpdate');
    Route::post('/courseDataEdit/{id}',[courseController::class,'courseDataEdit'])->name('courseDataEdit');
    Route::get('/courseDataDelete/{id}',[courseController::class,'courseDataDelete'])->name('courseDataDelete');
});

//Creating Credit
Route::group(['middleware'=>'auth'],function(){
    //Creating Credit
    Route::get('/creditFormOpen',[creditController::class,'creditFormOpen'])->name('creditFormOpen');
    Route::post('/creditDataInsert',[creditController::class,'creditDataInsert'])->name('creditDataInsert');
    Route::get('/creditDataShow',[creditController::class,'creditDataShow'])->name('creditDataShow');
    Route::get('/creditDataUpdate/{id}',[creditController::class,'creditDataUpdate'])->name('creditDataUpdate');
    Route::post('/creditDataEdit/{id}',[creditController::class,'creditDataEdit'])->name('creditDataEdit');
    Route::get('/creditDataDelete/{id}',[creditController::class,'creditDataDelete'])->name('creditDataDelete');
});

//Creating Teacher
Route::group(['middleware'=>'auth'],function(){
    //Creating Teacher
    Route::get('/teacherFormOpen',[teacherController::class,'teacherFormOpen'])->name('teacherFormOpen');
    Route::post('/teacherDataInsert',[teacherController::class,'teacherDataInsert'])->name('teacherDataInsert');
    Route::get('/teacherDataShow',[teacherController::class,'teacherDataShow'])->name('teacherDataShow');
    Route::get('/teacherDataUpdate/{id}',[teacherController::class,'teacherDataUpdate'])->name('teacherDataUpdate');
    Route::post('/teacherDataEdit/{id}',[teacherController::class,'teacherDataEdit'])->name('teacherDataEdit');
    Route::get('/teacherDataDelete/{id}',[teacherController::class,'teacherDataDelete'])->name('teacherDataDelete');
});

//Registration Request View
Route::group(['middleware'=>'auth'],function(){
    Route::get('/regDataShow',[registrationController::class,'regDataShow'])->name('regDataShow');
    Route::get('/regDataDetails/{student_id}',[registrationController::class,'regDataDetails'])->name('regDataDetails');
    Route::post('/regStatus',[registrationController::class,'regStatus'])->name('regStatus');
});


/*======================================End Admin================================================*/





require __DIR__.'/auth.php';

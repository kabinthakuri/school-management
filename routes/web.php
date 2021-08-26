<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout', 'App\Http\Controllers\admincontroller@Logout')->name('admin.logout');

Route::prefix('users')->group(function(){
    Route::get('/view', 'App\Http\Controllers\Backend\UserController@UserView')->name('user.view');
    Route::get('/add', 'App\Http\Controllers\Backend\UserController@UserAdd')->name('user.add');
    Route::post('/store', 'App\Http\Controllers\Backend\UserController@UserStore')->name('user.store');
    Route::get('/edit/{id}','App\Http\Controllers\Backend\UserController@UserEdit')->name('user.edit');
    Route::post('/update/{id}', 'App\Http\Controllers\Backend\UserController@UserUpdate')->name('user.update');
    Route::get('/delete/{id}','App\Http\Controllers\Backend\UserController@UserDelete')->name('user.delete');
});
Route::prefix('profile')->group(function(){
    Route::get('/view', 'App\Http\Controllers\Backend\ProfileController@ProfileView')->name('profile.view');
    Route::get('/edit', 'App\Http\Controllers\Backend\ProfileController@ProfileEdit')->name('profile.edit');
    Route::post('/store','App\Http\Controllers\Backend\ProfileController@ProfileStore')->name('profile.store');
    Route::get('/password/view', 'App\Http\Controllers\Backend\ProfileController@PasswordView')->name('password.view');
    Route::post('/password/update', 'App\Http\Controllers\Backend\ProfileController@PasswordUpdate')->name('password.update');
});
Route::prefix('setups')->group(function(){
    Route::get('/student/class/view', 'App\Http\Controllers\Backend\Setup\StudentClassController@ViewStudent')->name('student.class.view');
    Route::get('/student/class/add', 'App\Http\Controllers\Backend\Setup\StudentClassController@AddStudent')->name('student.class.add');
    Route::post('/student/class/store', 'App\Http\Controllers\Backend\Setup\StudentClassController@StoreStudent')->name('student.class.store');
    Route::get('/student/class/edit/{id}', 'App\Http\Controllers\Backend\Setup\StudentClassController@EditStudent')->name('student.class.edit');
    Route::post('/student/class/update/{id}', 'App\Http\Controllers\Backend\Setup\StudentClassController@UpdateStudent')->name('student.class.update');
    Route::get('/student/class/delete/{id}', 'App\Http\Controllers\Backend\Setup\StudentClassController@DeleteStudent')->name('student.class.delete');

    Route::get('/student/year/view', 'App\Http\Controllers\Backend\Setup\StudentYearController@ViewYear')->name('student.year.view');
    Route::get('/student/year/add', 'App\Http\Controllers\Backend\Setup\StudentYearController@AddYear')->name('student.year.add');
    Route::post('/student/year/store', 'App\Http\Controllers\Backend\Setup\StudentYearController@StoreYear')->name('student.year.store');
    Route::get('/student/year/edit/{id}', 'App\Http\Controllers\Backend\Setup\StudentYearController@EditYear')->name('student.year.edit');
    Route::post('/student/year/update/{id}', 'App\Http\Controllers\Backend\Setup\StudentYearController@UpdateYear')->name('student.year.update');
    Route::get('/student/year/delete/{id}', 'App\Http\Controllers\Backend\Setup\StudentYearController@DeleteYear')->name('student.year.delete');

    Route::get('/student/group/view', 'App\Http\Controllers\Backend\Setup\StudentGroupController@ViewGroup')->name('student.group.view');
    Route::get('/student/group/add', 'App\Http\Controllers\Backend\Setup\StudentGroupController@AddGroup')->name('student.group.add');
    Route::post('/student/group/store', 'App\Http\Controllers\Backend\Setup\StudentGroupController@StoreGroup')->name('student.group.store');
    Route::get('/student/group/edit/{id}', 'App\Http\Controllers\Backend\Setup\StudentGroupController@EditGroup')->name('student.group.edit');
    Route::post('/student/group/update/{id}', 'App\Http\Controllers\Backend\Setup\StudentGroupController@UpdateGroup')->name('student.group.update');
    Route::get('/student/group/delete/{id}', 'App\Http\Controllers\Backend\Setup\StudentGroupController@DeleteGroup')->name('student.group.delete');

   
    Route::get('/fee/category/view', 'App\Http\Controllers\Backend\Setup\FeeCategoryController@ViewFeeCat')->name('fee.category.view');
    Route::get('/fee/category/add', 'App\Http\Controllers\Backend\Setup\FeeCategoryController@AddFeeCat')->name('fee.category.add');
    Route::post('/fee/category/store', 'App\Http\Controllers\Backend\Setup\FeeCategoryController@StoreFeeCat')->name('fee.category.store');
    Route::get('/fee/category/edit/{id}', 'App\Http\Controllers\Backend\Setup\FeeCategoryController@EditFeeCat')->name('fee.category.edit');
    Route::post('/fee/category/update/{id}', 'App\Http\Controllers\Backend\Setup\FeeCategoryController@UpdateFeeCat')->name('fee.category.update');
    Route::get('/fee/category/delete/{id}', 'App\Http\Controllers\Backend\Setup\FeeCategoryController@DeleteFeeCat')->name('fee.category.delete');

    Route::get('/fee/amount/view', 'App\Http\Controllers\Backend\Setup\FeeAmountController@ViewFeeAmount')->name('fee.amount.view');
    Route::get('/fee/amount/add', 'App\Http\Controllers\Backend\Setup\FeeAmountController@AddFeeAmount')->name('fee.amount.add');
    Route::post('/fee/amount/store', 'App\Http\Controllers\Backend\Setup\FeeAmountController@StoreFeeAmount')->name('fee.amount.store');
    Route::get('/fee/amount/edit/{feecategory_id}', 'App\Http\Controllers\Backend\Setup\FeeAmountController@EditFeeAmount')->name('fee.amount.edit');
    Route::post('/fee/amount/update/{feecategory_id}', 'App\Http\Controllers\Backend\Setup\FeeAmountController@UpdateFeeAmount')->name('fee.amount.update');
    Route::get('/fee/amount/details/{feecategory_id}', 'App\Http\Controllers\Backend\Setup\FeeAmountController@DetailFeeAmount')->name('fee.amount.details');

    Route::get('/student/exam/view', 'App\Http\Controllers\Backend\Setup\StudentExamController@ViewExam')->name('student.exam.view');
    Route::get('/student/exam/add', 'App\Http\Controllers\Backend\Setup\StudentExamController@AddExam')->name('student.exam.add');
    Route::post('/student/exam/store', 'App\Http\Controllers\Backend\Setup\StudentExamController@StoreExam')->name('student.exam.store');
    Route::get('/student/exam/edit/{id}', 'App\Http\Controllers\Backend\Setup\StudentExamController@EditExam')->name('student.exam.edit');
    Route::post('/student/exam/update/{id}', 'App\Http\Controllers\Backend\Setup\StudentExamController@UpdateExam')->name('student.exam.update');
    Route::get('/student/exam/delete/{id}', 'App\Http\Controllers\Backend\Setup\StudentExamController@DeleteExam')->name('student.exam.delete');

    Route::get('/student/shift/view', 'App\Http\Controllers\Backend\Setup\StudentShiftController@ViewShift')->name('student.shift.view');
    Route::get('/student/shift/add', 'App\Http\Controllers\Backend\Setup\StudentShiftController@AddShift')->name('student.shift.add');
    Route::post('/student/shift/store', 'App\Http\Controllers\Backend\Setup\StudentShiftController@StoreShift')->name('student.shift.store');
    Route::get('/student/shift/edit/{id}', 'App\Http\Controllers\Backend\Setup\StudentShiftController@EditShift')->name('student.shift.edit');
    Route::post('/student/shift/update/{id}', 'App\Http\Controllers\Backend\Setup\StudentShiftController@UpdateShift')->name('student.shift.update');
    Route::get('/student/shift/delete/{id}', 'App\Http\Controllers\Backend\Setup\StudentShiftController@DeleteShift')->name('student.shift.delete');

    
    Route::get('/school/subject/view', 'App\Http\Controllers\Backend\Setup\SchoolSubjectController@ViewSubject')->name('school.subject.view');
    Route::get('/school/subject/add', 'App\Http\Controllers\Backend\Setup\SchoolSubjectController@AddSubject')->name('school.subject.add');
    Route::post('/school/subject/store', 'App\Http\Controllers\Backend\Setup\SchoolSubjectController@StoreSubject')->name('school.subject.store');
    Route::get('/school/subject/edit/{id}', 'App\Http\Controllers\Backend\Setup\SchoolSubjectController@EditSubject')->name('school.subject.edit');
    Route::post('/school/subject/update/{id}', 'App\Http\Controllers\Backend\Setup\SchoolSubjectController@UpdateSubject')->name('school.subject.update');
    Route::get('/school/subject/delete/{id}', 'App\Http\Controllers\Backend\Setup\SchoolSubjectController@DeleteSubject')->name('school.subject.delete');

    Route::get('/assign/subject/view', 'App\Http\Controllers\Backend\Setup\AssignSubjectController@ViewSubject')->name('assign.subject.view');
    Route::get('/assign/subject/add', 'App\Http\Controllers\Backend\Setup\AssignSubjectController@AddSubject')->name('assign.subject.add');
    Route::post('/assign/subject/store', 'App\Http\Controllers\Backend\Setup\AssignSubjectController@StoreSubject')->name('assign.subject.store');
    Route::get('/assign/subject/edit/{class_id}', 'App\Http\Controllers\Backend\Setup\AssignSubjectController@EditSubject')->name('assign.subject.edit');
    Route::post('/assign/subject/update/{class_id}', 'App\Http\Controllers\Backend\Setup\AssignSubjectController@UpdateSubject')->name('assign.subject.update');
    Route::get('/assign/subject/detail/{class_id}', 'App\Http\Controllers\Backend\Setup\AssignSubjectController@DetailSubject')->name('assign.subject.detail');
    
    Route::get('designation/view', 'App\Http\Controllers\Backend\Setup\DesignationController@ViewDesignation')->name('designation.view');
    Route::get('designation/add', 'App\Http\Controllers\Backend\Setup\DesignationController@AddDesignation')->name('designation.add');
    Route::post('designation/store', 'App\Http\Controllers\Backend\Setup\DesignationController@StoreDesignation')->name('designation.store');
    Route::get('designation/edit/{id}', 'App\Http\Controllers\Backend\Setup\DesignationController@EditDesignation')->name('designation.edit');
    Route::post('designation/update/{id}', 'App\Http\Controllers\Backend\Setup\DesignationController@UpdateDesignation')->name('designation.update');
    Route::get('designation/delete/{id}', 'App\Http\Controllers\Backend\Setup\DesignationController@DeleteDesignation')->name('designation.delete');
   });

   Route::prefix('students')->group(function(){
       Route::get('/reg/view','App\Http\Controllers\Backend\Student\StudentsRegController@ViewRegistration')->name('registration.view');
       Route::get('/reg/add','App\Http\Controllers\Backend\Student\StudentsRegController@AddRegistration')->name('registration.add');
       Route::post('/reg/store','App\Http\Controllers\Backend\Student\StudentsRegController@StoreRegistration')->name('registration.store');
       Route::get('/reg/search','App\Http\Controllers\Backend\Student\StudentsRegController@SearchRegistration')->name('registration.search');
       Route::get('/reg/edit/{student_id}','App\Http\Controllers\Backend\Student\StudentsRegController@EditRegistration')->name('registration.edit');
       Route::post('/reg/update/{student_id}','App\Http\Controllers\Backend\Student\StudentsRegController@UpdateRegistration')->name('registration.update');
       Route::get('/reg/promote/{student_id}','App\Http\Controllers\Backend\Student\StudentsRegController@PromoteRegistration')->name('registration.promote');
       Route::post('/reg/promoteupdate/{student_id}','App\Http\Controllers\Backend\Student\StudentsRegController@PromoteUpdateRegistration')->name('registration.promoteupdate');
   });
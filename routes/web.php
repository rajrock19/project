<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;


Route::get('/',[AuthController::class,'index'])->name('login');
Route::post('/authenticate',[AuthController::class,'authenticate'])->name('authenticate');
Route::get('employee/register',[AuthController::class,'employee_register'])->name('employee.register');
Route::post('employee/store',[AuthController::class,'employee_store'])->name('employee.store');
Route::get('logout', [AuthController::class, 'signOut'])->name('signout');

Route::middleware('auth')->group( function(){
    Route::get('/admin/dashboard',[AuthController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/admin/employee',[EmployeeController::class,'index'])->name('admin.employee.index');
    Route::get('get/employee',[EmployeeController::class,'get_employee'])->name('get.employee');
    Route::get('get/employee/edit/{id}',[EmployeeController::class,'get_employee_edit'])->name('get.employee.edit');
    Route::post('get/employee/update/{id}',[EmployeeController::class,'employee_update'])->name('employee.update');
    Route::delete('get/employee/delete/{id}',[EmployeeController::class,'destroy'])->name('employee.destroy');



    Route::get('/admin/get/all/employee',[EmployeeController::class,'get_all_employee'])->name('get.all.employee');
    




});




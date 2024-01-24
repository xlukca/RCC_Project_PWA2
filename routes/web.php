<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeConsumptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// USER

Route::get('/', function () {
    return view('user.index');
});

    // Coffee
    Route::get('user/coffee', [CoffeeConsumptionController::class, 'showEmployee'])->name('coffee');
    Route::post('user/coffee/register', [CoffeeConsumptionController::class, 'registerCoffee'])->name('coffee.register');

// ADMIN

Route::middleware(['auth'])->group(function () { 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', function () {
    return view('admin.index');
});

    // Departments
    Route::resource('/admin/departments', App\Http\Controllers\DepartmentController::class);
    Route::delete('/admin/departments/force/{id}', [App\Http\Controllers\DepartmentController::class, 'forceDestroy'])->name('departments.forceDestroy');
    Route::post('/admin/departments/restore/{id}', [App\Http\Controllers\DepartmentController::class, 'restore'])->name('departments.restore');

    // Employees
    Route::resource('/admin/employees', App\Http\Controllers\EmployeeController::class);
    Route::delete('/admin/employees/force/{id}', [App\Http\Controllers\EmployeeController::class, 'forceDestroy'])->name('employees.forceDestroy');
    Route::post('/admin/employees/restore/{id}', [App\Http\Controllers\EmployeeController::class, 'restore'])->name('employees.restore');

    // Payments
    Route::resource('/admin/payments', App\Http\Controllers\PaymentController::class);
    Route::delete('/admin/payments/force/{id}', [App\Http\Controllers\PaymentController::class, 'forceDestroy'])->name('payments.forceDestroy');
    Route::post('/admin/payments/restore/{id}', [App\Http\Controllers\PaymentController::class, 'restore'])->name('payments.restore');
    
});

Auth::routes();
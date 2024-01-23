<?php

use Illuminate\Support\Facades\Route;

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


// ADMIN

Route::middleware(['auth'])->group(function () { 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', function () {
    return view('admin.index');
});

    // Departments
    Route::resource('/admin/departments', App\Http\Controllers\DepartmentController::class);
    Route::delete('/authors/force/{id}', [App\Http\Controllers\DepartmentController::class, 'forceDestroy'])->name('departments.forceDestroy');
    Route::post('/authors/restore/{id}', [App\Http\Controllers\DepartmentController::class, 'restore'])->name('departments.restore');


});

Auth::routes();
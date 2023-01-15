
<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\EmployerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
 */

// login routes
Route::get('/login', [AdminAuthController::class, 'showLoginForm']);
Route::post('/dologin', [AdminAuthController::class, 'doLogin']);

Route::middleware('admin')->group(function () {
    // dashboard route
    Route::get('/dashboard', [AdminAuthController::class, 'showDashboard']);

    // admin employer routes
    Route::prefix('employer')->group(function () {
        Route::get('/', [EmployerController::class, 'showEmployers'])->name('employerListing');
        Route::get('/json', [EmployerController::class, 'tableJson'])->name('employerJson');
        Route::get('/show/{id}', [EmployerController::class, 'viewEmployer']);
        Route::get('/edit/{id}', [EmployerController::class, 'editEmployer']);
        Route::post('/update/{id}', [EmployerController::class, 'updateEmployer'])->name('updateEmployer');
        Route::get('/add', [EmployerController::class, 'addEmployer'])->name('addEmployer');
        Route::post('/create', [EmployerController::class, 'createEmployer'])->name('createEmployer');
        Route::delete('/delete/{id}', [EmployerController::class, 'deleteEmployer'])->name('deleteEmployer');
    });
});

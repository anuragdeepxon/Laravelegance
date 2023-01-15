<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Import the admin routes file
Route::prefix('admin')->namespace('Admin')->group(base_path('routes/panel/admin.php'));

// Import the employer routes file
Route::prefix('employer')->namespace('Employer')->group(base_path('routes/panel/employer.php'));

// Import the candidate routes file
Route::prefix('candidate')->namespace('Candidate')->group(base_path('routes/panel/candidate.php'));

// Import the agency routes file
Route::prefix('agency')->namespace('Agency')->group(base_path('routes/panel/agency.php'));


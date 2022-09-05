<?php

use App\Http\Controllers\Admin\CoursesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Get Home page route
Route::get('/', [App\Http\Controllers\Front\FrontController::class, 'index']);

// Get course frontend route
Route::get('course/{courses_title}', [App\Http\Controllers\Front\FrontController::class, 'viewCourses']);

// Route for get tests
Route::get('/course/{courses_title}/{test_title}', [App\Http\Controllers\Front\FrontController::class, 'viewTest']);


// Route for user profile

Route::get('profile/{user_id}', [App\Http\Controllers\Front\FrontController::class, 'profile']);

// Admin Route If user is Admin
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    // Route for dashboard admin panel
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    /*
     *
     * Route For Courses
     *  
     */
    
    // Route For Courses Page
    Route::get('courses', [App\Http\Controllers\Admin\CoursesController::class,'index']);
    // Route for Get Courses, get course data
    Route::get('add-courses', [App\Http\Controllers\Admin\CoursesController::class,'create']);
    // Route For Create Courses, create course data
    Route::post('add-courses', [App\Http\Controllers\Admin\CoursesController::class,'store']);
    // Route For Edit Course, Get courses data for edit
    Route::get('edit-courses/{courses_id}', [App\Http\Controllers\Admin\CoursesController::class,'edit']);
    Route::put('update-courses/{courses_id}', [App\Http\Controllers\Admin\CoursesController::class,'update']);
    // Delete Course
    Route::get('delete-courses/{courses_id}', [App\Http\Controllers\Admin\CoursesController::class,'delete']);

    /**
     * 
     * Route for Tests
     * 
     */

    // Test Route
    Route::get('tests', [App\Http\Controllers\Admin\TestController::class, 'index']);
    // Route for get test
    Route::get('add-test', [App\Http\Controllers\Admin\TestController::class, 'create']);
    // Route for create test
    Route::post('add-test', [App\Http\Controllers\Admin\TestController::class, 'store']);
    
    // Route for Edit Get test
    Route::get('test/{test_id}', [App\Http\Controllers\Admin\TestController::class, 'edit']);

    // Route for update test
    Route::put('update-test/{test_id}', [App\Http\Controllers\Admin\TestController::class, 'update']);

    // Route for delete test
    Route::get('delete-test/{test_id}', [App\Http\Controllers\Admin\TestController::class, 'delete']);


    /**
     * 
     * Route For Users
     * 
     */

     // Route for get users on the page
     Route::get('users', [App\Http\Controllers\Admin\UsersController::class, 'index']);

     // Route for add users
     Route::get('add-users', [App\Http\Controllers\Admin\UsersController::class, 'create']);

     // Route for create users
     Route::post('add-users', [App\Http\Controllers\Admin\UsersController::class, 'store']);

     // Route for edit users
     Route::get('edit-users/{user_id}', [App\Http\Controllers\Admin\UsersController::class, 'edit']);

     // Route for update test
     Route::put('update-users/{user_id}', [App\Http\Controllers\Admin\UsersController::class, 'update']);

     // Route for delete user
     Route::get('delete-users/{user_id}', [App\Http\Controllers\Admin\UsersController::class, 'delete']);



});
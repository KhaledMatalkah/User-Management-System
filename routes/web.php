<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

    Route::get('/index', [DashboardController::class, 'index'])->name('index');
    Route::get('/usertable',[DashboardController::class, 'usertable'])->name('usertable')->middleware('auth');
    Route::get('/createUser', [DashboardController::class, 'createUser'])->name('createUser');
    Route::post('/store',[DashboardController::class, 'store'])->name('store')->middleware('auth');
    Route::post('/deleteuser/{id}',[DashboardController::class, 'delete'])->name('delete')->middleware('auth');

    Route::post('/deleteuser/{id}',[DashboardController::class, 'delete'])->name('delete')->middleware('auth');
    Route::get('/edituser/{id}',[DashboardController::class, 'edit'])->name('edit')->middleware('auth');
    Route::post('/update/{id}',[DashboardController::class, 'updateUser'])->name('updateUser')->middleware('auth');

    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
    Route::delete('/departments/{id}', [DepartmentController::class, 'delete'])->name('departments.delete');

    Route::get('/users/search', [UserController::class, 'search'])->name('users.search');

});

Route::middleware('auth')->group(function () {
    Route::get('/userProfile/{id}', [UserController::class, 'index'])->name('userProfile');
});

Auth::routes();



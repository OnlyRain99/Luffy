<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
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

//Route::middleware([
    //'auth:sanctum',
   // config('jetstream.auth_session'),
   // 'verified',
//])->group(function () {
 //   Route::get('/dashboard', function () {
  //      return view('admin.index');
  //  })->name('dashboard');
//});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function (){
    return view('admin.index');
})->name('dashboard');

Route::get('/admin/logout',[AdminController::class, 'Logout'])->name('admin.logout');

// User Management all routes
Route::prefix('users')->group(function(){
    Route::get('/view',[UserController::class,'UserView'])->name('user.view');
    Route::get('/add',[UserController::class,'UserAdd'])->name('users.add');
    Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');
    Route::get('/edit/{id}',[UserController::class,'UserEdit'])->name('users.edit');
    Route::post('/update/{id}',[UserController::class,'UserUpdate'])->name('users.update');
    Route::get('/delete/{id}',[UserController::class,'UserDelete'])->name('users.delete');
});

/// user profile and change password
Route::prefix('profile')->group(function(){
    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    
    
});



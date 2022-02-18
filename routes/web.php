<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
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

Route::get('/login',[LoginController::class, 'show'])->name('login');
Route::post('/login',[LoginController::class, 'process']);
Route::get('/',[UserController::class, 'dashboard']);
Route::redirect('/home', '/', 301);
Route::get('/apply',[UserController::class, 'show_apply']);
Route::post('/apply',[UserController::class, 'store_apply']);
Route::get('/setting',[UserController::class, 'show_setting']);
Route::get('/user/details',[UserController::class, 'show_user_details'])->name('user_details');
Route::post('/user/details',[UserController::class, 'store_user_details']);
Route::get('/user/profile/picture',[UserController::class, 'show_user_profile_picture']);
Route::get('/user/leave/history',[UserController::class, 'all_history']);
Route::get('/user/leave/details/{id}', [UserController::class, 'leave_details']);
Route::get('/user/leave/edit/{id}',[UserController::class, 'show_edit_leave']);
Route::put('/user/leave/edit/{id}',[UserController::class, 'store_edit_leave']);
Route::delete('/user/leave/delete/{id}', [UserController::class, 'delete_leave']);
Route::get('/user/change/password',[UserController::class, 'change_password'])->name('user_password');
Route::post('/user/change/password',[UserController::class, 'store_password']);
Route::get('/user/change/picture', [UserController::class, 'change_picture']);
Route::post('/user/change/picture', [UserController::class, 'store_picture']);
Route::post('/logout',[UserController::class, 'logout']);


Route::get('/admin/login', [AdminLoginController::class, 'show']);
Route::post('/admin/login', [AdminLoginController::class, 'process']);
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::get('/all/employee', [AdminController::class, 'all_employee']);
Route::get('/new/admin', [AdminController::class, 'show_admin']);
Route::post('/new/admin', [AdminController::class, 'store_admin']);
Route::get('/new/employee', [AdminController::class, 'new_employee']);
Route::get('/admin/leave/request', [AdminController::class, 'leave_request']);
Route::post('/new/employee', [AdminController::class, 'store_new_employee'])->name('store_employee');
Route::get('/admin/setting',[AdminController::class, 'setting']);
Route::get('/admin/leave/details/{id}',[AdminController::class, 'leave_details']);
Route::post('/admin/update/status/{id}',[AdminController::class,'update_status']);
Route::get('/admin/active/leaves',[AdminController::class, 'active_leave']);
Route::get('/admin/update/details',[AdminController::class, 'update_admin_details']);
Route::post('/admin/update/details',[AdminController::class, 'store_admin_details']);
Route::get('/admin/change/picture',[AdminController::class, 'show_picture']);
Route::post('/admin/change/picture',[AdminController::class, 'store_picture']);
Route::get('/admin/change/password',[AdminController::class, 'change_password']);
Route::post('/admin/change/password',[AdminController::class, 'store_password']);
Route::post('/admin/logout',[AdminController::class, 'logout']);

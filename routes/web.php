<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\login\AdminLoginController;
use App\Http\Controllers\login\SuperAdminLoginController;
use App\Http\Controllers\superadmin\SuperAdminController;
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

/**
 * Admin Routes
 */
Route::group(['middleware'=>'admin.guest'],function(){
    Route::get('/', [AdminLoginController::class, 'index'])->name('admin.loginform');
    Route::post('/admin/authenticate',[AdminLoginController::class,'auth'])->name('admin.checklogin');
});

Route::group(['middleware'=>'admin.auth'],function(){
    Route::get('/admin/myprofile',[AdminLoginController::class,'myprofile'])->name('admin.myprofile');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/patient',[AdminController::class,'store'])->name('admin.store');
    Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::get('/admin/delete/patient/{patient_id}',[AdminController::class,'destroy'])->name('admin.destroy');
    Route::get('/admin/patient/record/{patient_id}',[AdminController::class,'show'])->name('admin.show');
    Route::get('/admin/patient/edit/{patient_id}',[AdminController::class,'edit'])->name('admin.edit');
    Route::post('/admin/patient/update/{patient_id}',[AdminController::class,'update'])->name('admin.update');
    /**
     * Routes for visit records
     */
    Route::get('/admin/visit/{patient_id}',[AdminController::class, 'visitindex'])->name('admin.visitindex');
    Route::post('admin/create/visit',[AdminController::class, 'visitstore'])->name('admin.visit.store');
});



/**
 * Test Routes
 */
// Route::get('/view', function () {
//     return view('admin.view');
// });
// Route::get('/myp',function(){
//     return view('admin.myprofile');
// });
// Route::get('/edit',function(){
//     return view('admin.edit');
// });



/**
 * Super Admin Routes
 */
Route::get('/superadmin/login',[SuperAdminLoginController::class,'index'])->name('superadmin.loginform');
Route::get('/superadmin',[SuperAdminController::class,'index'])->name('superadmin.index');



<?php 



use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeSectionController;
use App\Http\Controllers\Admin\ServiceSectionController;
use App\Http\Controllers\Admin\faqController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Auth\UserAuthController;

use App\Models\CareerApplication;







/* ================= USER AUTH ================= */

Route::get('/login', [UserAuthController::class, 'login'])->name('login');
Route::post('/login', [UserAuthController::class, 'loginPost']);

Route::get('/register', [UserAuthController::class, 'register']);
Route::post('/register', [UserAuthController::class, 'registerPost']);

Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');




Route::get('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/login', [AuthController::class, 'loginPost']);

Route::get('/admin/create', [AuthController::class, 'createAdminForm']); // show form
Route::post('/admin/create', [AuthController::class, 'createAdmin']);     // store in DB

Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');


       /* ================= HOME SECTION ================= */
       
    Route::get('/home-section', [HomeSectionController::class, 'index'])->name('home.index');
    Route::get('/home-section/edit', [HomeSectionController::class, 'edit'])->name('home.edit');
    Route::put('/home-section/update', [HomeSectionController::class, 'update'])->name('home.update');
    Route::delete('/home-section/{id}', [HomeSectionController::class, 'destroy'])->name('home.destroy');


    
    Route::resource('services', \App\Http\Controllers\Admin\ServiceSectionController::class);
    Route::resource('faq', \App\Http\Controllers\Admin\FaqController::class);
    
    Route::get('career', [CareerController::class, 'index'])->name('career');


});

 
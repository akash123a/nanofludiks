<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\HomeSectionController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\OrderController;


use App\Models\Slider;


Route::get('/', function () {
    return view('welcome');
});



Route::post('/order/{product}', [OrderController::class, 'store'])
    ->middleware('auth')
    ->name('order.store');

Route::get('/user/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('user.dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/user/dashboard', function () {
//         return view('user.dashboard');
//     })->name('user.dashboard');
// });



/* ================= USER REGISTER ================= */

Route::get('/register', [UserAuthController::class, 'register'])->name('register');
Route::post('/register', [UserAuthController::class, 'registerPost']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('blogs', [BlogController::class, 'index'])->name('blog.index');
    Route::get('blogs/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('blogs', [BlogController::class, 'store'])->name('blog.store');
    Route::get('blogs/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('blogs/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('blogs/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

 
 Route::get('/sliders', [SliderController::class, 'index'])->name('slider.index');
    Route::get('/sliders/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('/sliders/store', [SliderController::class, 'store'])->name('slider.store');

    Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('slider.edit');
Route::post('/slider/update/{id}', [SliderController::class, 'update'])->name('slider.update');

Route::delete('/slider/delete/{id}', [SliderController::class, 'destroy'])->name('slider.delete');


 Route::resource('products', ProductController::class);





});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\User\GeneralController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\User\UserReservationController;



Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// admin
Route::group(['prefix'=>'admin','middleware'=>'admin_middleware'],function(){
    // Route::get('/',[AdminController::class,'indexPage'])->name('admin#index');
    Route::redirect('/', '/admin/category')->name('admin#index');
    // category
    Route::get('/category',[CategoryController::class,'indexPage'])->name('admin#category');
    Route::get('/newCategory',[CategoryController::class,'newCategory'])->name('admin#newCategory');
    Route::post('/category/store',[CategoryController::class,'store'])->name('admin#categoryStore');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('admin#categoryEdit');
    Route::post('/category/update/{id}',[CategoryController::class,'update'])->name('admin#categoryUpdate');
    Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->name('admin#categoryDelete');
    //menu
    Route::get('/menu',[MenuController::class,'indexPage'])->name('admin#menu');
    Route::get('/newMenu',[MenuController::class,'newMenu'])->name('admin#newMenu');
    Route::post('/menu/store',[MenuController::class,'store'])->name('admin#menuStore');
    Route::get('/menu/edit/{id}',[MenuController::class,'edit'])->name('admin#menuEdit');
    Route::post('/menu/update/{id}',[MenuController::class,'update'])->name('admin#menuUpdate');
    Route::get('/menu/delete/{id}',[MenuController::class,'delete'])->name('admin#menuDelete');
     //table
     Route::get('/table',[TableController::class,'indexPage'])->name('admin#table');
     Route::get('/newTable',[TableController::class,'newTable'])->name('admin#newTable');
     Route::post('/table/store',[TableController::class,'store'])->name('admin#tableStore');
     Route::get('/table/edit/{id}',[TableController::class,'edit'])->name('admin#tableEdit');
     Route::post('/table/update/{id}',[TableController::class,'update'])->name('admin#tableUpdate');
     Route::get('/table/delete/{id}',[TableController::class,'delete'])->name('admin#tableDelete');

      //reservation
    Route::get('/reservation',[ReservationController::class,'indexPage'])->name('admin#reservation');
    Route::get('/newReservation',[ReservationController::class,'newReservation'])->name('admin#newReservation');
    Route::post('/reservation/store',[ReservationController::class,'store'])->name('admin#reservationStore');
    Route::get('/reservation/edit/{id}',[ReservationController::class,'edit'])->name('admin#reservationEdit');
    Route::post('/reservation/update/{id}',[ReservationController::class,'update'])->name('admin#reservationUpdate');
    Route::get('/reservation/delete/{id}',[ReservationController::class,'delete'])->name('admin#reservationDelete');
    // account
    Route::get('/editInfo',[AdminController::class,'editInfo'])->name('admin#editInfo');
    Route::post('/update',[AdminController::class,'update'])->name('admin#update');
    Route::get('/changePassword/page',[AdminController::class,'changePasswordPage'])->name('admin#changePasswordPage');
    Route::post('/changePassword/change',[AdminController::class,'changePassword'])->name('admin#changePassword');
});
// user
Route::redirect('/', '/user/home');
Route::group(['prefix'=>'user'],function(){
    // home
    Route::get('/home',[GeneralController::class,'homePage'])->name('user#home');
    // menu
    Route::get('/menu',[GeneralController::class,'menuPage'])->name('user#menu');
    Route::get('menu/category/filter/{id}',[GeneralController::class,'categoryFilter'])->name('user#categoryFilter');
    Route::get('menu/category/food/{id}',[GeneralController::class,'food'])->name('user#food');
    // new reservation
    Route::get('/reservationNew/step1',[UserReservationController::class,'step1Page'])->name('user#reservationNewStep1');
    Route::get('/reservationNew/step1/check',[UserReservationController::class,'checkBtn'])->name('user#reservationNewStep1Btn');
    // Route::get('/reservationNew/step2',UserReservationController:;)
    Route::post('/reservationNew/step2/book',[UserReservationController::class,'bookBtn'])->name('user#reservationNewStep2Btn');
});



require __DIR__.'/auth.php';

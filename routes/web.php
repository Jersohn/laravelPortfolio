<?php

// use App\Models\User;

use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MultiPicsController;
use App\Models\brand;
use App\Models\MultiPics;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserAcountController;
use App\Models\User;

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
    $brands = brand::all();
    $abouts = DB::table('abouts')->first();
    $portfolios = MultiPics::all();
    return view('home', compact('brands', 'abouts', 'portfolios'));
});
//category controller

Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.categories');
Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('addCategoryHandler');
Route::get('/category/edit/{id}', [CategoryController::class, 'EditCat']);
Route::post('/category/update/{id}', [CategoryController::class, 'UpdateCat']);
Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDeleteCat']);
Route::get('/category/restore/{id}', [CategoryController::class, 'RestoreCat']);
Route::get('/forceDelete/category/{id}', [CategoryController::class, 'ForceDeleteCat']);

//Brand controller 

Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'AddBrand'])->name('addBrandHandler');
Route::get('/brand/edit/{id}', [BrandController::class, 'EditBrand']);
Route::post('/brand/update/{id}', [BrandController::class, 'UpdateBrand']);
Route::get('/brand/delete/{id}', [BrandController::class, 'DeleteBrand']);

// Multi-pictures Controller

Route::get('/pictures/all', [MultiPicsController::class, 'AllPics'])->name('multipics');
Route::post('/pictures/add', [MultiPicsController::class, 'AddPics'])->name('addPicturesHandler');


// Slider 

Route::get('/slider/all', [HomeController::class, 'AllSliders'])->name('all.sliders');
Route::get('/slider/add', [HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/slider/store', [HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}', [HomeController::class, 'EditSlider']);
Route::post('/slider/update/{id}', [HomeController::class, 'UpdateSlider']);
Route::get('/slider/delete/{id}', [HomeController::class, 'DeleteSlider']);


//About

Route::get('/about/all', [HomeController::class, 'AllAbout'])->name('all.about');
Route::get('/about/add', [HomeController::class, 'AddAbout'])->name('add.about');
Route::post('/about/store', [HomeController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}', [HomeController::class, 'EditAbout']);
Route::post('/about/update/{id}', [HomeController::class, 'UpdateAbout']);

//Portofio

Route::get('/portfolio/all', [HomeController::class, 'AllPortfolio'])->name('portfolio');

// Contact
Route::get('/contact', [HomeController::class, 'ShowContactPage'])->name('contact');
Route::post('/message/send', [HomeController::class, 'SendMessage'])->name('send.message');
Route::get('/message/all', [HomeController::class, 'AllMessage'])->name('All.message');
Route::get('/delete/message/{id}', [HomeController::class, 'DeleteMessage']);


//manage Users

Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');
Route::get('/user/all', [BrandController::class, 'AllUsers'])->name('all.users');
Route::get('/user/delete/{id}', [BrandController::class, 'DeleteUser']);

//User Profile settings
Route::get('/user/setting', [UserAcountController::class, 'ChangePassword'])->name('user.setting');
Route::post('/user/password/update', [UserAcountController::class, 'UpdatePassword'])->name('password.update');
Route::get('/user/profile', [UserAcountController::class, 'ShowProfile'])->name('user.profile');
Route::post('/user/profile/update', [UserAcountController::class, 'UpdateProfile'])->name('user.updateProfile');


//middleware
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {



        return view('Admin.index');
    })->name('dashboard');
});
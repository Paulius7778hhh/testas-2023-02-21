<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend;
use App\Http\Controllers\Frontend;
use App\Http\Controllers\RestaurantController as RC;
use App\Http\Controllers\CityController as C;
use App\Http\Controllers\DishController as D;


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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/common', [Backend::class, 'common'])->name('common');

Route::prefix('backend/station')->name('backend-')->group(function () {
    Route::get('/index', [Backend::class, 'index'])->name('index')->middleware('roles:A');
    Route::get('/restaurant-list', [RC::class, 'index'])->name('rlist')->middleware('roles:A');
    Route::get('/create-restaurant', [RC::class, 'create'])->name('restaurant-create')->middleware('roles:A');
    Route::post('/add-restaurant', [RC::class, 'store'])->name('restaurant-add');
    Route::get('/edit-restaurant/{restaurant}', [RC::class, 'edit'])->name('edit-restaurant')->middleware('roles:A');
    Route::put('/update-restaurant/{restaurant}', [RC::class, 'update'])->name('update-restaurant')->middleware('roles:A');
    Route::delete('/delete-restaurant/{restaurant}', [RC::class, 'destroy'])->name('delete-restaurant')->middleware('roles:A');
    Route::get('/create-city', [C::class, 'create'])->name('city-create')->middleware('roles:A');
    Route::post('/add-city', [C::class, 'store'])->name('city-add')->middleware('roles:A');
    Route::get('/edit-city/{city}', [C::class, 'edit'])->name('edit-city')->middleware('roles:A');
    Route::put('/update-city/{city}', [C::class, 'update'])->name('update-city')->middleware('roles:A');
    Route::delete('/delete-city/{city}', [C::class, 'destroy'])->name('delete-city')->middleware('roles:A');
    Route::get('/create-dish', [D::class, 'create'])->name('dish-create')->middleware('roles:A');
    Route::post('/add-dish', [D::class, 'store'])->name('dish-add')->middleware('roles:A');
    Route::get('/dishlist{restaurant}', [D::class, 'show'])->name('restaurant-dish')->middleware('roles:A');
    Route::get('/edit-dish/{dish}', [D::class, 'edit'])->name('edit-dish')->middleware('roles:A');
    Route::put('/update-dish/{dish}', [D::class, 'update'])->name('update-dish')->middleware('roles:A');
    Route::delete('/delete-dish/{dish}', [D::class, 'destroy'])->name('delete-dish')->middleware('roles:A');
    // Route::post('/addtolist', [RC::class, 'store'])->name('addtolist');
    // Route::get('/add', [AC::class, 'create'])->name('create')->middleware('roles:A');
    // Route::post('/store', [AC::class, 'store'])->name('store')->middleware('roles:A');
    // Route::get('/addhotel', [AC::class, 'createhotel'])->name('createhotel')->middleware('roles:A');
    // Route::post('/storehotel', [AC::class, 'storehotel'])->name('storehotel')->middleware('roles:A');
    // Route::get('/countrylist', [AC::class, 'show'])->name('clist')->middleware('roles:A');
    // Route::get('/showhotel/{hotels}', [H::class, 'show'])->name('hotel')->middleware('roles:A');
    // Route::get('/download/{hotels}', [H::class, 'pdf'])->name('pdf')->middleware('roles:A');
    // Route::get('/hotellist', [AC::class, 'showhotel'])->name('hlist')->middleware('roles:A');
    // Route::get('/edit/{hotels}', [H::class, 'edit'])->name('edit');
    // Route::put('/update/{hotels}', [H::class, 'update'])->name('update')->middleware('roles:A');
    // Route::get('/editcountry/{country}', [C::class, 'edit'])->name('cedit')->middleware('roles:A');
    // Route::put('/updatecountry/{country}', [C::class, 'update'])->name('cupdate')->middleware('roles:A');
    // Route::delete('/delete/{hotels}', [H::class, 'destroy'])->name('hdelete')->middleware('roles:A');
    // Route::delete('/deletecountry/{country}', [C::class, 'destroy'])->name('cdelete')->middleware('roles:A');
});
Route::prefix('user/welcome')->name('frontend-')->group(function () {
    Route::get('/index', [Frontend::class, 'index'])->name('welcome')/*->middleware('roles:U')*/;
    Route::get('/restaurants-list', [Frontend::class, 'show'])->name('show')/*->middleware('roles:U')*/;
    Route::get('/restaurant-menu/{restaurant}', [Frontend::class, 'menu'])->name('restaurant-menu')/*->middleware('roles:U')*/;
    //Route::post('/submition{dish}', [D::class, 'submition'])->name('submition')->middleware('roles:U');
});

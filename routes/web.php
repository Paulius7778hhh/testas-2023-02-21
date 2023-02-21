<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend;
use App\Http\Controllers\Frontend;
use App\Http\Controllers\RestaurantController as RC;
use App\Http\Controllers\CityController as C;


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
    Route::get('/index', [Backend::class, 'index'])->name('index');
    Route::get('/restaurant-list', [RC::class, 'index'])->name('rlist');
    Route::get('/create-restaurant', [RC::class, 'create'])->name('restaurant-create');
    Route::post('/add-restaurant', [RC::class, 'store'])->name('restaurant-add');
    Route::get('/create-city', [C::class, 'create'])->name('city-create');
    Route::post('/add-city', [C::class, 'store'])->name('city-add');
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
    Route::get('/index', [Frontend::class, 'index'])->name('welcome');
});

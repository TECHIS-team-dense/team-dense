<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\HomeController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('items', ItemsController::class)
->middleware('auth');

Route::prefix('expired-items') //ソフトデリートのルーティング
    ->middleware('auth')->group(function(){
        Route::get('index', [ItemsController::class, 'expiredItemIndex'])->name('expired-items.index');
        Route::post('destroy/{item}', [ItemsController::class, 'expiredItemDestroy'])->name('expired-items.destroy');
});



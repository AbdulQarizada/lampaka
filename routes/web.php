<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\QamarCareCardController;
use App\Http\Controllers\EducationController;


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

Auth::routes();






Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');
Route::get('/index', [App\Http\Controllers\HomeController::class, 'root'])->name('index');



//  Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);

// Dashvoard
Route::get('/root', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

// Get District
Route::get('/GetDistricts/{data}', [App\Http\Controllers\HomeController::class, 'GetDistricts'])->name('GetDistricts');

//create lookups

// set cookies for layout
Route::get('/Layout/LayoutSidebar', [App\Http\Controllers\HomeController::class, 'LayoutSidebar'])->name('LayoutSidebar');
Route::get('/Layout/LayoutNoSidebar', [App\Http\Controllers\HomeController::class, 'LayoutNoSidebar'])->name('LayoutNoSidebar');

Route::get('/Projects', [App\Http\Controllers\HomeController::class, 'Projects'])->name('Projects');
Route::get('/BeneficiariesServices', [App\Http\Controllers\HomeController::class, 'BeneficiariesServices'])->name('BeneficiariesServices');


<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------

|--------------------------------------------------------------------------
 */

Auth::routes();

// index
Route::get('/Expenses', [App\Http\Controllers\Expenses\Homes\ExpensesController::class, 'Index'])->name('IndexExpenses');
Route::post('/Expenses/Create', [App\Http\Controllers\Expenses\Homes\ExpensesController::class, 'Store'])->name('CreateExpense');
Route::get('/Expenses/Kabul', [App\Http\Controllers\Expenses\Homes\ExpensesController::class, 'Kabul'])->name('Kabul');
Route::get('/Expenses/Laghman', [App\Http\Controllers\Expenses\Homes\ExpensesController::class, 'Laghman'])->name('Laghman');
Route::get('/Expenses/Canada', [App\Http\Controllers\Expenses\Homes\ExpensesController::class, 'Canada'])->name('Canada');
Route::get('/Expenses/Turkey', [App\Http\Controllers\Expenses\Homes\ExpensesController::class, 'Turkey'])->name('Turkey');

// delete
Route::get('/Expenses/Delete/{data}', [App\Http\Controllers\Expenses\Homes\ExpensesController::class, 'Delete'])->name('DeleteExpense');

//Details
Route::get('/Expenses/Details/{data}', [App\Http\Controllers\Expenses\Homes\ExpensesController::class, 'Details'])->name('DetailsExpense');

Route::post('/Expenses/BillUpload', [App\FileUpload\BillUpload::class, 'Bill_Upload'])->name('BillUploadExpense');

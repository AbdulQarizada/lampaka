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

// delete
Route::get('/Expenses/Delete/{data}', [App\Http\Controllers\Expenses\Homes\ExpensesController::class, 'Delete'])->name('DeleteExpense');

//Details
Route::get('/Expenses/Details/{data}', [App\Http\Controllers\Expenses\Homes\ExpensesController::class, 'Details'])->name('DetailsExpense');

//File Upload
Route::post('/Expenses/BillUpload', [App\FileUpload\BillUpload::class, 'Bill_Upload'])->name('BillUploadExpense');

//Search
Route::get('/Expenses/Search/{data}', [App\Http\Controllers\Expenses\Homes\ExpensesController::class, 'Search'])->name('SearchExpense');

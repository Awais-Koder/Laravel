<?php

use App\Http\Controllers\RegistrationForm;
use Illuminate\Support\Facades\Route;

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


Route::get('/',[RegistrationForm::class,'index']);
Route::POST('/update/user/{id}',[RegistrationForm::class,'update']);
Route::get('/delete/user/{id}',[RegistrationForm::class,'destroy'])->name('user.delete');
Route::get('/view/trash',[RegistrationForm::class,'showTrash'])->name('view.trash');
Route::get('/restore/record/{id}',[RegistrationForm::class,'restoreRecord'])->name('restore.record');
Route::get('/delete/record/{id}',[RegistrationForm::class,'deleteRecord'])->name('restore.record');
Route::resource('user', RegistrationForm::class);
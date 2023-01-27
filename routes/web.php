<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\MemberController::class, 'display'])->name('welcome');

Route::post('/newmember', [App\Http\Controllers\MemberController::class, 'create'])->name('newmember');
Route::get('/deletemember/{id}', [App\Http\Controllers\MemberController::class, 'delete'])->name('deletemember');

Route::get('/edit/{id}', [App\Http\Controllers\MemberController::class, 'edit'])->name('editmember');
Route::post('/update', [App\Http\Controllers\MemberController::class, 'update'])->name('update');


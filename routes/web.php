<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FullCalendarEventMasterController;
use App\Http\Controllers\AboutController; //กำหนดค่าการใช้งาน class
use App\Http\Controllers\MemberController; //กำหนดค่าการใช้งาน class
use App\Http\Controllers\AdminController; //กำหนดค่าการใช้งาน class
use App\Http\Controllers\BookController; //กำหนดค่าการใช้งาน class
use App\Http\Controllers\PostController; //กำหนดค่าการใช้งาน class
use App\Http\Controllers\ProductAddMoreController; //กำหนดค่าการใช้งาน class
use App\Http\Controllers\DashboardController; //กำหนดค่าการใช้งาน class
use App\Http\Controllers\RiskController; //กำหนดค่าการใช้งาน class
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
})->name('welcome');



Route::get('/dashboard/{id?}',[DashboardController::class,'index'])->name('dashboard.index');
Route::get('/dashboard1/{id?}',[DashboardController::class,'dashboard1'])->name('dashboard1.index');
Route::get('/dashboard2',[DashboardController::class,'dashboard2']);


Route::get('/risk/index/{id?}',[RiskController::class,'index'])->name('risk.index');
Route::get('/risk/get/{id1?}/{id2?}/{id3?}/{id4?}/{id5?}/{id6?}/{id7?}/{id8?}/{id9?}/{id10?}/{id11?}',[RiskController::class,'get_risk'])->name('risk.get');
Route::post('/risk/action',[RiskController::class,'create'])->name('risk.create');
Route::post('/risk/store', [RiskController::class, 'store'])->name('risk.store'); 

Route::get('/risk/export-excel',[RiskController::class,'exportRisktoExcel'])->name('risk.exportRisktoExcel');
Route::get('/risk/export-csv',[RiskController::class,'exportRisktoCSV'])->name('risk.exportRisktoCSV');



<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewUserNotification;
use App\Http\Controllers\Admin\ProductController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('export', 'ExportController@export')->name('export');
Route::get('pdf','ExportController@exportPdf')->name('exportPDF');
Route::get('csv','ExportController@exportCsv')->name('exportCSV');

Route::get('/send-mail', function () {
    Mail::to('emailUser@example.com')->send(new NewUserNotification()); 
    return 'A message has been sent to by phankieu!';
});


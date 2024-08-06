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
//pay
Route::get('payment/{status}', [App\Http\Controllers\OrderController::class,'thawaniCallBack']);

Route::resource('order', App\Http\Controllers\OrderController::class);
Route::resource('courses', App\Http\Controllers\CoursesController::class);

Route::get('/', function () {
    return view('welcome');
});

//Exels:
////export data in database to exeles file
Route::get('/exports/users', [App\Http\Controllers\ExeclController::class,'export']);
///import datat from exeles file to database
Route::view('excel-form', 'excel-form'); 
Route::post('/excel/import', [App\Http\Controllers\ExeclController::class,'import']);
//pdf
Route::get('/pdf', [App\Http\Controllers\PDFController::class,'viewPdf']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

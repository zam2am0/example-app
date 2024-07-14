<?php

use Illuminate\Support\Facades\Route; /**هذه لازم تكون موجودة */

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

Route::get('/', function () { /* '/' -> mean the main page */
    return view('welcome'); /*what mean? go to resourse folder then views then welcome */
});

Route::get('/services',function(){
    return "This is the service" ; /**هنا يطلع لي هذه العبارة مباشرة */
});

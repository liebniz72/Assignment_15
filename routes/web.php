<?php

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

Route::get('/',function () {
    return view('welcome');
});
Route::get('/register', 'RegistrationController@showRegistrationForm')->name('register');
Route::post('/register', 'RegistrationController@register');

Route::get('/home', function () {
    return redirect('/dashboard');
});

Route::middleware(['AuthMiddleware'])->group(function () {
    Route::get('/profile', 'ProfileController@show')->name('profile');
    Route::get('/settings', 'SettingsController@show')->name('settings');
});
Route::resource('products', 'ProductController');



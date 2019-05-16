<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// =================================== START BACK END ====================================================================
//login
Route::get('/admin', function () {return view('backend.login.login');})->name('backend.login.index');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

//dashboard basic
Route::get('backend.dashboard', 'DashboardController@index')->name('backend.dashboard');

//form basic
Route::get('backend.form.basic', 'FormController@index')->name('backend.form.basic');

//table basic
Route::get('backend.table.basic', 'TableController@index')->name('backend.table.basic');

//profile
Route::get('backend.profile', 'UserController@profile')->name('backend.profile');

// =================================== END BACK END ====================================================================




// =================================== START FRONT END ====================================================================
// =================================== END FRONT END ====================================================================

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

//Menu Slider
Route::get('slider.index', 'SliderController@index')->name('slider.index');
Route::post('admin/store-slider', 'SliderController@store')->name('slider.store');
Route::get('admin/delete-slider/{id}/{status}', 'SliderController@destroy')->name('slider.destroy');
Route::post('admin/edit-slider', 'SliderController@update')->name('slider.update');
Route::get('admin/publish-slider/{id}', 'SliderController@show')->name('slider.show');
Route::get('admin/bind-slider/{id}', 'SliderController@edit')->name('slider.edit');

//Menu galeri
Route::get('galeri.index', 'GaleriController@index')->name('galeri.index');
Route::post('admin/store-galeri', 'GaleriController@store')->name('galeri.store');
Route::get('admin/delete-galeri/{id}/{status}', 'GaleriController@destroy')->name('galeri.destroy');
Route::post('admin/edit-galeri', 'GaleriController@update')->name('galeri.update');
Route::get('admin/publish-galeri/{id}', 'GaleriController@show')->name('galeri.show');
Route::get('admin/bind-galeri/{id}', 'GaleriController@edit')->name('galeri.edit');

//Menu Video
Route::get('admin/kelola-video', 'VideoController@index')->name('video.index');
Route::post('admin/store-video', 'VideoController@store')->name('video.store');
Route::get('admin/delete-video/{id}/{status}', 'VideoController@destroy')->name('video.destroy');
Route::post('admin/edit-video', 'VideoController@update')->name('video.update');
Route::get('admin/publish-video/{id}', 'VideoController@show')->name('video.show');
Route::get('admin/bind-video/{id}', 'VideoController@edit')->name('video.edit');
Route::get('admin/edit-important-video/{id}', 'VideoController@editimportantvideo')->name('importantvideo.publish');


//profile
Route::get('backend.profile', 'UserController@profile')->name('backend.profile');

// =================================== END BACK END ====================================================================




// =================================== START FRONT END ====================================================================
// =================================== END FRONT END ====================================================================

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
Route::get('video.index', 'VideoController@index')->name('video.index');
Route::post('admin/store-video', 'VideoController@store')->name('video.store');
Route::get('admin/delete-video/{id}/{status}', 'VideoController@destroy')->name('video.destroy');
Route::post('admin/edit-video', 'VideoController@update')->name('video.update');
Route::get('admin/publish-video/{id}', 'VideoController@show')->name('video.show');
Route::get('admin/bind-video/{id}', 'VideoController@edit')->name('video.edit');
Route::get('admin/edit-important-video/{id}', 'VideoController@editimportantvideo')->name('importantvideo.publish');

//Menu Sponsor
Route::get('sponsor.index', 'SponsorController@index')->name('sponsor.index');
Route::post('admin/store-sponsor', 'SponsorController@store')->name('sponsor.store');
Route::get('admin/delete-sponsor/{id}/{status}', 'SponsorController@destroy')->name('sponsor.destroy');
Route::post('admin/edit-sponsor', 'SponsorController@update')->name('sponsor.update');
Route::get('admin/publish-sponsor/{id}', 'SponsorController@show')->name('sponsor.show');
Route::get('admin/bind-sponsor/{id}', 'SponsorController@edit')->name('sponsor.edit');

//Menu Medsos
Route::get('medsos.index', 'MedsosController@index')->name('medsos.index');
Route::post('admin/store-medsos', 'MedsosController@store')->name('medsos.store');
Route::get('admin/delete-medsos/{id}/{status}', 'MedsosController@destroy')->name('medsos.destroy');
Route::post('admin/edit-medsos', 'MedsosController@update')->name('medsos.update');
Route::get('admin/bind-medsos/{id}', 'MedsosController@edit')->name('medsos.edit');

//Menu Kategori
Route::get('kategori.index/{status}', 'KategoriController@index')->name('kategori.index');
Route::post('admin/store-kategori', 'KategoriController@store')->name('kategori.store');
Route::get('admin/delete-kategori/{id}/{status}/{flag}', 'KategoriController@destroy')->name('kategori.destroy');
Route::post('admin/edit-kategori', 'KategoriController@update')->name('kategori.update');
Route::get('admin/bind-kategori/{id}', 'KategoriController@edit')->name('kategori.edit');

//log Apps activity
Route::get('log.activity', 'LogActivitiesController@index')->name('log.activity');
Route::get('datatables-log-activity', ['as'=>'datatables.log.activity', 'uses'=>'LogActivitiesController@getDataForDataTable']);

//log Apps files
Route::get('log.files', 'LogFilesController@index')->name('log.files');
Route::get('log.files.show/{filename}', 'LogFilesController@show')->name('log.files.show');
Route::get('log.files.download/{filename}', 'LogFilesController@download')->name('log.files.download');


//profile
Route::get('backend.profile', 'UserController@profile')->name('backend.profile');

// =================================== END BACK END ====================================================================




// =================================== START FRONT END ====================================================================
// =================================== END FRONT END ====================================================================

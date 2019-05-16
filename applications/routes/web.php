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

// Route::group(['middleware' => ['IsAdmin']], function () {

    //dashboard basic
    Route::get('backend.dashboard', 'DashboardController@index')->name('backend.dashboard');

    //Menu Slider
    Route::get('slider.index', 'SliderController@index')->name('slider.index');
    Route::post('admin/store-slider', 'SliderController@store')->name('slider.store');
    Route::get('admin/delete-slider/{id}/{status}', 'SliderController@destroy')->name('slider.destroy');
    Route::post('admin/edit-slider', 'SliderController@update')->name('slider.update');
    Route::get('admin/publish-slider/{id}', 'SliderController@show')->name('slider.show');
    Route::get('admin/bind-slider/{id}', 'SliderController@edit')->name('slider.edit');
// });


//form basic
Route::get('backend.form.basic', 'FormController@index')->name('backend.form.basic');

//table basic
Route::get('backend.table.basic', 'TableController@index')->name('backend.table.basic');

//profile
Route::get('backend.profile', 'UserController@profile')->name('backend.profile');

// =================================== END BACK END ====================================================================




// =================================== START FRONT END ====================================================================
// =================================== END FRONT END ====================================================================

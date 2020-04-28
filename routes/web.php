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

Auth::routes(['verify' => true]);

Route::get('/', 'IndexController@index')->name('index');

/*
 *--------------------------------------------------------------------------
 *  1: Clients Routes
 * --------------------------------------------------------------------------
 */

 Route::resource('clients', 'ClientController');

 /*
 *--------------------------------------------------------------------------
 *  2: Admin Routes
 * --------------------------------------------------------------------------
 */

Route::get('/admin-dashboard', 'AdminController@index')->name('adminDashboard');


Route::get('/admins', 'AdminController@viewAll')->name('viewAdmins');
Route::get('/admins/{id}', 'AdminController@show')->name('showAdmin');

Route::get('/admin/create', 'AdminController@create')->name('createAdmin');
Route::post('/admin/store', 'AdminController@store')->name('storeAdmin');

Route::get('/admin/edit/{id}', 'AdminController@edit')->name('editAdmin');
Route::put('/admin/update/{id}', 'AdminController@update')->name('updateAdmin');

Route::get('/admin/delete/{id}', 'AdminController@destroy')->name('deleteAdmin');

/*
 *--------------------------------------------------------------------------
 *  3: Insiders Routes
 * --------------------------------------------------------------------------
 */

Route::resource('insiders', 'InsiderController');


 /*
 *--------------------------------------------------------------------------
 *  4: Projects Routes
 * --------------------------------------------------------------------------
 */

Route::resource('projects', 'ProjectController');



Route::get('update-data/{token}', 'InsiderDataController@editInfo')
->name('updateInsiderInfo');

Route::put('/insdier/update-info/{token}','InsiderDataController@updateInfo')->name('insiderUpdateInfo');

// Route::get('update-data/{clientId}/{insiderId}/{token}', function () {
//     return "we got this..kill him!!";
// })->name('updateInsiderInfo');

Route::get('/insdier/show-info/{token}', 'InsiderDataController@showInfo')
->name('showInsiderInfo');

Route::post('/set-app-locale', 'AppLanguageController@setAppLocale')->name('setAppLocale');




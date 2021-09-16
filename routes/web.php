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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    return redirect('/');
})->middleware(['auth'])->name('redirectFromDashboard');

Route::middleware('admin')->group(function () {
    Route::get('/control-panel', 'App\Http\Controllers\AdminController@create')->name('controlPanel');
});

Route::middleware('auth')->group(function () {
    Route::get('/difficulty','App\Http\Controllers\GameController@chooseDifficulty')->name('chooseDifficulty');
    Route::get('/category','App\Http\Controllers\GameController@chooseCategory')->name('chooseCategory');
    Route::get('/game','App\Http\Controllers\GameController@startGame')->name('game');

    Route::get('/statistics/{id}','App\Http\Controllers\UserController@statistics')->name('userStatistics');
    Route::get('/categories/{id}','App\Http\Controllers\CategoryController@create')->name('userCategories');
    Route::get('/categories/new','App\Http\Controllers\CategoryController@add')->name('createCategory');
    Route::get('/categories/edit/{id}','App\Http\Controllers\CategoryController@edit')->name('editCategory');

    Route::get('/settings','App\Http\Controllers\UserController@settings')->name('settings');

    Route::get('/settings/changeUsername','App\Http\Controllers\SettingsController@createChangeUsername')->name('changeUsernameView');
    Route::post('/settings/changeUsername','App\Http\Controllers\SettingsController@changeUsername')->name('changeUsername');

    Route::get('/settings/changePassword','App\Http\Controllers\SettingsController@createChangePassword')->name('changePasswordView');
    Route::post('/settings/changePassword','App\Http\Controllers\SettingsController@changePassword')->name('changePassword');

    Route::get('/settings/reset','App\Http\Controllers\SettingsController@createReset')->name('resetView');
    Route::post('/settings/reset','App\Http\Controllers\SettingsController@reset')->name('reset');

    Route::get('/settings/delete','App\Http\Controllers\SettingsController@createDelete')->name('deleteUserView');
    Route::post('/settings/delete','App\Http\Controllers\SettingsController@delete')->name('deleteUser');

    Route::get('/settings/information','App\Http\Controllers\Controller@createInformation')->name('information');
});
Route::get('/ranking','App\Http\Controllers\UserController@ranking')->name('ranking');



require __DIR__.'/auth.php';

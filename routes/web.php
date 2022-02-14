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

Auth::routes(['register' => false, 'reset' => false]);
Route::get('/', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('language/{locale}', 'HomeController@language')->name('language');

Route::middleware(['auth','csrf','role'])->group(function () {
    
    // Admin
    Route::group(['role' => ['ADMIN','EMPLOYEE'] ], function ()
    {
        Route::namespace('Dashboard\Admin')->prefix('admins')->name('admins.')->group(function()
        {
            Route::resource('dashboard','DashboardController');
            Route::resource('players','PlayerController');
            Route::resource('trainers','TrainerController');
            Route::resource('matches','MatchController');
            Route::resource('exercises','ExerciseController');
            Route::resource('times','TimeController');
            Route::resource('positions','PositionController');
            Route::resource('age-brackets','AgeBracketController');
            
        });

    });

});

Route::get('cron/early-call', 'CronNotifyController@fire_early_call')->name('cron.early-call');
Route::get('cron/fire-expiration-notif-call', 'CronNotifyController@fire_expiration_notif_call')->name('cron.fire-expiration-notif-call');

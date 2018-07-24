<?php


use App\User;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/view_fa', 'PagesController@viewAdvisor');

Route::get('/view_clients', 'PagesController@viewClients');

Route::get('/view_leads', 'PagesController@viewLeads');

Route::post('/send', 'EmailController@send');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('advisors', 'PagesController@adminIndex')->name('admin.adminIndex');
});

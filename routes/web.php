<?php


use App\User;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// admin routes
Route::get('/home_admin', 'HomeController@index_admin')->name('home_admin');

Route::get('/view_fa', 'PagesController@viewAdvisor');

Route::get('/view_clients', 'PagesController@viewClients');

Route::get('/view_leads', 'PagesController@viewLeads');

// advisor routes
Route::get('/home_advisor', 'HomeController@index_advisor')->name('home_advisor');

// mixed routes
Route::get('/login_redirect', 'LoginController@redirectLoginPath');

Route::post('/send', 'EmailController@send');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('advisors', 'PagesController@adminIndex')->name('admin.adminIndex');
});

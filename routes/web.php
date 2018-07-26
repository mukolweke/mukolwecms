<?php


use App\User;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// admin routes
//Route::get('/home_admin', 'HomeController@index_admin');index_admin

Route::get('/view_fa', 'PagesController@viewAdvisor');

Route::get('/view_clients', 'PagesController@viewClients');

Route::get('/view_leads', 'PagesController@viewLeads');

// advisor routes
Route::get('/home_advisor', 'HomeController@index_advisor')->name('home_advisor');

Route::get('view_client', 'Api\V1\ClientController@index');

Route::get('/view_schedule_index', 'FollowUpController@index')->name('view_schedule_index');

Route::post('/addSchedule', 'FollowUpController@addSchedule')->name('addSchedule');

// mixed routes
Route::get('/login_redirect', 'AdminLoginController@redirectLoginPath');

Route::post('/send', 'EmailController@send');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('advisors', 'PagesController@adminIndex')->name('admin.adminIndex');
});


// login routes
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('login_form');

Route::post('home_admin', 'Auth\AdminLoginController@login')->name('home_admin');

Route::get('/home_admin_dash', 'PagesController@adminDash');

Route::get('advisor/login', 'Auth\AdvisorLoginController@showLoginForm');

Route::post('home_advisor', 'Auth\AdvisorLoginController@login')->name('home_advisor');

Route::get('client/login', 'Auth\ClientLoginController@showLoginForm');

Route::post('client/login', 'Auth\ClientLoginController@login');


Route::group(['prefix' => 'admin','middleware' => 'assign.guard:admin,/home_admin'],function(){

    Route::get('/home_admin',function ()
    {
        return view('admin.home_admin');
    });
});

Route::group(['prefix' => 'advisor','middleware' => 'assign.guard:advisor,advisor/login'],function(){
    Route::get('home_advisor',function ()
    {
        return view('advisor.home_advisor');
    });
});


Route::group(['prefix' => 'client','middleware' => 'assign.guard:client,client/login'],function(){
    Route::get('home_client',function ()
    {
        return view('home_client');
    });
});

//Route::get('/home', 'HomeController@index')->name('home');
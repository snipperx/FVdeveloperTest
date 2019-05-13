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


Route::get('/', function () {
    return view('auth/login');
});

Route::get('admin', function () {
    return view('admin_template');
});

Auth::routes(['register' => false,
    'reset' => false,
    'verify' => false,]);

if (!env('ALLOW_REGISTRATION', false)) {
    Route::any('/register', function (){
        abort(403);
    });
}

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/list_compnies', 'CompaniesController@index');
Route::get('viewassets/{company}/list', 'CompaniesController@companyProfile');
Route::get('/create_company', 'CompaniesController@createCompony');
Route::post('/contacts/company', 'CompaniesController@addCompony');
Route::get('contacts/company/{company}/view', 'CompaniesController@showCompany');
Route::get('contactcampony/{company}/edit', 'CompaniesController@editcampony');
Route::patch('contacts/company/{company}/edit', 'CompaniesController@editComponydetails');

//assets
Route::get('/list_assets', 'AssetsController@index');
Route::get('/create_asset', 'AssetsController@createAsset');
Route::post('/contacts/assets', 'AssetsController@addAsset');
Route::get('contacts/assets/{assets}/view', 'AssetsController@showAsset');
Route::get('viewcampony/{assets}/asset', 'AssetsController@showcampony');

Route::get('mail/send', 'MailController@send');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\testController;
use App\Http\Controllers\forgetController;

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

Route::get('/', 'forgetController@login');
Route::get('forgot/{remail}', 'forgetController@forgot')->name('forgot');
Route::post('send_reset_email', 'forgetController@send_reset_email')->name('send_reset_email');
Route::post('reset/{remail}', 'forgetController@reset')->name('reset');

Route::group(['middleware'=>['checkAuth']], function(){
//Inside
//Route::get('home', 'testController@home')->name('home');

});




/*****************ADMIN ROUTES*******************/
Route::Group(['prefix' => 'admin'], function () { 
    
	    Route::get('/index_admin','adminController@index_admin')->name('index_admin');
	    Route::get('/logout','adminController@logout')->name('admin/logout');

       
        Route::get('/agenciesA', 'adminController@agencies')->name('agenciesA');
        Route::get('/agencies_edit-{id}', 'adminController@agencies_edit')->name('agencies_edit');
        Route::post('/update_agencies', 'adminController@update_agencies')->name('update_agencies');
        Route::get('/delete_agencies/{id}', 'adminController@delete_agencies')->name('delete_agencies');

        Route::get('/contractsA', 'adminController@contracts')->name('contractsA');
        Route::get('/contracts_edit-{id}', 'adminController@contracts_edit')->name('contracts_edit');
        Route::post('/update_contracts', 'adminController@update_contracts')->name('update_contracts');
        Route::get('/delete_contracts/{id}', 'adminController@delete_contracts')->name('delete_contracts');


        Route::get('/equipmentsA', 'adminController@eqps')->name('equipmentsA');
         Route::get('/create-eqp', 'adminController@create_eqps')->name('create-eqps');
         Route::post('/add_eqp', 'adminController@create_eqp')->name('add_jobs');
         Route::post('/update_eqp', 'adminController@update_eqp')->name('update_jobs');
         Route::get('/delete_eqp/{id}', 'adminController@delete_eqp')->name('delete_jobs');
         Route::get('/eqp_edit-{id}-{id_asn}', 'adminController@eqp_edit')->name('job_edit');
         

        
        Route::post('/adminLogin', 'adminController@adminLogin')->name('adminLogin');
        Route::get('/reviews', function () {
        return view('admin.reviews');
        })->name('reviews');

        Route::get('forgot/{remail}', 'adminController@forgot')->name('forgot');
        Route::post('send_reset_email', 'adminController@send_reset_email')->name('send_reset_email');
        Route::post('reset/{remail}', 'adminController@reset')->name('reset');

      
        Route::get('/login', function () {
        return view('admin.login');
        })->name('login');
       
    });


Route::get('clear_cache', function () {
    \Artisan::call('config:cache');
    \Artisan::call('view:clear');
    \Artisan::call('route:clear');
    dd("Cache is cleared");
});


//Route::get('{anypath}', 'testController@home')->where('path', '.*');
//AUTH
Auth::routes();

Route::get('home', 'HomeController@home');//->name('home');
Route::get('equipments', 'HomeController@equipments')->name('equipments'); 
Route::get('contract', 'HomeController@contracts')->name('contract');
Route::get('breakdown', 'HomeController@breakdown')->name('breakdown');
Route::get('about', 'HomeController@about')->name('about');

Route::post('contract', 'HomeController@contract')->name('contract');




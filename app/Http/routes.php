<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Benefactor;
use App\User;

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('/AdminPanel','AdminController@index');
Route::get('/AllRQ','AdminController@RQ');
Route::get('/addUserPage','AdminController@addUserPage');

Route::resource('/deleteUser','AdminController@deleteUser');
Route::resource('/editUser','AdminController@editUser');
Route::resource('/editRequest','AdminController@editRequest');
Route::resource('/addUser','AdminController@addUser');
/*Route::get('/', function (){
    return view('welcome');
});*/
/*Route::get('/benefactor/dashboard','BenefactorController@dashboard');
Route::get('/charity/dashboard','CharityController@dashboard');*/

Route::get('/dashboard',function (){
    $userType = Auth::user();
    if(!Auth::guest()){
        if($userType -> isBenefactor()){
            return redirect('/benefactor/dashboard');
        }
        if($userType -> isCharity()){
            //Route::get('/dashboard','CharityController@dashboard');
            return redirect('/charity/dashboard');
        }
    }
    else{
        return redirect('login');
    }
});

//route to charity user dashboard
Route::get('/charity/dashboard','CharityController@dashboard');
//route to benefactor user dashboard
Route::get('/benefactor/dashboard','BenefactorController@dashboard');

Route::get('/registerPart2',function (){
    $active = Auth::user()->active;
    $userType = Auth::user();
    if($active == '0'){
        if($userType -> isBenefactor()){
            return view('benefactorRegistration');
        }
        if($userType -> isCharity()){
            return view('charityRegistration');
        }
    }
   return redirect('home');
});
Route::get('/benefactors','CharityController@index');
Route::get('/charities','BenefactorController@index');
Route::get('/benefactors/profile/{id}','CharityController@profile');
Route::get('/charities/profile/{id}','BenefactorController@profile');
Route::resource('/charityToBenefactor','CharityController@collaborationRequest');
Route::resource('/benefactorToCharity','BenefactorController@collaborationRequest');
Route::resource('registerPart2/benefactorFinalRegistration','BenefactorController@register');
Route::resource('registerPart2/charityFinalRegistration','CharityController@register');
Route::resource('/benefactor/requestFunction','BenefactorController@requestFunction');
Route::resource('/charity/requestFunction','CharityController@requestFunction');
Route::resource('/chfilter','BenefactorController@filter');
Route::resource('/benfilter','CharityController@filter');
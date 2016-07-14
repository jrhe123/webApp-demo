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
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::get('/home', 'HomeController@index');


/*facebook routes*/
Route::get('auth/facebook', 'FacebookController@redirectToProvider')->name('facebook.login');
Route::get('auth/facebook/callback', 'FacebookController@handleProviderCallback');



/*user login*/
Route::any('login', 'Admin\LoginController@login');
/*user register*/
Route::any('register', 'Admin\LoginController@register');
/*reset password*/
Route::any('password/reset_pass', 'Admin\LoginController@reset_pass');

/*sending email*/
Route::get('email', function(){

    Mail::send('emails.test',['name'=>'roy'],function($message){
        $message->to('jiaronghe1213@gmail.com','some guy')->subject('email demo');
    });

    $errors = 'Congratulation, register successfully. The confirmation email has been sent to my personal account';
    return redirect('register')->with('errors',$errors);
});



/*admin page*/
Route::any('admin', 'Admin\IndexController@index');
/*admin logout*/
Route::get('logout', 'Admin\IndexController@logout');
/*admin invite patient*/
Route::get('invite', 'Admin\IndexController@invite');
/*admin patient info detail*/
Route::get('/info/{patient_id}','Admin\IndexController@info');












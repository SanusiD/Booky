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
    return view('welcome');
});


// Route::get('/sparkpost', function () {
//   Mail::send('emails.email', [], function ($message) {
//     $message
//       ->to('olawale.san@gmail.com', 'Receiver Name')
//       ->subject('From SparkPost with ❤');
//   });
// });

Auth::routes();

Route::get('/edit_customer', 'EditCustomerController@index')->middleware('auth');
// Route::get('/edit_customer/new', 'EditCustomerController@create');
// Route::get('/edit_customer/new', 'EditCustomerController@store');
Route::get('/edit_customer/{id}', 'EditCustomerController@show')->middleware('auth');
Route::put('/edit_customer/{id}', 'EditCustomerController@update')->middleware('auth');

Route::get('/notes', 'NoteController@index')->middleware('auth');

Route::get('/notes/new', 'NoteController@create')->middleware('auth');
Route::post('/notes/new', 'NoteController@store')->middleware('auth');

Route::get('/notes/{id}', 'NoteController@show')->middleware('auth');
Route::put('/notes/{id}', 'NoteController@update')->middleware('auth');



Route::get('/todo', 'TodoController@index')->middleware('auth');
Route::get('/todo/new', 'TodoController@create')->middleware('auth');
Route::post('/todo/new', 'TodoController@store')->middleware('auth');

Route::get('/todo/{id}', 'TodoController@show')->middleware('auth');
Route::post('/todo/{todo}/tasks', 'TaskController@store')->middleware('auth');


Route::get('/events', 'EventController@calender')->middleware('auth');
Route::get('/events/new', 'EventController@create')->middleware('auth');
Route::post('/events/new', 'EventController@store')->middleware('auth');

Route::get('/events/{id}', 'EventController@show')->middleware('auth');
Route::put('/events/{id}', 'EventController@update')->middleware('auth');


Route::get('/account/profile', 'UserController@index')->middleware('auth');
Route::put('/account/profile', 'UserController@update')->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );




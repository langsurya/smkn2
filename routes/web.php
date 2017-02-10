<?php
// use App\Task;
use Illuminate\Http\Request;

Route::get('/', function(){
  return view('home');
});
// Route::get('/','siswaController@index');
// Route::resource('siswa','siswaController');
Route::resource('siswa','siswaController');

Auth::routes();

Route::get('/home', 'HomeController@index');

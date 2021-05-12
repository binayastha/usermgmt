<?php

Route::get('/login', 'AuthController@index')->name('login');
//Route::post('login','LoginController@login')->name('post.login');

Route::get('/after/verify','ChangePasswordController@afterverify')->name('afterverify');
Route::post('/after/verify','ChangePasswordController@afterverifychangepassword')->name('afterverifychangepassword');

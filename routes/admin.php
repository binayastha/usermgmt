<?php

Route::group([
    'namespace'=>'Backend',
    'as'    => 'admin.',
], function (){
        Route::get('/','AdminController@index')->name('dashboard');


    Route::group(
        [
            'namespace' =>  'User',
        ],function (){
        Route::resource('user', 'UserController');
        Route::group(
            [
                'prefix' => 'user/{user}',
                'as'        =>  'user.password.',
            ],function(){
            Route::get('pasword/change','UserPasswordController@edit')->name('edit');
            Route::post('pasword/change','UserPasswordController@update')->name('update');
        });
    });
    Route::group(
        [
            'namespace' =>  'Role',
        ],function (){
        Route::resource('roles', 'RoleController');

    });

});

<?php

Route::apiResource('/class','ClassesController');

Route::apiResource('/subject','SubjectController');

Route::apiResource('/student','StudentController');





Route::group([

    
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');
    Route::post('register', 'AuthController@register');


    


});






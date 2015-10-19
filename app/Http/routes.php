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

Route::get('/', [

    'uses'=>'HomeController@index',
    'as' => 'home'

]);

// Authentication routes...
Route::get('login', [
    'uses'=>'Auth\AuthController@getLogin',
     'as' => 'login'
]);
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', [
    'uses'=>'Auth\AuthController@getLogout',
    'as'  =>'logout'
]);

// Registration routes...
Route::get('register', [
    'uses'=>'Auth\AuthController@getRegister',
    'as' => 'register'
]);
Route::post('register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('/acercaDe',[
        'uses'=>'HomeController@acercaDe',
        'as'  => 'acercaDe'
    ]
);
Route::get('/JuanMartinez',[
        'uses'=>'HomeController@JuanMartinez',
        'as'  => 'JuanMartinez'
    ]
);

Route::get('/JuanMantilla',[
        'uses'=>'HomeController@JuanMantilla',
        'as'  => 'JuanMantilla'
    ]
);
Route::get('/EdwinPuertas',[
        'uses'=>'HomeController@EdwinPuertas',
        'as'  => 'EdwinPuertas'
    ]
);
Route::get('/view-Panel-de-administrador',[
    'uses'=>'panelDeAdministradorController@index',
    'as'  => 'panelDeAdministrador'
]
);

Route::get('panelDeUsuario',[
        'uses'=>'panelDeUsuarioController@index',
        'as'  => 'panelDeUsuario'
    ]
);

Route::get('/view-Panel-de-administrador/agregarEquipo',[
        'uses'=>'agregarEquipoController@index',
        'as'  => 'viewAgregarEquipo'
    ]
);

Route::get('/view-Panel-de-administrador/agregarSalon',[
        'uses'=>'agregarSalonController@index',
        'as'  => 'viewAgregarSalon'
    ]
);

Route::get('/view-Panel-de-administrador/eliminarSalon',[
        'uses'=>'eliminarSalonController@index',
        'as'  => 'viewEliminarSalon'
    ]
);

Route::get('/view-Panel-de-administrador/eliminarEquipo',[
        'uses'=>'eliminarEquipoController@index',
        'as'  => 'viewEliminarEquipo'
    ]
);

Route::get('/view-Panel-de-administrador/agregarEquipo',[
        'uses'=>'agregarEquipoController@index',
        'as'  => 'viewAgregarEquipo'
    ]
);


Route::get('/view-Panel-de-administrador/obtenerInformacion',[
        'uses'=>'viewObtenerInformacion@index',
        'as'  => 'obtenerInformacion'
    ]
);

Route::get('/view-Panel-de-administrador/actualizarRecurso',[
        'uses'=>'actualizarRecursoController@index',
        'as'  => 'actualizarRecurso'
    ]
);
Route::post('/view-Panel-de-administrador/actualizarRecurso', 'actualizarRecursoController@update');

//Route::resource('/view-Panel-de-administrador/actualizarRecurso', 'actualizarRecursoController');

Route::post('/view-Panel-de-administrador/equipoActualizado',[
        'uses'=>'equipoActualizadoController@update',
        'as'  => 'equipoActualizado'
    ]
);

Route::post('/view-Panel-de-administrador/salonActualizado',[
        'uses'=>'salonActualizadoController@update',
        'as'  => 'salonActualizado'
    ]
);

Route::get('/reservarEquipo',[
        'uses'=>'reservarEquipoController@index',
        'as'  => 'reservarEquipo'
    ]
);
Route::post('/reservarEquipo',[
        'uses'=>'reservarEquipoController@store',
        'as'  => 'reservarEquipo'
    ]
);

Route::get('/cancelarReserva',[
        'uses'=>'cancelarReservaController@index',
        'as'  => 'cancelarReserva'
    ]
);

Route::post('/cancelarReserva',[
        'uses'=>'cancelarReservaController@update',
        'as'  => 'cancelarReserva'
    ]
);
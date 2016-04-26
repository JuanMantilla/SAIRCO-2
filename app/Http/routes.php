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
Route::get('/home', [

    'uses'=>'HomeController@index',
    'as' => 'home'

]);
Route::get('/', [

    'uses'=>'HomeController@index',
    'as' => 'home'

]);

// Authentication routes...
Route::get('login', [
    'uses'=>'Auth\AuthController@getLogin',
    'as' => 'login'
]);
Route::post('login', 'Auth\AuthController@authenticate');

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
Route::get('/Panel_de_administrador',[
        'uses'=>'panelDeAdministradorController@index',
        'as'  => 'panelDeAdministrador'
    ]
);

Route::get('panelDeUsuario',[
        'uses'=>'panelDeUsuarioController@index',
        'as'  => 'panelDeUsuario'
    ]
);

Route::get('/agregarEquipo',[
        'uses'=>'agregarEquipoController@index',
        'as'  => 'viewAgregarEquipo'
    ]
);

Route::get('/agregarSalon',[
        'uses'=>'agregarSalonController@index',
        'as'  => 'viewAgregarSalon'
    ]
);

Route::get('/eliminarSalon',[
        'uses'=>'eliminarSalonController@index',
        'as'  => 'viewEliminarSalon'
    ]
);

Route::get('/eliminarEquipo',[
        'uses'=>'eliminarEquipoController@index',
        'as'  => 'viewEliminarEquipo'
    ]
);

Route::get('/agregarEquipo',[
        'uses'=>'agregarEquipoController@index',
        'as'  => 'viewAgregarEquipo'
    ]
);


Route::get('/obtenerInformacion',[
        'uses'=>'viewObtenerInformacion@index',
        'as'  => 'obtenerInformacion'
    ]
);

Route::get('/actualizarRecurso',[
        'uses'=>'actualizarRecursoController@index',
        'as'  => 'actualizarRecurso'
    ]
);
Route::post('/actualizarRecurso', 'actualizarRecursoController@update');

//Route::resource('/view-Panel-de-administrador/actualizarRecurso', 'actualizarRecursoController');

Route::post('/equipoActualizado',[
        'uses'=>'equipoActualizadoController@update',
        'as'  => 'equipoActualizado'
    ]
);

Route::post('/salonActualizado',[
        'uses'=>'salonActualizadoController@update',
        'as'  => 'salonActualizado'
    ]
);

Route::get('/verReservas',[
        'uses'=>'Auth\verReservasController@index',
        'as'  => 'verReservas'
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


Route::get('/agregarAdministradores',[
    'uses'=>'agregarAdministradoresController@index',
    'as'  => 'agregarAdministradores'
]
);

Route::post('/agregarAdministradores',[
        'uses'=>'agregarAdministradoresController@store',
        'as'  => 'agregarAdministradores'
    ]
);
<?php

return [

    'multi' => [
        #'admin' => [
        #    'driver' => 'eloquent',
        #    'model' => 'App\Admin',
        #],
        'motorista' => [
            'driver' => 'eloquent',
            'model' => Multitest\Entities\Motorista::class,
        ],
        'cliente' => [
            'driver' => 'eloquent',
            'model' => Multitest\Entities\Cliente::class,
            #'driver' => 'database',
            #'table' => 'clientes',
        ],
    ],

    /*'driver' => 'eloquent',
    'model' => Multitest\Entities\Cliente::class,
    'table' => 'clientes',*/

    'password' => [
        'email'  => 'emails.password',
        'table'  => 'password_resets',
        'expire' => 60,
    ],

];

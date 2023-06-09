<?php

return [
    'title' => [
        'index' => 'Listado de usuarios', //Vista index
        'trash' => 'Papelera de usuarios', //Vista papelera
    ],

    'roles' => ['admin' => 'Admin', 'user' => 'Usuario'],
    'states' => ['active' => 'Activo', 'inactive' => 'Inactivo'],

    'filters' => [
        'roles' => ['all' => 'Rol', 'admin' => 'Administradores', 'user' => 'Usuarios'],
        'states' => ['all' => 'Todos', 'active' => 'Solo activos', 'inactive' => 'Solo inactivos'],
    ]
];

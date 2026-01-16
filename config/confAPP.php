<?php

/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 15/12/2025
*   Uso:  requires de todos los archivos del modelo necesitado*/ 
//incluyo la libreria de validacion
require_once 'core/231018libreriaValidacion.php';

//aqui se incluyen todos los archivos del modelo
require_once 'model/UsuarioPDO.php';
require_once 'model/DBPDO.php';
require_once 'model/Usuario.php';
require_once 'model/AppError.php';

//array para cargar los archivos del controlador
$controller=[
    'inicioPublico' => 'controller/cInicioPublico.php',
    'login' => 'controller/clogin.php',
    'inicioPrivado'=>'controller/cInicioPrivado.php',
    'detalle'=>'controller/cDetalle.php',
    'registro'=>'controller/cRegistro.php',
    'error'=>'controller/cError.php',
    'WIP'=>'controller/cWIP.php'
];

//array para cargar los archivos de la vista
$view=[
    'layout' => 'view/Layout.php',
    'inicioPublico' => 'view/vInicioPublico.php',
    'login'=>'view/vlogin.php',
    'inicioPrivado'=>'view/vInicioPrivado.php',
    'detalle'=>'view/vDetalle.php',
    'registro'=>'view/vRegistro.php',
    'error'=>'view/vError.php',
    'WIP'=>'view/vWIP.php'
];
?>
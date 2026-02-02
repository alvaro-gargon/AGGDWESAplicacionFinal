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
require_once 'model/REST.php';
require_once 'model/FotoNasa.php';
require_once 'model/Departamento.php';
require_once 'model/DepartamentoPDO.php';

//definimos la respuesta de la pregunta de seguridad
define('SEGURIDAD','pimentel');

//Declaramos ambos array de funcionalidades para los diferentes perfiles. 
//El perfil administrador tendrá todas las funcionalidades del usuario normal, y algunas extra

//array para el usuario normal (el valor de cada index sera el usado para el atributo del boton "name")
$aFuncionalidadUsuario=[
    'rest'=>'REST',
    'departamentos'=>'DEPARTAMENTOS',
    'detalle'=>'DETALLE'
];
//array para el usuario administrador
$aFuncionalidadAdmin=[
    'rest'=>'REST',
    'departamentos'=>'DEPARTAMENTOS',
    'detalle'=>'DETALLE',
    'usuarios'=>'USUARIOS'
];

//array para cargar los archivos del controlador
$controller=[
    'inicioPublico' => 'controller/cInicioPublico.php',
    'login' => 'controller/clogin.php',
    'inicioPrivado'=>'controller/cInicioPrivado.php',
    'detalle'=>'controller/cDetalle.php',
    'registro'=>'controller/cRegistro.php',
    'error'=>'controller/cError.php',
    'WIP'=>'controller/cWIP.php',
    'REST'=>'controller/cREST.php',
    'miCuenta'=>'controller/cMiCuenta.php',
    'detalleNasa'=>'controller/cDetallesNasa.php',
    'instruccionesNasa'=>'controller/cInstruccionesNasa.php',
    'departamento'=>'controller/cMtoDepartamento.php',
    'editarConsultarDepartamento'=>'controller/cEditarConsultarDepartamento.php'
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
    'WIP'=>'view/vWIP.php',
    'REST'=>'view/vREST.php',
    'miCuenta'=>'view/vMiCuenta.php',
    'detalleNasa'=>'view/vDetallesNasa.php',
    'instruccionesNasa'=>'view/vInstruccionesNasa.php',
    'departamento'=>'view/vMtoDepartamento.php',
    'editarConsultarDepartamento'=>'view/vEditarConsultarDepartamento.php'
];
?>
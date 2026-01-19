<?php

/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 19/01/2026
*   Uso:  controlador de la vista del REST*/ 

    //este if se usa para que los usuarios no se salten el control de acceso
    if(empty($_SESSION['usuarioMiAplicacion'])){
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: index.php');
        exit;
    }
    //si el usuario pulsa el boton de LOGOFF vuelve al login
    if(isset($_REQUEST['LOGOFF'])){
        $_SESSION['paginaEnCurso']='login';
        header('Location: index.php');
        exit;
    }
    //si el usuario pulsa el boton de VOLVER vuelve al inicio privado
    if(isset($_REQUEST['VOLVER'])){
        $_SESSION['paginaEnCurso']='inicioPrivado';
        header('Location: index.php');
        exit;
    }
    if(isset($_REQUEST['ENVIARNASA'])){
        $fechaNasa=$_REQUEST['fechaNasa'];
        $oFotoNasa=REST::apiNasa($fechaNasa);
    }else{
        //fecha que usaremos para mostrar la foto del dia  de la nasa
        $fechaActual= new DateTime();
        $fechaActualFormateada=$fechaActual->format('Y-m-d');
        $oFotoNasa=REST::apiNasa($fechaActualFormateada);
    }
    
    $fechaActual= new DateTime();
    $fechaActualFormateada=$fechaActual->format('Y-m-d');
    //array para cargar los errores
    $aErrores=[
        'fechaNasa'=>'',
    ];

    //cargamos el array que usara la vista para mostrar la inforamcion
    $avREST=[
        'fotoNasa'=>$oFotoNasa
    ];
    
    //cargamos el layout
    require_once $view['layout'];
?>
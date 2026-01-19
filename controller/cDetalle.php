<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 16/12/2025
*   Uso:  controlador del detalle*/
    //este if se usa para que los usuarios no se salten el control de acceso
    if(empty($_SESSION['usuarioMiAplicacion'])){
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['VOLVER'])){
        $_SESSION['paginaEnCurso']='inicioPrivado';
        header('Location: index.php');
        exit;
    }
    require_once $view['layout'];
    ?>
<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 05/02/2026
*   Uso:  controlador del mantenimiento de usuarios*/

    //este if se usa para que los usuarios no se salten el control de acceso
    if(empty($_SESSION['usuarioMiAplicacion'])){
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: index.php');
        exit;
    }
    
    //boton para volver a la página anterior si el usuario asi lo desea
    if(isset($_REQUEST['VOLVER'])){
        $_SESSION['paginaEnCurso']='inicioPrivado';
        header('Location: index.php');
        exit;
    }
    
    
    require_once $view['layout'];
    ?>

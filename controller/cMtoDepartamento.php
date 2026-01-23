<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 23/01/2026
*   Uso:  controlador del mantenimiento de departamentos*/

    //este if se usa para que los usuarios no se salten el control de acceso
    if(empty($_SESSION['usuarioMiAplicacion'])){
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['VOLVER'])){
        $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
        header('Location: index.php');
        exit;
    }
    
    
    require_once $view['layout'];
    ?>

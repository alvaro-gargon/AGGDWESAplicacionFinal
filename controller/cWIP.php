<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 14/01/2026
*   Uso:  controlador del detalle*/

    if(isset($_REQUEST['VOLVER'])){
        $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
        header('Location: indexLoginLogoff.php');
        exit;
    }
    require_once $view['layout'];
    
    ?>


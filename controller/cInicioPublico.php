<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 16/12/2025
*   Uso:  controlador del inicoPublico*/ 
    if(isset($_REQUEST['LOGIN'])){
        $_SESSION['paginaEnCurso']='login';
        header('Location: indexLoginLogoff.php');
        exit;
    }
    require_once $view['layout'];
?>

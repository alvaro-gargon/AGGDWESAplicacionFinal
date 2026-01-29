<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 29/01/2026
*   Uso:  controlador para las instrucciones de la foto de la nasa*/ 

    //cuando el usuario le da a volver, vuelve a la página de las apis
    if(isset($_REQUEST['VOLVER'])){
        $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
        header('Location: index.php');
        exit;
    }
    
    require_once $view['layout'];

?>
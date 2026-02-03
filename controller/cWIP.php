<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 14/01/2026
*   Uso:  controlador del detalle*/
    //si el usuario pulsa el boton de VOVLER vuelve a la pagina anterior de donde se encontraba
    if(isset($_REQUEST['VOLVER'])){
        $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
        header('Location: index.php');
        exit;
    }
    require_once $view['layout'];
    
    ?>


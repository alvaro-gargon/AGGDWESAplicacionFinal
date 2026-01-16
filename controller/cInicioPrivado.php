<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 16/12/2025
*   Uso:  controlador del inicoPrivado*/ 
    //este if se usa para que los usuarios no se salten el control de acceso
    if(empty($_SESSION['usuarioMiAplicacion'])){
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: indexLoginLogoff.php');
        exit;
    }
    if(isset($_REQUEST['LOGOFF'])){
        $_SESSION['paginaEnCurso']='login';
        header('Location: indexLoginLogoff.php');
        exit;
    }
    if(isset($_REQUEST['DETALLE'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='detalle';
        header('Location: indexLoginLogoff.php');
        exit;
    }
    if(isset($_REQUEST['WIP'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='WIP';
        header('Location: indexLoginLogoff.php');
        exit;
    }
    if (isset($_REQUEST['ERROR'])) {
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $consultaError = "SELECT * FROM error_a_posta";
        DBPDO::ejecutaConsulta($consultaError);
        $_SESSION['paginaEnCurso'] = 'error';
        header('Location: indexLoginLogoff.php');
        exit;
    }
    
    $avInicioPrivado=[
        'descUsuario' => $_SESSION['usuarioMiAplicacion']->getDescUsuario(),
        'numConexiones' => $_SESSION['usuarioMiAplicacion']->getNumAccesos(),
        'fechaHoraUltimaConexionAnterior' => $_SESSION['usuarioMiAplicacion']->getFechaHoraUltimaConexionAnterior()
    ];
    require_once $view['layout'];
?>
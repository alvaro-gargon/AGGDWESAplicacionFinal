<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 16/12/2025
*   Uso:  controlador del inicoPrivado*/ 
    //este if se usa para que los usuarios no se salten el control de acceso
    if(empty($_SESSION['usuarioMiAplicacion'])){
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: index.php');
        exit;
    }
    if(isset($_REQUEST['LOGOFF'])){
        $_SESSION['paginaEnCurso']='login';
        header('Location: index.php');
        exit;
    }
    if(isset($_REQUEST['DETALLE'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='detalle';
        header('Location: index.php');
        exit;
    }
    if(isset($_REQUEST['WIP'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='WIP';
        header('Location: index.php');
        exit;
    }
    if (isset($_REQUEST['ERROR'])) {
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $consultaError = "SELECT * FROM error_a_posta";
        DBPDO::ejecutaConsulta($consultaError);
        $_SESSION['paginaEnCurso'] = 'error';
        header('Location: index.php');
        exit;
    }
    if(isset($_REQUEST['REST'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='REST';
        header('Location: index.php');
        exit;
    }
    if(isset($_REQUEST['miCuenta'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='miCuenta';
        header('Location: index.php');
        exit;
    }
    if(isset($_REQUEST['DEPARTAMENTOS'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='departamento';
        header('Location: index.php');
        exit;
    }
    //usamos este if para saber si el usuario es un administrador o un usario normal
    if($_SESSION['usuarioMiAplicacion']->getPerfil()==='administrador'){
        $avInicioPrivado=[
            'descUsuario' => $_SESSION['usuarioMiAplicacion']->getDescUsuario(),
            'numConexiones' => $_SESSION['usuarioMiAplicacion']->getNumAccesos(),
            'fechaHoraUltimaConexionAnterior' => $_SESSION['usuarioMiAplicacion']->getFechaHoraUltimaConexionAnterior(),
            'botonDetalleActivo?'=> '',
            'claseBotonDetalle'=>''
        ];
        
    }else{
        $avInicioPrivado=[
            'descUsuario' => $_SESSION['usuarioMiAplicacion']->getDescUsuario(),
            'numConexiones' => $_SESSION['usuarioMiAplicacion']->getNumAccesos(),
            'fechaHoraUltimaConexionAnterior' => $_SESSION['usuarioMiAplicacion']->getFechaHoraUltimaConexionAnterior(),
            'botonDetalleActivo?'=> 'disabled',
            'claseBotonDetalle'=> 'desactivado'
        ];
    }
    
    require_once $view['layout'];
?>
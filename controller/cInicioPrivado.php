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
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: index.php');
        exit;
    }
    if(isset($_REQUEST['DETALLE'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='detalle';
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
    if(isset($_REQUEST['USUARIOS'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='mtoUsuarios';
        header('Location: index.php');
        exit;
    }
    
    //array donde decidiremos que botones mostrar dependiendo el perfil
    $aBotones=[];
    //usamos este if para saber si el usuario es un administrador o un usario normal
    if($_SESSION['usuarioMiAplicacion']->getPerfil()==='administrador'){
        $aBotones=$aFuncionalidadAdmin;
    }else{
        $aBotones=$aFuncionalidadUsuario;
    }
    //array que le pasamos a la vista para que no acceda al modelo
    $avInicioPrivado=[
        'descUsuario' => $_SESSION['usuarioMiAplicacion']->getDescUsuario(),
        'numConexiones' => $_SESSION['usuarioMiAplicacion']->getNumAccesos(),
        'fechaHoraUltimaConexionAnterior' => $_SESSION['usuarioMiAplicacion']->getFechaHoraUltimaConexionAnterior()
    ];
    
    require_once $view['layout'];
?>
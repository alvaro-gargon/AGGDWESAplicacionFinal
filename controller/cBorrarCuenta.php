<?php
    /*  Nombre: Alvaro Garcia Gonzalez
    *   Fecha: 19/02/2026
    *   Uso:  controlador para borrar la cuenta*/

    /**
     * Boton cancelar que te devuelve al login si el usuario decide no registrarse
     */
    if(isset($_REQUEST['CANCELAR'])){
        $_SESSION['paginaEnCurso']='miCuenta';
        header('Location: index.php');
        exit;
    }

    $entradaOK=true; //boolean para comprobar si el formulario esta correcto o no
    //array donde se recogera el error de no poder borrar el usuario
    $aErrores=[
        'codUsuario'=>null
    ];
    $oUsuarioActivo=$_SESSION['usuarioMiAplicacion'];
    /**
     * acciones que pasaran si el usuario intenta registrarse
     */
    if(isset($_REQUEST['ACEPTAR'])){
        $UsuarioEliminado=UsuarioPDO::borrarUsuario($oUsuarioActivo->getCodUsuario());
        if($UsuarioEliminado==false)
        {
            $aErrores['codUsuario']='Ha ocurrido un error al intentar borrar el usuario';
            $entradaOK=false;
        }
    }else{
        $entradaOK=false;
    }
    
    
    if($entradaOK){
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: index.php');
        exit;
    }
    //variable fecha para mostrarla formateada
    $fechaUltimaConexion=$oUsuarioActivo->getFechaHoraUltimaConexion();
    //array que usaremos para mostrar los datos del usuario en la vista
    $avMiCuenta=[
        'codigo'=>$oUsuarioActivo->getCodUsuario(),
        'descripcion'=>$oUsuarioActivo->getDescUsuario(),
        'conexiones'=>$oUsuarioActivo->getNumAccesos(),
        'perfil'=>$oUsuarioActivo->getPerfil(),
        'fechaUltimaConexion'=>$fechaUltimaConexion->format('d-m-Y H:i:s')
    ];
    require_once $view['layout'];
?>

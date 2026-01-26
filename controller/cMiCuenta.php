<?php
    /*  Nombre: Alvaro Garcia Gonzalez
    *   Fecha: 22/01/2026
    *   Uso:  controlador del registro*/

    /**
     * Boton cancelar que te devuelve al login si el usuario decide no registrarse
     */
    if(isset($_REQUEST['CANCELAR'])){
        $_SESSION['paginaEnCurso']='login';
        header('Location: index.php');
        exit;
    }
    if(isset($_REQUEST['CONTRASEÑA'])){
        $_SESSION['paginaEnCurso']='login';
        header('Location: index.php');
        exit;
    }

    $entradaOK=true; //boolean para comprobar si el formulario esta correcto o no
    //array donde recojo los errores si los hubiera
    $aErrores=[
        'descripcion'=>null
    ];
    $aRespuestas=[
        'descripcion'=>null
    ];
    /**
     * acciones que pasaran si el usuario intenta registrarse
     */
    if(isset($_REQUEST['ACEPTAR'])){
        $aErrores['descripcion']= validacionFormularios::comprobarAlfabetico($_REQUEST['descripcion'],32,4,obligatorio:1);//validacion alfabtica del campo descripcion
        if($_REQUEST['preguntaSeguridad']!='pimentel'){
            $entradaOK=false;
        }
        foreach ($aErrores as $clave => $valor){
            if($valor!=null){
                $entradaOK=false;
            }
        }
    }else{
        $entradaOK=false;
    }
    
    
    if($entradaOK){
        $oUsuarioActivo=UsuarioPDO::modificarUsuario($_SESSION['usuarioMiAplicacion'], $_REQUEST['descripcion']);
        $_SESSION['usuarioMiAplicacion']=$oUsuarioActivo;
        $_SESSION['paginaEnCurso']='inicioPrivado';
        header('Location: index.php');
        exit;
    }
    $avMiCuenta=[
        'codigo'=>$oUsuarioActivo->getCodUsuario(),
        'descripcion'=>$oUsuarioActivo->getDescUsuario(),
        'conexiones'=>$oUsuarioActivo->getNumAccesos(),
    ];
    require_once $view['layout'];
?>

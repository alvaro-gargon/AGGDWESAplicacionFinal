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

    $entradaOK=true; //boolean para comprobar si el formulario esta correcto o no
    //array donde recojo los errores si los hubiera
    $aErrores=[
        'usuario'=>null,
        'descripcion'=>null,
        'contraseña'=>null
    ];
    /**
     * acciones que pasaran si el usuario intenta registrarse
     */
    if(isset($_REQUEST['ACEPTAR'])){
        $aErrores['usuario']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'],obligatorio:1);//validacion sintactica del campo usuario
        $aErrores['descripcion']= validacionFormularios::comprobarAlfabetico($_REQUEST['descripcion'],32,4,obligatorio:1);//validacion alfabtica del campo descripcion
        if($_REQUEST['contraseña']!=$_REQUEST['contraseñaRepetida']){
            $entradaOK=false;
        }
        if($_REQUEST['preguntaSeguridad']!=SEGURIDAD){
            $entradaOK=false;
        }
        foreach ($aErrores as $clave => $valor){
            if($valor!=null){
                $entradaOK=false;
            }
        }
        $oUsuarioActivo= UsuarioPDO::validarUsuario($_REQUEST['usuario'], $_REQUEST['contraseña']);
        if($oUsuarioActivo!=null){
            $entradaOK=false;
            $aErrores['usuario']='Ya existe un usuario con ese nombre';
        }
    }else{
        $entradaOK=false;
    }
    
    
    if($entradaOK){
        $oUsuarioActivo= UsuarioPDO::altaUsuario($_REQUEST['usuario'], $_REQUEST['contraseña'], $_REQUEST['descripcion']);
        UsuarioPDO::actualizarUltimaConexion($oUsuarioActivo);
        $_SESSION['usuarioMiAplicacion']=$oUsuarioActivo;
        $_SESSION['paginaEnCurso']='inicioPrivado';
        header('Location: index.php');
        exit;
    }
    require_once $view['layout'];
?>
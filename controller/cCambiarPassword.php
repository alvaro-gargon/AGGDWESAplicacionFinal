<?php
    /*  Nombre: Alvaro Garcia Gonzalez
    *   Fecha: 04/02/2026
    *   Uso:  controlador para cambiar la contraseña*/

    /**
     * Boton cancelar que te devuelve al login si el usuario decide no registrarse
     */
    if(isset($_REQUEST['CANCELAR'])){
        $_SESSION['paginaEnCurso']='miCuenta';
        header('Location: index.php');
        exit;
    }

    $entradaOK=true; //boolean para comprobar si el formulario esta correcto o no
    //array donde recojo los errores si los hubiera
    $aErrores=[
        'contraseña'=>'',
        'contraseñaRepetida'=>''
    ];
    /**
     * acciones que pasaran si el usuario intenta registrarse
     */
    if(isset($_REQUEST['ACEPTAR'])){
        $aErrores['contraseña']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['contraseña'],20,4,obligatorio:1);//validacion sintactica del campo contraseña
        if($_REQUEST['contraseña']!=$_REQUEST['contraseñaRepetida']){
            $aErrores['contraseñaRepetida']='Las contraseñas no son iguales';
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
        //cogemos el objeto usuario con los datos del usuario actual
        $oUsuarioActivo=$_SESSION['usuarioMiAplicacion'];
        //modificamos su contraseña
        $oUsuarioActivo= UsuarioPDO::cambiarPassword($oUsuarioActivo,$_REQUEST['contraseña']);
        $_SESSION['usuarioMiAplicacion']=$oUsuarioActivo;
        $_SESSION['paginaEnCurso']='inicioPrivado';
        header('Location: index.php');
        exit;
    }
    require_once $view['layout'];
?>
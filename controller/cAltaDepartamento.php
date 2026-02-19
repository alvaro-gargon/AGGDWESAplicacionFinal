<?php
    /*  Nombre: Alvaro Garcia Gonzalez
    *   Fecha: 03/02/2026
    *   Uso:  controlador para el alta de departamento*/
    //este if se usa para que los usuarios no se salten el control de acceso
    if(empty($_SESSION['usuarioMiAplicacion'])){
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: index.php');
        exit;
    }
    /**
     * Boton cancelar que te devuelve al login si el usuario decide no registrarse
     */
    if(isset($_REQUEST['CANCELAR'])){
        $_SESSION['paginaEnCurso']='departamento';
        header('Location: index.php');
        exit;
    }

    $entradaOK=true; //boolean para comprobar si el formulario esta correcto o no
    //array donde recojo los errores si los hubiera
    $aErrores=[
        'codigo'=>'',
        'descripcion'=>'',
        'volumen'=>''
    ];
    //array donde recojo los errores si los hubiera
    $aRespuestas=[
        'codigo'=>'',
        'descripcion'=>'',
        'volumen'=>''
    ];
    /**
     * acciones que pasaran si el usuario intenta registrarse
     */
    if(isset($_REQUEST['ACEPTAR'])){
        //validamos los campos
        $aErrores['codigo']= validacionFormularios::comprobarAlfabetico($_REQUEST['codigo'],3,3,obligatorio:1);//validacion sintactica del campo codigo
        $aErrores['descripcion']= validacionFormularios::comprobarAlfabetico($_REQUEST['descripcion'],60,4,obligatorio:1);//validacion alfabtica del campo descripcion
        $aErrores['volumen']= validacionFormularios::comprobarFloat($_REQUEST['volumen'], min:0,obligatorio:1);//validacion del campo volumen
        //guardamos las respuestas correctas
        $aRespuestas['codigo']=$_REQUEST['codigo'];
        $aRespuestas['descripcion']=$_REQUEST['descripcion'];
        $aRespuestas['volumen']=$_REQUEST['volumen'];
        //si hay errores generamos los mensajes de error
        foreach ($aErrores as $clave => $valor){
            if($valor!=null){
                $entradaOK=false;
            }
        }
        //comprobamos si ya hay un departamento con ese codigo
        $oDepartamenNuevo= DepartamentoPDO::validarCodigo($_REQUEST['codigo']);
        if($oDepartamenNuevo!=null){
            $entradaOK=false;
            $aErrores['codigo']='Ya existe un departamento con ese codigo';
        }
    }else{
        $entradaOK=false;
    }
    
    
    if($entradaOK){
        $oDepartamenNuevo= DepartamentoPDO::altaDepartamento($_REQUEST['codigo'], $_REQUEST['descripcion'], $_REQUEST['volumen']);
        $_SESSION['paginaEnCurso']='departamento';
        header('Location: index.php');
        exit;
    }
    require_once $view['layout'];
?>
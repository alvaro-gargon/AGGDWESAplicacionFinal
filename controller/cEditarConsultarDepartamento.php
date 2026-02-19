<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 19/02/2026
*   Uso:  controlador para editar o consultar un departamento*/
    //este if se usa para que los usuarios no se salten el control de acceso
    if(empty($_SESSION['usuarioMiAplicacion'])){
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: index.php');
        exit;
    }
    //boton que aparece en la vista de consultar y que te devuelve a la página anterior
    if(isset($_REQUEST['VOLVER'])){
        $_SESSION['paginaEnCurso']='departamento';
        header('Location: index.php');
        exit;
    }
    //boton que aparece en la vista de editar y te devuelve a la página anterior sin provocar ningún cambio
    if(isset($_REQUEST['CANCELAR'])){
        $_SESSION['paginaEnCurso']='departamento';
        header('Location: index.php');
        exit;
    }
    
    $entradaOK=true; //boolean para comprobar si el formulario esta correcto o no
    //array donde recojo los errores si los hubiera
    $aErrores=[
        'descripcion'=>'',
        'volumenNegocio'=>''
    ];
    $aRespuestas=[
        'descripcion'=>'',
        'volumenNegocio'=>''
    ];
    /**
     * acciones que pasaran si el usuario intenta registrarse
     */
    if(isset($_REQUEST['ACEPTAR'])){
        //guardamos los errores
        $aErrores['descripcion']= validacionFormularios::comprobarAlfabetico($_REQUEST['descripcion'],60,4,obligatorio:1);//validacion alfabtica del campo descripcion
        //creamos una variable del volumen de negocio sin punto
        $volumenNegocioSinPunto= str_replace('.','',$_REQUEST['volumenNegocio']);
        $aErrores['volumenNegocio']= validacionFormularios::comprobarFloatMonetarioES($volumenNegocioSinPunto, min: 0);
        
        //guardamos las respuestas para volver a mostrarlas sin hay algun error
        $aRespuestas['descripcion']=$_REQUEST['descripcion'];
        $aRespuestas['volumenNegocio']=$_REQUEST['volumenNegocio'];
        //buscamos si ha habido algún error
        foreach ($aErrores as $clave => $valor){
            if($valor!=null){
                $entradaOK=false;
            }else{
                $aRespuestas[$clave]=$_REQUEST["$clave"];
            }
        }
    }else{
        $entradaOK=false;
    }
    
    if($entradaOK){
        //modificamos el valor de para que tenga un formato correcto en la base de datos
        $volumenNegocioSinPunto= str_replace('.','',$_REQUEST['volumenNegocio']);
        $volumenNegocioPunto=str_replace(',','.',$volumenNegocioSinPunto);
        //modificamos el departamento
        $oDepartamentoModificado= DepartamentoPDO::modificarDepartamento($_SESSION['departamentoEnUso'], $_REQUEST['descripcion'],$volumenNegocioPunto );
        if($oDepartamentoModificado!=null){
            $_SESSION['departamentoEnUso']=$oDepartamentoModificado;
            $_SESSION['paginaEnCurso']='departamento';
            header('Location: index.php');
            exit;
        }else{
            
        }
        
    }
    
    //variables fecha que uso para darle formato
    $fechaCreacion= new DateTime($_SESSION['departamentoEnUso']->getFechaCreacionDepartamento());
    if($_SESSION['departamentoEnUso']->getFechaBajaDepartamento()!=null){
        $fechaBaja=new DateTime($_SESSION['departamentoEnUso']->getFechaBajaDepartamento());
        $fechaBajaFormateada=$fechaBaja->format('d/m/Y');
    }else{
        $fechaBajaFormateada='';
    }
    //array donde guardo los valores del objeto departamento para mostrarlos en la vista
    $avEditarConsultar=[
        'codigo'=>$_SESSION['departamentoEnUso']->getCodDepartamento(),
        'descripcion'=>$_SESSION['departamentoEnUso']->getDescDepartamento(),
        'volumenNegocio'=> number_format($_SESSION['departamentoEnUso']->getVolumenDeNegocio(),2,',','.'),
        'fechaCreacion'=>$fechaCreacion->format('d-m-Y'),
        'fechaBajaLogica'=>$fechaBajaFormateada
        
    ];
    require_once $view['layout'];
    ?>
<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 02/02/2026
*   Uso:  controlador del detalle*/
    //este if se usa para que los usuarios no se salten el control de acceso
    if(empty($_SESSION['usuarioMiAplicacion'])){
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: index.php');
        exit;
    }
    //boton que aparece en la vista de consultar y que te devuelve a la página anterior
    if(isset($_REQUEST['VOLVER'])){
        $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
        header('Location: index.php');
        exit;
    }
    //boton que aparece en la vista de editar y te devuelve a la página anterior sin provocar ningún cambio
    if(isset($_REQUEST['VOLVER'])){
        $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
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
        $aErrores['descripcion']= validacionFormularios::comprobarAlfabetico($_REQUEST['descripcion'],60,4,obligatorio:1);//validacion alfabtica del campo descripcion
        $aErrores['volumenNegocio']= validacionFormularios::comprobarFloat($_REQUEST['volumen']);
        foreach ($aErrores as $clave => $valor){
            if($valor!=null){
                $entradaOK=false;
            }
        }
    }else{
        $entradaOK=false;
    }
    
    if($entradaOK){
        //modificamos el departamento
        $oDepartamentoModificado= DepartamentoPDO::modificarDepartamento($_SESSION['departamentoEnUso'], $_REQUEST['descripcion'], $_REQUEST['volumen']);
        if($oDepartamentoModificado!=null){
            $_SESSION['departamentoEnUso']=$oDepartamentoModificado;
            $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
            header('Location: index.php');
            exit;
        }else{
            
        }
        
    }
    
    
    $fechaCreacion= new DateTime($_SESSION['departamentoEnUso']->getFechaCreacionDepartamento());
    //array donde guardo los valores del objeto departamento para mostrarlos en la vista
    $avEditarConsultar=[
        'codigo'=>$_SESSION['departamentoEnUso']->getCodDepartamento(),
        'descripcion'=>$_SESSION['departamentoEnUso']->getDescDepartamento(),
        'volumenNegocio'=>$_SESSION['departamentoEnUso']->getVolumenDeNegocio(),
        'fechaCreacion'=>$fechaCreacion->format('d-m-Y')
    ];
    require_once $view['layout'];
    ?>
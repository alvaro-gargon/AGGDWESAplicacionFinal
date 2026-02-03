<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 30/01/2026
*   Uso:  controlador del mantenimiento de departamentos*/

    //este if se usa para que los usuarios no se salten el control de acceso
    if(empty($_SESSION['usuarioMiAplicacion'])){
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: index.php');
        exit;
    }
    //boton para volver a la página anterior si el usuario asi lo desea
    if(isset($_REQUEST['VOLVER'])){
        $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
        header('Location: index.php');
        exit;
    }
    //boton para ir a la página de dar de alta un departamento
    if(isset($_REQUEST['ALTA'])){
        $_SESSION['paginaEnCurso']='altaDepartamento';
        header('Location: index.php');
        exit;
    }
    //boton para acceder a la vista de edición de un departamento
    if(isset($_REQUEST['EDITAR'])){
        $departamentoEnUso=DepartamentoPDO::buscaDepartamentoPorCod($_REQUEST['EDITAR']);
        if($departamentoEnUso!=null){
            $_SESSION['departamentoEnUso']=$departamentoEnUso;
            $_SESSION['vistaEditarConsultarDepartamento']='editar';
            $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
            $_SESSION['paginaEnCurso']='editarConsultarDepartamento';
            header('Location: index.php');
            exit;
        }
    }
    //boton para acceder a la vista de consulta de un departamento
    if(isset($_REQUEST['CONSULTAR'])){
        $departamentoEnUso=DepartamentoPDO::buscaDepartamentoPorCod($_REQUEST['CONSULTAR']);
        if($codigoDepartamentoEnUso!=null){
            $_SESSION['departamentoEnUso']=$departamentoEnUso;
            $_SESSION['vistaEditarConsultarDepartamento']='consultar';
            $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
            $_SESSION['paginaEnCurso']='editarConsultarDepartamento';
            header('Location: index.php');
            exit;
        }
    }
    
    $entradaOK=true;//variable para comprobar que todo va bien en el formulario
    //array para guardar los errores
    $aErrores=[
        'descripcionBuscada'=>null
    ];
    $aRespuestas=[
        'descripcionBuscada'=>null
    ];
    
    if(isset($_REQUEST['BUSCAR'])){
        //solo validamos la descripcion si hay algo escrito
        if(!empty($_REQUEST['descripcionBuscada'])){
            //validamos la descripcion usada
            $aErrores['descripcionBuscada']= validacionFormularios::comprobarAlfabetico($_REQUEST['descripcionBuscada'], 255, 0, 1);
            
            //comprobamos todos los errores
            foreach($aErrores as $campo => $valor){
                if(!empty($valor)){ // Comprobar si el valor es válido
                    $entradaOK = false;
                } 
            }
        }
    }else{
        $entradaOK=false;
    }
    
    if($entradaOK){
        //(Gracias a Gonzalo Junquera)
        //guardamos en el array de respuesta la respuesta del usuario
        $aRespuestas['descripcionBuscada'] = $_REQUEST['descripcionBuscada'] ?? ''; //el operador ?? sirve como or si lo primero no existe o esta vacio (Gracias a Gonzalo Junquera)
        //guardamos en la sesion la descripcion bucada para que recuerde
        $_SESSION['descBuscadaEnUso']=$aRespuestas['descripcionBuscada'];
    }
    
    $aDepartamentos= DepartamentoPDO::buscaDepartamentoPorDesc($_REQUEST['descripcionBuscada'] ?? '');
    $avDepartamento=[];
    
    
    if($aDepartamentos!=null){
        foreach ($aDepartamentos as $oDepartamento){
            //formateamos las fechas
            $fechaCreacion=new DateTime($oDepartamento->getFechaCreacionDepartamento());
            $fechaCreacionFormateada=$fechaCreacion->format('d/m/Y');
            //formateamos la fecha de baja si esque esta existe
            if($oDepartamento->getFechaBajaDepartamento()!=null){
                $fechaBaja=new DateTime($oDepartamento->getFechaBajaDepartamento());
                $fechaBajaFormateada=$fechaBaja->format('d/m/Y');
            }else{
                $fechaBajaFormateada='';
            }
            $avDepartamento[]=[
                'codDepartamento'=>$oDepartamento->getCodDepartamento(),
                'descDepartamento'=>$oDepartamento->getDescDepartamento(),
                'fechaCreacionDepartamento'=>$fechaCreacionFormateada,
                'volumenDeNegocio'=>$oDepartamento->getVolumenDeNegocio(),
                'fechaBajaDepartamento'=>$fechaBajaFormateada
            ];
        }
    }
    
    require_once $view['layout'];
    ?>

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
        $_SESSION['paginaEnCurso']='inicioPrivado';
        header('Location: index.php');
        exit;
    }
    //boton para ir a la página de dar de alta un departamento
    if(isset($_REQUEST['AÑADIR'])){
        $_SESSION['paginaEnCurso']='altaDepartamento';
        header('Location: index.php');
        exit;
    }
    //boton para ir a la página de dar de borrar un departamento
    if(isset($_REQUEST['BORRAR'])){
        $departamentoEnUso=DepartamentoPDO::buscaDepartamentoPorCod($_REQUEST['BORRAR']);
        if($departamentoEnUso!=null){
            $_SESSION['departamentoEnUso']=$departamentoEnUso;
            $_SESSION['paginaEnCurso']='borrarDepartamento';
            header('Location: index.php');
            exit;
        }
    }
    //boton para acceder a la vista de edición de un departamento
    if(isset($_REQUEST['EDITAR'])){
        $departamentoEnUso=DepartamentoPDO::buscaDepartamentoPorCod($_REQUEST['EDITAR']);
        if($departamentoEnUso!=null){
            $_SESSION['departamentoEnUso']=$departamentoEnUso;
            $_SESSION['paginaEnCurso']='editarConsultarDepartamento';
            header('Location: index.php');
            exit;
        }
    }
    //boton para ir a la página de dar de baja lógica un departamento
    if(isset($_REQUEST['BAJA'])){
        $departamentoEnUso=DepartamentoPDO::buscaDepartamentoPorCod($_REQUEST['BAJA']);
        if($departamentoEnUso!=null){
            $_SESSION['departamentoEnUso']=$departamentoEnUso;
            $_SESSION['paginaEnCurso']='bajaLogicaDepartamento';
            header('Location: index.php');
            exit;
        }
    }
    //boton para ir a la página de dar de alta lógica un departamento
    if(isset($_REQUEST['REHABILITAR'])){
        $departamentoEnUso=DepartamentoPDO::buscaDepartamentoPorCod($_REQUEST['REHABILITAR']);
        if($departamentoEnUso!=null){
            $_SESSION['departamentoEnUso']=$departamentoEnUso;
            $_SESSION['paginaEnCurso']='rehabilitarDepartamento';
            header('Location: index.php');
            exit;
        }
    }
    
    //si es la primera vez que entra en esta sesion, el valor por defecto será 5
    if(!isset($_SESSION['numeroResultadosDepartamentos'])){
        $_SESSION['numeroResultadosDepartamentos']=5;
    }
    //si cambia el valor de el numero de resultados que quiere ver
    if(isset($_REQUEST['numResultados'])){
        $_SESSION['numeroResultadosDepartamentos']=$_REQUEST['numResultados'];
    }
    //calculamos el numero de paginas totales teniendo en cuenta el numero de resultados por página
    $numDepartamentosDescEstado=DepartamentoPDO::contarDepartamentoPorDescEstado($_SESSION['descBuscadaEnUso'] ?? '',$_SESSION['estadoDepartamentos'] ?? 'todos');
    $numPaginaFinal=(int) ($numDepartamentosDescEstado/$_SESSION['numeroResultadosDepartamentos'])+1;
    
    //si no existe el valor de la sesion numPagina (es decir, que es la primera vez que se mete), le damos valor 1 
    if (!isset($_SESSION['numPagina'])){
        $_SESSION['numPagina']=1;
    }
    //si le da al boton << vuelve a la primera página
    if(isset($_REQUEST['paginaInicial'])){
        $_SESSION['numPagina']=1;
    }
    //si le da al boton < vuelve a la página anterior (sino esta en la primera)
    if(isset($_REQUEST['paginaAtras'])){
        if($_SESSION['numPagina']!=1){
            $_SESSION['numPagina']=$_SESSION['numPagina']-1;
        }
    }
    //si le da al boton > va a la página siguiente (sino esta en la ultima)
    if(isset($_REQUEST['paginaSiguiente'])){
        if($_SESSION['numPagina']!=$numPaginaFinal){
            $_SESSION['numPagina']=$_SESSION['numPagina']+1;
        }
    }
    //si le da al boton >> va a la página final
    if(isset($_REQUEST['paginaFinal'])){
        $_SESSION['numPagina']=$numPaginaFinal;
    }
    
    $entradaOK=true;//variable para comprobar que todo va bien en el formulario
    //array para guardar los errores
    $aErrores=[
        'descripcionBuscada'=>null,
        'estadoBuscado'=>null
    ];
    $aRespuestas=[
        'descripcionBuscada'=>null,
        'estadoBuscado'=>null
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
    //si todo ha ido bien en el formulario
    if($entradaOK){
        //(Gracias a Gonzalo Junquera)
        //guardamos en el array de respuesta la respuesta del usuario
        $aRespuestas['descripcionBuscada'] = $_REQUEST['descripcionBuscada'] ?? ''; //el operador ?? sirve como or si lo primero no existe o esta vacio (Gracias a Gonzalo Junquera)
        //guardamos en la sesion la descripcion bucada para que recuerde
        $_SESSION['descBuscadaEnUso']=$aRespuestas['descripcionBuscada'];
        //guardamos en el array de respuesta la respuesta del usuario
        $aRespuestas['estadoDepartamentos'] = $_REQUEST['estadoDepartamentos'] ?? '';
        //guardamos en la sesion el estado buscado para que recuerde
        $_SESSION['estadoDepartamentos']=$aRespuestas['estadoDepartamentos'];
    }
    
    //busco los departamentos que cumplan con la descripcion o todos si es la primera vez que entra
    //uso la sesion para recordar los buscado
    $aDepartamentos= DepartamentoPDO::buscaDepartamentoPorDescEstadoPaginado($_SESSION['descBuscadaEnUso'] ?? '',$_SESSION['estadoDepartamentos'] ?? 'todos', 
            $_SESSION['numeroResultadosDepartamentos'], $_SESSION['numPagina']);
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
    $avMtoDepartamento=[
        'numPaginasTotal'=>$numPaginaFinal
    ];
    require_once $view['layout'];
    ?>

<?php

/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 19/01/2026
*   Uso:  controlador de la vista del REST*/ 
//muchas gracias a Gonzalo Junquera por parte del código
    //este if se usa para que los usuarios no se salten el control de acceso
    if(empty($_SESSION['usuarioMiAplicacion'])){
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: index.php');
        exit;
    }
    //si el usuario pulsa el boton de LOGOFF vuelve al login
    if(isset($_REQUEST['LOGOFF'])){
        $_SESSION['paginaEnCurso']='login';
        header('Location: index.php');
        exit;
    }
    //si el usuario pulsa el boton de VOLVER vuelve al inicio privado
    if(isset($_REQUEST['VOLVER'])){
        $_SESSION['paginaEnCurso']='inicioPrivado';
        header('Location: index.php');
        exit;
    }
    if(isset($_REQUEST['DETALLENASA'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='detalleNasa';
        header('Location: index.php');
        exit;
    }
    if(isset($_REQUEST['INSTRUCCIONNASA'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='instruccionesNasa';
        header('Location: index.php');
        exit;
    }
    
    $entradaOK=true;//variable para cuando todo va bien
    //array para cargar los errores
    $aErrores=[
        'fechaNasa'=>'',
    ];
    //array para cargar las respuetas correctas
    $aRespuestas=[
        'fechaNasa'=>'',
    ];
    //recogemos la fecha actual para que sea la de por defecto
    $oFechaNasa = new DateTime();
    
    if (isset($_SESSION["fechaNasa"])) {
    // cambiamos la fecha en la sesion, si es que esta existe
        $oFechaNasa = $_SESSION["fechaNasa"];
    }
    
    $fechaActualFormateada=$oFechaNasa->format('Y-m-d');
    //llamamos a la api
    $oFotoNasa=REST::apiNasa($fechaActualFormateada);
    //declaro una fecha máxima para usar en la validacion de fecha
    $oFechaMaxima = new DateTime();
    //si el usuario le da al boton enviar con una fecha distinta a la actual
    if(isset($_REQUEST['ENVIARNASA'])){
        $aErrores['fechaNasa']= validacionFormularios::validarFecha($_REQUEST['fechaNasa'],$oFechaMaxima->format('Y/m/d'));
    
        foreach($aErrores as $campo => $valor){
        if(!empty($valor)){ // Comprobar si el valor es válido
            $entradaOK = false;
        }
        
        // Comprobamos que el servidor de la api este bien, que responda, etc.
        if ($entradaOK) {
            $oFotoNasa = REST::apiNasa($fechaActualFormateada);

            // guardamos en la sesion la fecha que viene del formulario para recordarla después.
            $_SESSION['fechaNasa'] = new DateTime($_REQUEST['fechaNasa']);

            // aqui entramos en caso de algo haya ido mal al usar la api de la nasa
            if (!isset($oFotoNasa)) {
                $entradaOK = false;
                $aErrores['fechaNasa'] = "Error al cargar la api de la NASA";
            }
        }
    }
    }else{
        $entradaOK=false;
    }
    
    //llamamiento a una api propia
    //gracias a Gonzalo Junquera por la idea general
    //recojo todos los departamentos
    $aDepartamentos= DepartamentoPDO::buscaDepartamentoPorDesc("");
    $avDepartamentosREST=[];
    foreach ($aDepartamentos as $oDepartamento){
        $avDepartamentosREST[]=$oDepartamento->getCodDepartamento();
       
    }
    //si el usuario le da al boton enviar en la seccion de la api propia
    if(isset($_REQUEST['ENVIARPROPIA'])){
        // Comprobamos que el servidor de la api este bien, que responda, etc.
        $volumenDepartamento = REST::ApiPropiaVolumen($_REQUEST['codDepartamento']);

        // guardamos en la sesion el volumen del departamento y el codigo buscado.
        $_SESSION['volumenDepartamentoApiEnUso'] = $volumenDepartamento;
        $_SESSION['codigoDepartamentoBuscadoApi']=$_REQUEST['codDepartamento'];
        // lo guardamos en el array de vista
        //$avREST['volumenDepartamento']=$volumenDepartamento;
        $avREST['volumenDepartamento']=$_REQUEST['codDepartamento'];
    }else{
        $entradaOK=false;
    }
    //si todo ha ido bien... recargamos la página con los la foto
    if ($entradaOK) {
        $_SESSION['paginaEnCurso'] = 'REST';
        header('Location: index.php');
        exit;

    }
    $fechaActual= new DateTime();
    $fechaActualFormateada=$fechaActual->format('Y-m-d');
    
    
    

    //cargamos el array que usara la vista para mostrar la inforamcion
    $avREST=[
        'tituloFotoNasa'=>$oFotoNasa->getTitulo(),
        'urlNasa'=>$oFotoNasa->getUrl(),
        'fechaNasa'=>$oFechaNasa->format('Y-m-d'),
        'volumenDepartamento'=>''
    ];
    
    //cargamos el layout
    require_once $view['layout'];
?>
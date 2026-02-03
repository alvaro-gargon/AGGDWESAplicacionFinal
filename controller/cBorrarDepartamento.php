<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 03/02/2026
*   Uso:  controlador para borrar un departamento*/
    //este if se usa para que los usuarios no se salten el control de acceso
    if(empty($_SESSION['usuarioMiAplicacion'])){
        $_SESSION['paginaEnCurso']='inicioPublico';
        header('Location: index.php');
        exit;
    }
    //boton que aparece en la vista de editar y te devuelve a la página anterior sin provocar ningún cambio
    if(isset($_REQUEST['CANCELAR'])){
        $_SESSION['paginaEnCurso']='departamento';
        header('Location: index.php');
        exit;
    }
    
    //array donde recojo los errores si los hubiera
    $aErrores=[
        'codigo'=>'',
    ];
    if(isset($_REQUEST['ACEPTAR'])){
        //borramos el departamento
        //la variable solo puede valer true o false
        $bDepartamentoBorrado= DepartamentoPDO::bajaFisicaDepartamento($_SESSION['departamentoEnUso']->getCodDepartamento());
        if($bDepartamentoBorrado==true){
            $_SESSION['paginaEnCurso']='departamento';
            header('Location: index.php');
            exit;
        }else{
            $aErrores=[
                'codigo'=>'Ha ocurrido un error al borrar el departamento',
            ];
        }
    }
    
    //variable fecha que uso para darle formato
    $fechaCreacion= new DateTime($_SESSION['departamentoEnUso']->getFechaCreacionDepartamento());
    //array donde guardo los valores del objeto departamento para mostrarlos en la vista
    $avBorrar=[
        'codigo'=>$_SESSION['departamentoEnUso']->getCodDepartamento(),
        'descripcion'=>$_SESSION['departamentoEnUso']->getDescDepartamento(),
        'volumenNegocio'=>$_SESSION['departamentoEnUso']->getVolumenDeNegocio(),
        'fechaCreacion'=>$fechaCreacion->format('d-m-Y')
    ];
    require_once $view['layout'];
    ?>
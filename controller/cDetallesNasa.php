<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 29/01/2026
*   Uso:  controlador para los detalles de la foto de la nasa*/ 

    //cuando el usuario le da a volver, vuelve a la página de las apis
    if(isset($_REQUEST['VOLVER'])){
        $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
        header('Location: index.php');
        exit;
    }
    //recojo el objeto de la foto de la sesion
    $oFotoNasa=$_SESSION['ofotoNasaEnCurso'];
    //formateo el objeto fecha
    $fechaFoto=new DateTime($oFotoNasa->getfecha());
    //cargo un array con la informacion necesaria para la vista
    $avDetallesNasa=[
        'informacion'=>$oFotoNasa->getInformacion(),
        'titulo'=>$oFotoNasa->getTitulo(),
        'hdurl'=>$oFotoNasa->getHdurl(),
        'fechaFoto'=>$fechaFoto->format('d-m-Y')
    ];
    
    require_once $view['layout'];

?>
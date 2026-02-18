<?php

/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 05/02/2026
*   Uso:  api para buscar volumen de un departamento por codigo*/
    require_once '../config/confDBPDO.php';
    require_once '../model/DepartamentoPDO.php';
    require_once '../model/Departamento.php';
    require_once '../model/DBPDO.php';
    require_once '../core/231018libreriaValidacion.php';
    //variable para comporbar que todo va bien
    $entradaOK=true;
    
    //array para mostrar los mensajes de error
    $aErrores=[
        'codigoDepartamentoBuscado'=>''
    ];
    
    //si la api recibe el parametro
    
    if(isset($_REQUEST['codigoDepartamentoBuscado'])){
        $aErrores['codigoDepartamentoBuscado']= validacionFormularios::comprobarAlfabetico($_REQUEST['codigoDepartamentoBuscado'],obligatorio:1);//validacion sintactica del campo descripcion
        foreach ($aErrores as $clave => $valor){
            if($valor!=null){
                $entradaOK=false;
            }
        }
    }
    
    //si la validacion ha ido bien, proseguimos
    if($entradaOK){
        $oDepartamentoBuscado= DepartamentoPDO::buscaDepartamentoPorCod($_REQUEST['codigoDepartamentoBuscado']);
        $aDepartamento=[];
        if($oDepartamentoBuscado!=null){
            $aDepartamento[]=[
                'codDepartamento'=>$oDepartamentoBuscado->getCodDepartamento(),
                'volumenDepartamento'=>$oDepartamentoBuscado->getVolumenDeNegocio()
            ];
        }
        print_r(json_encode($aDepartamento,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }else{
        echo $aErrores['codigoDepartamentoBuscado'];
    }
    
    ?>
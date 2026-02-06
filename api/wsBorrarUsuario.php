<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 05/02/2026
*   Uso:  api para buscar usuarios por descripcion*/
    require_once '../config/confDBPDO.php';
    require_once '../model/UsuarioPDO.php';
    require_once '../model/Usuario.php';
    require_once '../model/DBPDO.php';
    require_once '../core/231018libreriaValidacion.php';
    //variable para comporbar que todo va bien
    $entradaOK=true;
    
    //array para mostrar los mensajes de error
    $aErrores=[
        'codigoUsuarioBuscado'=>''
    ];
    
    //si la api recibe el parametro
    
    if(isset($_REQUEST['codigoUsuarioBuscado'])){
        $aErrores['codigoUsuarioBuscado']= validacionFormularios::comprobarAlfabetico($_REQUEST['codigoUsuarioBuscado'],obligatorio:1);//validacion sintactica del campo descripcion
        foreach ($aErrores as $clave => $valor){
            if($valor!=null){
                $entradaOK=false;
            }
        }
    }
    //si la validacion ha ido bien, proseguimos
    if($entradaOK){
        $oUsuarioRecibido= UsuarioPDO::buscaUsuarioPorCod($_REQUEST['codigoUsuarioBuscado']??'');
        if($oUsuarioRecibido!=null){
            $json=json_encode($oUsuarioRecibido,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            if ($json === false) {
                echo 'json dio error: ';
                echo json_last_error_msg();
            } else {
                echo 'json NO dio error';
                echo $json;
            }
        }else{
            echo 'usuarioSiEsNull';
            $aErrores['codigoUsuarioBuscado']='No existe un usuario con el codigo enviado';
        }
        
    }else{
        echo $aErrores['codigoUsuarioBuscado'];
    }
    
    ?>
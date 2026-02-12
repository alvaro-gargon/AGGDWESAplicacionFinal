<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 09/02/2026
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
        $bUsuarioEliminado= UsuarioPDO::borrarUsuario($_REQUEST['codigoUsuarioBuscado']);
        if($bUsuarioEliminado==false){
            $aErrores['codigoUsuarioBuscado']='No existe un usuario con el codigo enviado';
        }else{
            echo json_encode(["usuarioEliminado" => $bUsuarioEliminado]);
        }
    }else{
        echo $aErrores['codigoUsuarioBuscado'];
    }
    
    ?>
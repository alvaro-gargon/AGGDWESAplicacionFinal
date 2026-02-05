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
        'descripcionUsuariosBuscada'=>''
    ];
    
    //si la api recibe el parametro
    if(isset($_REQUEST['descripcionUsuariosBuscada'])){
        $aErrores['descripcionUsuariosBuscada']= validacionFormularios::comprobarAlfabetico($_REQUEST['descripcionUsuariosBuscada']);//validacion sintactica del campo descripcion
        foreach ($aErrores as $clave => $valor){
            if($valor!=null){
                $entradaOK=false;
            }
        }
    }else{
        $entradaOK=false;
    }
    
    //si la validacion ha ido bien, proseguimos
    if($entradaOK){
        $aUsuariosRecibidos= UsuarioPDO::buscaUsuariosPorDesc($_REQUEST['descripcionUsuariosBuscada']??'');
        $aUsuarios=[];
        if($aUsuariosRecibidos!=null){
            foreach ($aUsuariosRecibidos as $oUsuario){
                $aUsuarios[]=[
                    'codUsuario'=>$oUsuario->getCodUsuario(),
                    'password'=>$oUsuario->getPassword(),
                    'descUsuario'=>$oUsuario->getDescUsuario(),
                    'numConexiones'=>$oUsuario->getNumAccesos(),
                    'fechaHoraUltimaConexion'=>$oUsuario->getFechaHoraUltimaConexion(),
                    'perfil'=>$oUsuario->getPerfil()
                ];
            }
        }
        print_r(json_encode($aUsuarios));
    }else{
        echo $aErrores['descripcionUsuariosBuscada'];
    }
    
    ?>
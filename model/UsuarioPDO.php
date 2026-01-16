<?php

/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 18/12/2025
*   Uso:  clase UsuarioPDO con sus metodos*/

require_once 'Usuario.php';
require_once 'DBPDO.php';
class UsuarioPDO {

    /**
     * funcion que comprueba si el usuario existe mediante una consulta sql
     * @param string $codUsuario
     * @param string $password
     * @return \Usuario
     */
    public static function validarUsuario($codUsuario,$password) {
        $oUsuario=null;
        $consultaValidar = <<<CONSULTA
            SELECT *
            FROM T01_Usuario 
            WHERE T01_CodUsuario= '{$codUsuario}' AND 
            T01_Password = sha2('{$codUsuario}{$password}',256)
            CONSULTA;
        
        $resultado= DBPDO::ejecutaConsulta($consultaValidar);
        
        if($resultado->rowCount()>0){
            $oResultado=$resultado->fetchObject();
            $oUsuario=new Usuario(
                $oResultado->T01_CodUsuario,
                $oResultado->T01_Password,
                $oResultado->T01_DescUsuario,
                $oResultado->T01_NumConexiones,
                $oResultado->T01_FechaHoraUltimaConexion,
                $oResultado->T01_FechaHoraUltimaConexionAnterior=null,
                $oResultado->T01_Perfil
            );
        }
        return $oUsuario;
    }
    
    /**
     * funcion que actualiza las fechas de las conexiones del usuario activo
     * @param Usuario $oUsuarioAActualizar
     */
    public static  function actualizarUltimaConexion($oUsuarioAActualizar){
        //actualizamos en la base de datos la fecha de la conexion y el numero de estas
        date_default_timezone_set('Europe/Madrid');
        $consultaActualizar = <<<CONSULTA
            UPDATE T01_Usuario
            SET T01_FechaHoraUltimaConexion = NOW(),
                T01_NumConexiones = T01_NumConexiones + 1
            WHERE T01_CodUsuario= '{$oUsuarioAActualizar->getCodUsuario()}'
            CONSULTA;
        //ejecutamos la consulta
        DBPDO::ejecutaConsulta($consultaActualizar);
        
        //actualizamos la propiedad de la clase que no esta en la base de datos
        $oUsuarioAActualizar->setFechaHoraUltimaConexionAnterior(new DateTime($oUsuarioAActualizar->getFechaHoraUltimaConexion()));
        //ahora se actualiza el usuario en memoria
        $oUsuarioAActualizar->setNumAccesos($oUsuarioAActualizar->getNumAccesos()+1);
        $oUsuarioAActualizar->setFechaHoraUltimaConexion(new DateTime());
    }
    /**
     * funcion para dar de alta un usuario
     * @param string $codUsuario
     * @param string $password
     * @return \Usuario
     */
    public static function altaUsuario($codUsuario,$password,$descUsuario) {
        $oUsuario=null;
        $consultaComprobarCodigo = <<<CONSULTA
            SELECT *
            FROM T01_Usuario 
            WHERE T01_CodUsuario= '{$codUsuario}'
            CONSULTA;
        $resultado= DBPDO::ejecutaConsulta($consultaComprobarCodigo);
        if($resultado->rowCount()==0){
            $consultaAlta = <<<CONSULTA
            INSERT INTO T01_Usuario (T01_CodUsuario, T01_Password, T01_DescUsuario, T01_Perfil) 
            VALUES ('{$codUsuario}', SHA2('{$codUsuario}{$password}', 256), '{$descUsuario}', 'usuario')
            CONSULTA;
        
            DBPDO::ejecutaConsulta($consultaAlta);
            $oUsuario= self::validarUsuario($codUsuario, $password);
        }
        return $oUsuario;
    }
}

?>


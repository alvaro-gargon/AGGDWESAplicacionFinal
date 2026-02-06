<?php

/**  
 * Clase UsuarioPDO 
 *   Uso:  clase que usaremos para hacer opeeaciones con los usuarios
 * @author Alvaro Garcia Gonzalez
 * @since 18/12/2025
 * @package model
 */

require_once 'Usuario.php';
require_once 'DBPDO.php';

class UsuarioPDO {

    /**
     * funcion que comprueba si el usuario existe mediante una consulta sql
     * @param string $codUsuario
     * @param string $password
     * @return \Usuario con la informacion si existe o null en caso contrario
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
     * funcion que actualiza las fechas de las conexiones del usuario activo. Modifica el usuario recibido, no tiene return
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
     * @param string $codUsuario , codigo que se le asignara al usuario
     * @param string $password , contraseña que se le asignara al usaurio
     * @return Object Usuario , ya sea el objeto usuario con la informacio como tal o con un valor null
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
    /**
     * Funcion dado un usuario actualizamos su descripcion
     * @param Usuario $oUsuario , objeto usuario que vamos a actualizar
     * @param string $descripcion , nueva descripcion que se le asignará al usuario
     * @return Usuario $oUsuario si la consulta se ejecuta correctamente o null en caso contrario
     */
    public static function modificarUsuario($oUsuario,$descripcion) {
        $consultaActualizar = <<<CONSULTA
            UPDATE T01_Usuario
            SET T01_DescUsuario = '{$descripcion}'
            WHERE T01_CodUsuario= '{$oUsuario->getCodUsuario()}'
            CONSULTA;
        $resultado= DBPDO::ejecutaConsulta($consultaActualizar);
        if ($resultado){
            $oUsuario->setDesUsuario($descripcion);
            return $oUsuario;
        }else{
            return null;
        }
    }
    /**
     * Funcion que sirve para cambiar una contraseña dado por el usuario
     * @param Usuario $oUsuario , usuario cuya contraseña va a cambiar
     * @param string $password , la nueva contraseña
     * @return Usuario $oUsuario si la consulta se ejecuta correctamente o null en caso contrario
     */
    public static function cambiarPassword($oUsuario,$password) {
        $consultaCambiarPassword = <<<CONSULTA
            UPDATE T01_Usuario
            SET T01_Password = SHA2('{$oUsuario->getCodUsuario()}{$password}', 256)
            WHERE T01_CodUsuario= '{$oUsuario->getCodUsuario()}'
            CONSULTA;
        
        $resultado=DBPDO::ejecutaConsulta($consultaCambiarPassword);
        if ($resultado){
            $oUsuario->setPassword($password);
            return $oUsuario;
        }else{
            return null;
        }
    }
    /**
     * Funcion que dada la descripcion busca uno o varios usuarios 
     * @param string $descUsuario , descripcion enviada por el usuario
     * @return array[Usuario] $aDepartamento , devuelve un array con los objetos usuario que concidan que el criterio de busquda
     */
    public static function buscaUsuariosPorDesc($descUsuario){
        //Usamos los porcentajes antes y despues de la descripcion para indicar que cualquier cosa puede ir antes o despues
        //Sirve tanto para si el usuario no escribe nada como para si escribime palabras que se encuentras en medio
        //Ejemplo: "mate" -> Departamento de matematicas 
        $consultaDescripcion = <<<CONSULTA
                select * from T01_Usuario
                where T01_DescUsuario like '%{$descUsuario}%'
                
                CONSULTA;
        $resultado= DBPDO::ejecutaConsulta($consultaDescripcion);
        
        $aUsuarios=[];
        //mientras que haya registros, crea un nuevo objeto departamento y lo mete en el array
        while ($registro = $resultado->fetchObject()){
            $aUsuarios[]= new Usuario(
                $registro->T01_CodUsuario,
                $registro->T01_Password,
                $registro->T01_DescUsuario,
                $registro->T01_NumConexiones,
                $registro->T01_FechaHoraUltimaConexion,
                null,
                $registro->T01_Perfil
            ); 
        }
        return $aUsuarios;
    }
     /**
     * Funcion que usara un codigo de usuario dado para buscar un usuario unico
     * @param  string $codUsuario , codigo que usaremos para buscar el usuario
     * @return Usuario $oUsuario, devuelve un objeto usuario, ya sea con informacion o con valor null si ha habido algun error
     */
    public static function buscaUsuarioPorCod($codUsuario){
        //consulta sql para seleccionar todos los datos del usuario
        $consultaCodigo = <<<CONSULTA
                select * from T01_Usuario
                where T01_CodUsuario='{$codUsuario}'
                
                CONSULTA;
        $resultado= DBPDO::ejecutaConsulta($consultaCodigo);
        
        $oUsuario=null;
        //si hay registro, crea el objeto departamento
        while ($registro = $resultado->fetchObject()){
            $oUsuario= new Usuario(
                $registro->T01_CodUsuario,
                $registro->T01_Password,
                $registro->T01_DescUsuario,
                $registro->T01_NumConexiones,
                $registro->T01_FechaHoraUltimaConexion,
                null,
                $registro->T01_Perfil
            ); 
        }
        return $oUsuario;
    }
    /**
     * Funcion que se usara para borrar a un usuario con el codigo proporcionado
     * @param String $codUsuario , que se usará para borrar a este
     * @return true|false true si la consulta se ha ejecutado correctamente, false en caso contrario
     */
    public static function bajaFisicaDepartamento($codUsuario) {
        $consultaBorrar = <<<CONSULTA
            DELETE FROM T01_Usuario WHERE T01_CodUsuario ='{$codUsuario}'
            CONSULTA;
        $resultado= DBPDO::ejecutaConsulta($consultaBorrar);
        if($resultado->rowCount()>0){return true;} else{return false;}
    }

}

?>


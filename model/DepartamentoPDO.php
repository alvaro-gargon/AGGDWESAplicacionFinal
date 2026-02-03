<?php

/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 02/02/2026
*   Uso:  clase DepartamentoPDO con sus metodos para hacer las operaciones pertinentes en el controlador*/

require_once 'Departamento.php';
require_once 'DBPDO.php';
/**
 * Clase que usaremos para hacer operaciones con los objetos departamentos
 */
class DepartamentoPDO{
    
    /**
     * Funcion que usara un codigo de departamento dado para busacar un departamento unico
     * @param  $codDepartamento , codigo que usaremos para buscar el departamento
     * @return $oDepartamento, devuelve un objeto departamento, ya sea con informacion o con valor null si ha habido algun error
     */
    public static function buscaDepartamentoPorCod($codDepartamento){
        //consulta sql para seleccionar todos los datos del departamento
        $consultaDescripcion = <<<CONSULTA
                select * from T02_Departamento
                where T02_CodDepartamento='{$codDepartamento}'
                
                CONSULTA;
        $resultado= DBPDO::ejecutaConsulta($consultaDescripcion);
        
        $oDepartamento=null;
        //si hay registro, crea el objeto departamento
        while ($registro = $resultado->fetchObject()){
            $oDepartamento= new Departamento(
                $registro->T02_CodDepartamento,
                $registro->T02_DescDepartamento,
                $registro->T02_FechaCreacionDepartamento,
                $registro->T02_VolumenDeNegocio,
                $registro->T02_FechaBajaDepartamento
            ); 
        }
        return $oDepartamento;
        
        
    }
    /**
     * Funcion que dada la descripcion busca uno o varios departamentos que
     * @param $descDepartamento , descripcon enviada por el usuario
     * @return $aDepartamento , devuelve un array con los objetos departentos que concidan que el criterio de busquda
     */
    public static function buscaDepartamentoPorDesc($descDepartamento){
        //Usamos los porcentajes antes y despues de la descripcion para indicar que cualquier cosa puede ir antes o despues
        //Sirve tanto para si el usuario no escribe nada como para si escribime palabras que se encuentras en medio
        //Ejemplo: "mate" -> Departamento de matematicas 
        $consultaDescripcion = <<<CONSULTA
                select * from T02_Departamento
                where T02_DescDepartamento like '%{$descDepartamento}%'
                
                CONSULTA;
        $resultado= DBPDO::ejecutaConsulta($consultaDescripcion);
        
        $aDepartamentos=[];
        //mientras que haya registros, crea un nuevo objeto departamento y lo mete en el array
        while ($registro = $resultado->fetchObject()){
            $aDepartamentos[]= new Departamento(
                $registro->T02_CodDepartamento,
                $registro->T02_DescDepartamento,
                $registro->T02_FechaCreacionDepartamento,
                $registro->T02_VolumenDeNegocio,
                $registro->T02_FechaBajaDepartamento
            ); 
        }
        return $aDepartamentos;
    }
    /**
     * Funcion usada para modificar los campos descripcion y volumen de negocio de un departamento dado
     * @param $oDepartamento , objeto departamento que sera el que modificaremos
     * @param $descripcionDepartamento , descripcion recibida para modificar el departamento
     * @param $volumenNegocio , volumen de negocio dado para modificar el departamento, si este campo esta vacio, el volumen no cambia
     * @return objeto departamento si la consulta sql se ha ejecutado correctamente o null sino
     */
    public static function modificarDepartamento($oDepartamento,$descripcionDepartamento,$volumenNegocio) {
        
        if($volumenNegocio==''){
            $volumenNegocio=$oDepartamento->getVolumenDeNegocio();
        }
        
        //consulta preparada para actualizar en la base de datos con los datos necesarios
        $consultaModificar = <<<CONSULTA
                UPDATE T02_Departamento SET 
                T02_DescDepartamento ='{$descripcionDepartamento}',
                T02_VolumenDeNegocio ={$volumenNegocio}
                WHERE T02_CodDepartamento = '{$oDepartamento->getCodDepartamento()}'
                
                CONSULTA;
        $resultado= DBPDO::ejecutaConsulta($consultaModificar);
        //si la consulta se ha ejecutado correctamente
        if($resultado){
            //actualizamos el objeto departamento
            $oDepartamento->setDesDepartamento($descripcionDepartamento);
            $oDepartamento->setVolumenDeNegocio($volumenNegocio);
            return $oDepartamento;
        }else{
            return null;
        }
    }
    /**
     * Funcion diseñada para dar de alta un nuevo departamento
     * @param String $codigoDepartamento , codigo del nuevo departamento
     * @param String $descripcionDepartamento , descripcion del nuevo departamento
     * @param Float $volumenNegocio , volumen de negocio del nuevo apartamento
     * @return Obejto departamento si se ha procedido exitosamente o null en caso contrario
     */
    public static function altaDepartamento($codigoDepartamento,$descripcionDepartamento,$volumenNegocio){
        $oDepartamento=null;
        
        //situamos la zona horaria actual a la local para la creacion del departamento
        date_default_timezone_set('Europe/Madrid');
        
        $consultaAlta = <<<CONSULTA
        INSERT INTO T02_Departamento  
        VALUES ('{$codigoDepartamento}', '{$descripcionDepartamento}', {$volumenNegocio}, NOW(),null)
        CONSULTA;

        DBPDO::ejecutaConsulta($consultaAlta);
        $oDepartamento= self::validarCodigo($codigoDepartamento);
        if($oDepartamento!=null){
            return $oDepartamento;
        }else{
            return null;
        }
    } 
    /**
     * funcion que comprueba si el departamento existe mediante una consulta sql
     * @param string $codDepartamento
     * @return Obejct Departamento con la informacion si existe o null en caso contrario
     */
    public static function validarCodigo($codDepartamento) {
        $oDepartamento=null;
        $consultaValidar = <<<CONSULTA
            SELECT *
            FROM T02_Departamento
            WHERE T02_CodDepartamento= '{$codDepartamento}'
            CONSULTA;
        
        $resultado= DBPDO::ejecutaConsulta($consultaValidar);
        
        if($resultado->rowCount()>0){
            $oResultado=$resultado->fetchObject();
            $oDepartamento=new Departamento(
                $oResultado->T02_CodDepartamento,
                $oResultado->T02_DescDepartamento,
                $oResultado->T02_VolumenDeNegocio,
                $oResultado->T02_FechaCreacionDepartamento,
                $oResultado->T02_FechaBajaDepartamento=null
            );
        }
        return $oDepartamento;
    }
}
?>

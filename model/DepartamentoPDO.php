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
}
?>

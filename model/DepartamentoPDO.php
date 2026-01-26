<?php

/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 23/01/2026
*   Uso:  clase DepartamentoPDO con sus metodos para hacer las operaciones pertinentes en el controlador*/

require_once 'Departamento.php';
require_once 'DBPDO.php';

class DepartamentoPDO{
    
    
    public static function buscaDepartamentoPorCod($codDepartamento){
        
        
        
    }
    /**
     * 
     * @param string $descDepartamento , descripcon enviada por el usuario
     * @return aDepartamento , devuelve un array con los departentos que concidan que el criterio de busquda
     */
    public static function buscaDepartamentoPorDesc($descDepartamento){
        //Usamos los porcentajes antes y despues de la descripcion para indicar que cualquier cosa puede ir antes o despues
        //Sirve tanto para si el usuario no escribe nada como para si escribime palabras que se encuentras en medio
        //Ejemplo: "mate" -> Departamento de matematicas 
        $descAConsultar='%'.$descDepartamento.'%';
        $consultaDescripcion = <<<CONSULTA
                select * from T02_Departamento
                where T02_DescDepartamento like {$descAConsultar};
                
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
}
?>

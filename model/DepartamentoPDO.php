<?php

/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 23/01/2026
*   Uso:  clase DepartamentoPDO con sus metodos para hacer las operaciones pertinentes en el controlador*/

require_once 'Departamento.php';
require_once 'DBPDO.php';

class DepartamentoPDO{
    
    
    public static function buscaDepartamentoPorCod($codDepartamento){
        
        
        
    }
    
    public static function buscaDepartamentoPorDesc($descDepartamento){
        $descAConsultar='%'.$descDepartamento.'%';
        $consultaDescripcion = <<<CONSULTA
                select * from T02_Departamento
                where T02_DescDepartamento like {$descAConsultar};
                
                CONSULTA;
        $resultado= DBPDO::ejecutaConsulta($consultaDescripcion);
        
        if($resultado->rowCount()>0){
            return $resultado;
        }else{
            return null;        
            
        }
    }
}
?>

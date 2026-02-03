<?php 
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 23/01/2026
*   Uso:  clase Departamento con su constructor y sus atributos*/

/**
 * Clase Departamento usada para la construcción de los objetos departamentos 
 */
class Departamento {
    private $codDepartamento;
    private $descDepartamento;
    private $fechaCreacionDepartamento;
    private $volumenDeNegocio;
    private $fechaBajaDepartamento;

    public function __construct($codDepartamento,$descDepartamento,$fechaCreacionDepartamento,$volumenDeNegocio,$fechaBajaDepartamento=null) {
        $this->codDepartamento =$codDepartamento;
        $this->descDepartamento =$descDepartamento;
        $this->fechaCreacionDepartamento =$fechaCreacionDepartamento;
        $this->volumenDeNegocio =$volumenDeNegocio;
        $this->fechaBajaDepartamento =$fechaBajaDepartamento;
    }
    
    public function getCodDepartamento() {
        return $this->codDepartamento;
    }
    
    public function getDescDepartamento() {
        return $this->descDepartamento;
    }
    
    public function getFechaCreacionDepartamento() {
        return $this->fechaCreacionDepartamento;
    }
    
    public function getVolumenDeNegocio() {
        return $this->volumenDeNegocio;
    }
    
    public function getFechaBajaDepartamento() {
        return $this->fechaBajaDepartamento;
    }
     
    public function setCodDepartamento($codDepartamento){
        $this->codDepartamento=$codDepartamento;
    }
    
    public function setDesDepartamento($descDepartamento){
        $this->descDepartamento=$descDepartamento;
    }
    
    public function setFechaCreacionDepartamento($fechaCreacionDepartamento){
        $this->fechaCreacionDepartamento=$fechaCreacionDepartamento;
    }
    
    public function setVolumenDeNegocio($volumenDeNegocio) {
        $this->volumenDeNegocio=$volumenDeNegocio;
    }
    
    public function setFechaBajaDepartamento($fechaBajaDepartamento){
        $this->fechaBajaDepartamento=$fechaBajaDepartamento;
    }
}

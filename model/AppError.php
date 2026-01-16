<?php

/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 15/01/2026
*   Uso:  clase AppError con sus metodos*/

//agradecimientos a Vero por la construcción de la clase

class AppError{
    private $codError;
    private $descError;
    private $archivoError;   
    private $lineaError;

    public function __construct($codError, $descError, $archivoError, $lineaError) {
        $this->codError = $codError;
        $this->descError = $descError;
        $this->archivoError = $archivoError;
        $this->lineaError = $lineaError;
    }

    //getters y setters
    public function getCodError(){
        return $this->codError;
    }
    public function getDescError(){
        return $this->descError;
    }
    public function getArchivoError(){
        return $this->archivoError;
    }
    public function getLineaError(){
        return $this->lineaError;
    }
   
    public function setCodError($codError){
        $this->codError=$codError;
    }
    public function setDescError($descError){
        $this->descError=$descError;
    }
    public function setArchivoError($archivoError){
        $this->archivoError=$archivoError;
    }
    public function setLineaError($lineaError){
        $this->lineaError=$lineaError;
    }
}

?>
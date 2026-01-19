<?php

/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 19/01/2026
*   Uso:  clase para gestionar el uso de la api de la nasa y la foto que usaremos*/

class FotoNasa {
    private $titulo;
    private $url;
    private $fecha;

    public function __construct($titulo, $url, $fecha) {
        $this->titulo = $titulo;
        $this->url = $url;
        $this->fecha = $fecha;
    }
    
    public function getTitulo() { 
        return $this->titulo; 
    }
    public function getUrl() { 
        return $this->url; 
    }
    public function getfecha() { 
        return $this->fecha; 
    }
}

?>
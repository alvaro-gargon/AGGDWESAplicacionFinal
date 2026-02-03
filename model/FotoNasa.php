<?php

/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 19/01/2026
*   Uso:  clase para gestionar el uso de la api de la nasa y la foto que usaremos*/
/**
 * Clase que usaremos para crear los objetos de las fotos de la nasa
 */
class FotoNasa {
    private $titulo;
    private $url;
    private $fecha;
    private $informacion;
    private $hdurl;

    public function __construct($titulo, $url, $fecha,$informacion,$hdurl) {
        $this->titulo = $titulo;
        $this->url = $url;
        $this->fecha = $fecha;
        $this->informacion = $informacion;
        $this->hdurl = $hdurl;
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
    public function getInformacion() { 
        return $this->informacion; 
    }
    public function getHdurl() { 
        return $this->hdurl; 
    }
}

?>
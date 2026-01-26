<?php

/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 19/01/2026
*   Uso:  clase para gestionar el uso de las apis*/


class REST{
    const API_KEY_NASA = 'rsuRpl7KQp36SjhRODAJe7lw7lgiyeWUMwoAh8hw';

    public static function apiNasa($fecha){
            // accedemos a la url de la nasa
            //muchas gracias a Alvaro Allen por aclaracion
            $resultado = file_get_contents($url = "https://api.nasa.gov/planetary/apod?&date={$fecha}&api_key=" . self::API_KEY_NASA);
            $archivoApi=json_decode($resultado,true);
            //si el archivo se a descodificado correctamente, rotorna la foto
            if(isset($archivoApi)){
                $fotoNasa= new FotoNasa($archivoApi['title'],$archivoApi['url'], $archivoApi['date'], $archivoApi['explanation'], $archivoApi['hdurl']);
                return $fotoNasa;
            }
    }
}
?>
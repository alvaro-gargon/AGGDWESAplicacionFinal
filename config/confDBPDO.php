<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


    //utilizo el port=3306 porque sino en el entorno de casa intenta conectar a tarves de ipv6 y da error
    define('DNS' ,'mysql:host=192.168.1.134;port=3306;dbname=DBAGGDWESAplicacionFinal;'); //variable para el entorno en casa
    //define('DNS', 'mysql:host=localhost;dbname=DBAGGDWESAplicacionFinal'); //variable para explotacion
    //define('DNS', 'mysql:host=10.199.11.252;dbname=DBAGGDWESAplicacionFinal');//varibale para el entorno de clase
    define('USERNAME', 'userAGGDWESAplicacionFinal');
    define('PASSWORD', 'paso');
    //define('PASSWORD', 'Paso,12345678910');//la contraseña es la de la base de datos de plesk

?>
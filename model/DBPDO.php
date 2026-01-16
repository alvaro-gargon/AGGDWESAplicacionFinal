<?php
/*  Nombre: Alvaro Garcia Gonzalez
*   Fecha: 18/12/2025
*   Uso:  clase DBPDO con su metodo*/
require_once 'config/confDBPDO.php';

class DBPDO {

  public static function ejecutaConsulta($sentenciaSQL,$parametros=null) {
    try{
        $miDB=new PDO(DNS,USERNAME,PASSWORD);
        $consultaPreparada=$miDB->prepare($sentenciaSQL);
        $consultaPreparada->execute($parametros);
        return $consultaPreparada;
    }catch(PDOException $exception){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'error';
        $_SESSION['error'] = new AppError($exception->getCode(),$exception->getMessage(),$exception->getFile(),$exception->getLine());
        header('Location: indexLoginLogoff.php');
        exit;
    }finally{
        unset($miDB);
    }
  }
}
?>
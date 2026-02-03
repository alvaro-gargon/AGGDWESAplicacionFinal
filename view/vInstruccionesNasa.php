<form method="post">
    <button class="volver" name="VOLVER">VOLVER</button>
</form>
<div class="containerInstrucciones">
    <p class="infoApi">
        Detallo las instrucciones que he seguido para usar esta api:<br>
        Lo primero ha sido solicitar una clave de uso a la propia nasa: https://api.nasa.gov/?ref=itsfoss.com <br>
        Una vez con la clave, en una clase del Modelo (llamada REST)la he solicitado siguiendo la siguiente estructura <br>
        Primero la url:https://api.nasa.gov/planetary/apod?, a la que le añado el parametro "date" para poder usar más fotos, no solo la del dia actual, y finalmente otro
        parámetro llamado "api_key" donde introduzco mi clave. Los parametros los uno a la url con el caracter &<br>
        Resultado final: https://api.nasa.gov/planetary/apod?&date={$fecha}&api_key=" . self::API_KEY_NASA
    </p>
</div>


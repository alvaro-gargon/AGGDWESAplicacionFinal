<form method="post">
    <p id="arribaDerecha"><button class="login" name="LOGOFF">LOGOFF</button></p>
</form>
<h2 class="mensaje">Bienvenido/a al inicio privado de la aplicacion, <?php echo $avInicioPrivado['descUsuario']; ?></h2>
    <div class="mensaje">
<?php
    if ($avInicioPrivado['numConexiones'] <= 1) {
        echo "¡Esta es tu primera conexión!<br>";
    } else {
        // Si fechaAnterior ya es un objeto DateTime no hace falta hacer el "new DateTime", se puede usar:
        if ($avInicioPrivado['fechaHoraUltimaConexionAnterior'] instanceof DateTime) {
            // Formatear la fecha y hora según la configuración regional española
            //IntlDateFormatter::FULL - muestra la fecha completa (día de la semana, día, mes y año)
            //IntlDateFormatter::LONG - mostraría la fecha (día, mes y año)
            //IntlDateFormatter::MEDIUM - mostraría la fecha abreviada (ejemplo:12 ene 2025)
            //IntlDateFormatter::NONE - no muestra la hora
            $oFormatoFecha = new IntlDateFormatter('es_ES', IntlDateFormatter::FULL, IntlDateFormatter::NONE);

            $fecha = $oFormatoFecha->format($avInicioPrivado['fechaHoraUltimaConexionAnterior']);
            $hora = $avInicioPrivado['fechaHoraUltimaConexionAnterior']->format('H:i');
            echo "Esta es la vez número " . $avInicioPrivado['numConexiones'] . " que se conecta.<br>";
            echo "Usted se conectó por última vez el <br>";
            echo $fecha . " a las " . $hora;
        }
    }
?>
    </div>
<form method="post">
    <button class="detalle" name="DETALLE">DETALLE</button>
</form>
<form method="post">
    <button class="detalle" name="WIP">WIP</button>
</form>
<form method="post">
    <button class="detalle" name="ERROR">Error</button>
</form>

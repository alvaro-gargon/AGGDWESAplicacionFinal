<form method="post">
    <button class="volver" name="VOLVER">VOLVER</button>
    <p id="arribaDerecha"><button class="login" name="LOGOFF">LOGOFF</button></p>
</form>
<form method="post" id="fotoNasa">
    <p>
        <label>Fecha de la foto de la nasa</label><br>
        <button name="ENVIARNASA">Enviar</button>
        <input type="date" name="fechaNasa"  value="<?php echo $avRest['fechaNasa'] ?>">
        <p class="error"><?php echo($aErrores['fechaNasa'])?></p>
        <img src="<?php echo ($avREST['fotoNasa']->getUrl()); ?>" alt="Foto de la Nasa"
    </p>
</form>

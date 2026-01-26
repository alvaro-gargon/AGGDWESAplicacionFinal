<form method="post">
    <button class="volver" name="VOLVER">VOLVER</button>
    <p id="arribaDerecha"><button class="login" name="LOGOFF">LOGOFF</button></p>
</form>
<form method="post" id="formNasa">
    <p>
        <label>Fecha de la foto de la nasa</label><br>
        <button name="ENVIARNASA">Enviar</button>
        <input type="date" name="fechaNasa"  value="<?php echo $avREST['fechaNasa'] ?>">
        <p><?php echo ($avREST['tituloFotoNasa']); ?></p>
        <p class="error"><?php echo($aErrores['fechaNasa'])?></p>
        <div class="fotoNasa">
            <img src="<?php echo ($avREST['urlNasa']); ?>" alt="Foto de la Nasa"
        </div>
        <div>
            <p><button class="botonGenerico" name="DETALLENASA">Foto detallada</button></p>
            <p><button class="botonGenerico" name="INSTRUCCIONNASA">Instrucciones</button></p>
        </div>
    </p>
</form>

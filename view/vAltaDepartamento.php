<form method="post" id="inicioSesion">
    <p>
        <h4>Alta departamento</h4>
    </p>
    <p>
        <label>Introduce código departamento</label><br>
        <input class="obligatorio" type="text" name="codigo" value="<?php echo $aRespuestas['codigo']; ?>">
        <p class="error"><?php echo($aErrores['codigo'])?></p>
    </p>
    <p>
        <label>Introduce la descripcion del departamento</label><br>
        <input class="obligatorio" type="text" name="descripcion" value="<?php echo $aRespuestas['descripcion']; ?>">
        <p class="error"><?php echo($aErrores['descripcion'])?></p>
    </p>
    <p>
        <label>Introduce el volumen de negocio inicial</label><br>
        <input class="obligatorio" type="text" name="volumen" value="<?php echo $aRespuestas['volumen']; ?>">
        <p class="error"><?php echo($aErrores['volumen'])?></p>
    </p>
    <button class="botonGenericoFormulario" type="submit" name="ACEPTAR">ACEPTAR</button>
    <button class="botonGenericoFormulario" name="CANCELAR">CANCELAR</button>
</form>
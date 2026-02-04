<form method="post" id="inicioSesion">
    <p>
        <h3>CAMBIAR CONTRASEÑA</h3>
    </p>
        <label>Introduce contraseña nueva</label><br>
        <input class="obligatorio" type="password" name="contraseña">
        <p class="error"><?php echo($aErrores['contraseña'])?></p>
    </p>
    <p>
        <label>Repite la contraseña</label><br>
        <input class="obligatorio" type="password" name="contraseñaRepetida">
        <p class="error"><?php echo($aErrores['contraseñaRepetida'])?></p>
    </p>
    
    <button class="botonGenericoFormulario" type="submit" name="ACEPTAR">ACEPTAR</button>
    <button class="botonGenericoFormulario" name="CANCELAR">CANCELAR</button>
</form>
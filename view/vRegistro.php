<form method="post" id="inicioSesion">
    <p>
        REGISTRO
    </p>
    <p>
        <label>Introduce nombre de usuario</label><br>
        <input class="obligatorio" type="text" name="usuario">
        <p class="error"><?php echo($aErrores['usuario'])?></p>
    </p>
    <p>
        <label>Introduce tu nombre completo</label><br>
        <input class="obligatorio" type="text" name="descripcion">
        <p class="error"><?php echo($aErrores['descripcion'])?></p>
    </p>
    <p>
        <label>Introduce contraseña</label><br>
        <input class="obligatorio" type="password" name="contraseña">
    </p>
    <p>
        <label>Repite la contraseña</label><br>
        <input class="obligatorio" type="password" name="contraseñaRepetida">
    </p>
    <p>
        <label>Introduce la pregunta de seguridad (todo en minuscula, por favor)</label><br>
        <input class="obligatorio" type="text" name="preguntaSeguridad">
    </p>
    <button class="botonGenericoFormulario" type="submit" name="ACEPTAR">ACEPTAR</button>
    <button class="botonGenericoFormulario" name="CANCELAR">CANCELAR</button>
</form>
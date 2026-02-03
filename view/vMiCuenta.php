<form method="post" id="inicioSesion">
    <p>
        <h3 class="editar">Editar mi Cuenta</h3>
    </p>
    <p>
        <label>Código de usuario</label><br>
        <input disabled type="text" name="usuario">
    </p>
    <p>
        <label>Introduce tu nombre completo</label><br>
        <input class="obligatorio" type="text" name="descripcion">
        <p class="error"><?php echo($aErrores['descripcion'])?></p>
    </p>
    <p>
        <label>Cambiar la contraseña</label><br>
        <button class="login" name="CONTRASEÑA">MI CUENTA</button>
    </p>
    <p>
        <label>Perfil</label><br>
        <input disabled type="text" name="perfil">
    </p>
    <p>
        <label>Numero de conexiones</label><br>
        <input disabled type="text" name="conexiones">
    </p>
    <p>
        <label>Fecha de la última conexion</label><br>
        <input disabled type="date" name="fechaUltimaConexion">
    </p>
    <button class="botonGenericoFormulario" type="submit" name="ACEPTAR">ACEPTAR</button>
    <button class="botonGenericoFormulario" name="CANCELAR">CANCELAR</button>
</form>
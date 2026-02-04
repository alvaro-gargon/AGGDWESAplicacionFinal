<form method="post" id="inicioSesion">
    <p>
        <h3 class="editar">Editar mi Cuenta</h3>
    </p>
    <p>
        <label>Código de usuario</label><br>
        <input disabled type="text" name="usuario" value="<?php echo $avMiCuenta['codigo']; ?>">
    </p>
    <p>
        <label>Introduce tu nombre completo</label><br>
        <input class="obligatorio" type="text" name="descripcion" value="<?php echo $avMiCuenta['descripcion']; ?>">
        <p class="error"><?php echo($aErrores['descripcion'])?></p>
    </p>
    <p>
        <label>Cambiar la contraseña</label><br>
        <button class="botonGenericoFormulario botonLargo" name="CONTRASEÑA">CAMBIAR CONTRASEÑA</button>
    </p>
    <p>
        <label>Perfil</label><br>
        <input disabled type="text" name="perfil" value="<?php echo $avMiCuenta['perfil']; ?>">
    </p>
    <p>
        <label>Numero de conexiones</label><br>
        <input disabled type="text" name="conexiones" value="<?php echo $avMiCuenta['conexiones']; ?>">
    </p>
    <p>
        <label>Fecha y hora de la última conexion</label><br>
        <input disabled type="text" name="fechaUltimaConexion" value="<?php echo $avMiCuenta['fechaUltimaConexion']; ?>">
    </p>
    <button class="botonGenericoFormulario" type="submit" name="ACEPTAR">ACEPTAR</button>
    <button class="botonGenericoFormulario" name="CANCELAR">CANCELAR</button>
</form>
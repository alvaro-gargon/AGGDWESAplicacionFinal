<form method="post" id="inicioSesion">
    <p>
        <h3 class="editar">Borrar mi Cuenta</h3>
    </p>
    <p>
        <label>Código de usuario</label><br>
        <input disabled type="text" name="usuario" value="<?php echo $avMiCuenta['codigo']; ?>">
        <p class="error"><?php echo($aErrores['codUsuario'])?></p>
    </p>
    <p>
        <label>Nombre completo</label><br>
        <input disabled type="text" name="descripcion" value="<?php echo $avMiCuenta['descripcion']; ?>">
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
    <h4>¿Estas seguro que quieres eliminar esta cuenta? La información no podrá ser recuperada.</h4>
    <button class="botonGenericoFormulario" type="submit" name="ACEPTAR">ACEPTAR</button>
    <button class="botonGenericoFormulario" name="CANCELAR">CANCELAR</button>
</form>
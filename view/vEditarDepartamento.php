<form method="post" id="inicioSesion">
    <p>
        <h3 class="editar">Editar mi Cuenta</h3>
    </p>
    <p>
        <label>Código de departamento</label><br>
        <input disabled type="text" name="usuario">
    </p>
    <p>
        <label>Descripción de departamento</label><br>
        <input class="obligatorio" type="text" name="descripcion">
        <p class="error"><?php echo($aErrores['descripcion'])?></p>
    </p>
    <p>
        <label>Volumen de negocio</label><br>
        <input type="text" name="volumen">
    </p>
    <p>
        <label>Fecha de creacion</label><br>
        <input disabled type="text" name="fechaCreacion">
    </p>
    <button class="botonGenericoFormulario" type="submit" name="ACEPTAR">ACEPTAR</button>
    <button class="botonGenericoFormulario" name="CANCELAR">CANCELAR</button>
</form>


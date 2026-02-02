<form method="post" id="inicioSesion">
    <p>
        <h3 class="editar">Editar mi Cuenta</h3>
    </p>
    <p>
        <label>Código de departamento</label><br>
        <input disabled type="text" name="usuario" value="<?php echo $_SESSION['codigoDepartamentoEnCurso']; ?>">
    </p>
    <p>
        <label>Descripción de departamento</label><br>
        <input <?php if($_SESSION['vistaEditarConsultarDepartamento']=='editar'){ ?>class="obligatorio" <?php }else{ echo 'disabled'; } ?> type="text" name="descripcion">
        <p class="error"><?php echo($aErrores['descripcion'])?></p>
    </p>
    <p>
        <label>Volumen de negocio</label><br>
        <input <?php if($_SESSION['vistaEditarConsultarDepartamento']=='editar'){echo 'disabled';} ?> type="text" name="volumen">
    </p>
    <p>
        <label>Fecha de creacion</label><br>
        <input disabled type="text" name="fechaCreacion">
    </p>
    <?php if($_SESSION['vistaEditarConsultarDepartamento']=='editar'){ ?>
    <button class="botonGenericoFormulario" type="submit" name="ACEPTAR">ACEPTAR</button>
    <button class="botonGenericoFormulario" name="CANCELAR">CANCELAR</button>
    <?php }else{
        echo '<button class="botonGenericoFormulario" name="VOLVER">VOLVER</button>';
    }
    ?>
</form>


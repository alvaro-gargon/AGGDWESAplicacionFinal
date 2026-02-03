<form method="post" id="inicioSesion">
    <p>
        <h3 class="editar">Editar departamento</h3>
    </p>
    <p>
        <label>Código de departamento</label><br>
        <input disabled type="text" name="usuario" value="<?php echo $avEditarConsultar['codigo'] ?>">
    </p>
    <p>
        <label>Descripción de departamento</label><br>
        <input <?php if($_SESSION['vistaEditarConsultarDepartamento']=='editar'){ ?>class="obligatorio" <?php }else{ echo 'disabled'; } ?> 
            type="text" name="descripcion" placeholder="<?php echo $avEditarConsultar['descripcion'] ?>">
        <p class="error"><?php echo($aErrores['descripcion'])?></p>
    </p>
    <p>
        <label>Volumen de negocio</label><br>
        <input <?php if($_SESSION['vistaEditarConsultarDepartamento']=='consultar'){echo 'disabled';} ?> type="text" name="volumen" 
            value="<?php echo $avEditarConsultar['volumenNegocio'] ?>">
        <p class="error"><?php echo($aErrores['volumenNegocio'])?></p>
    </p>
    <p>
        <label>Fecha de creacion</label><br>
        <input disabled type="text" name="fechaCreacion" value="<?php echo $avEditarConsultar['fechaCreacion']?>">
    </p>
    <?php if($_SESSION['vistaEditarConsultarDepartamento']=='editar'){ ?>
    <button class="botonGenericoFormulario" type="submit" name="ACEPTAR">ACEPTAR</button>
    <button class="botonGenericoFormulario" name="CANCELAR">CANCELAR</button>
    <?php }else{
        echo '<button class="botonGenericoFormulario" name="VOLVER">VOLVER</button>';
    }
    ?>
</form>


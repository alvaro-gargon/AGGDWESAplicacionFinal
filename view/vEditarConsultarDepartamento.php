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
        <input class="obligatorio" type="text" name="descripcion" placeholder="<?php echo $aRespuestas['descripcion']?$aRespuestas['descripcion']:$avEditarConsultar['descripcion'] ?>">
        <p class="error"><?php echo($aErrores['descripcion'])?></p>
    </p>
    <p>
        <label>Volumen de negocio</label><br>
        <input  type="text" name="volumenNegocio" value="<?php echo $aRespuestas['volumenNegocio']?$aRespuestas['volumenNegocio']:$avEditarConsultar['volumenNegocio'] ?>">
        <p class="error"><?php echo($aErrores['volumenNegocio'])?></p>
    </p>
    <p>
        <label>Fecha de creacion</label><br>
        <input disabled type="text" name="fechaCreacion" value="<?php echo $avEditarConsultar['fechaCreacion']?>">
    </p>
    <p>
        <label>Fecha de baja logica</label><br>
        <input disabled type="text" name="fechaCreacion" value="<?php echo $avEditarConsultar['fechaBajaLogica']?>">
    </p>
    <button class="botonGenericoFormulario" type="submit" name="ACEPTAR">ACEPTAR</button>
    <button class="botonGenericoFormulario" name="CANCELAR">CANCELAR</button>
</form>


<form method="post" id="inicioSesion">
    <p>
        <h4>Rehabilitacion de departamento</h4>
        <p class="error"><?php echo($aErrores['codigo'])?></p>
    </p>
    <p>
        <label>Código de departamento</label><br>
        <input disabled type="text" name="usuario" value="<?php echo $avRehabilitar['codigo'] ?>">
    </p>
    <p>
        <label>Descripción de departamento</label><br>
        <input disabled type="text" name="descripcion" placeholder="<?php echo $avRehabilitar['descripcion'] ?>">
    </p>
    <p>
        <label>Volumen de negocio</label><br>
        <input disabled type="text" name="volumen" value="<?php echo $avRehabilitar['volumenNegocio'] ?>">
    </p>
    <p>
        <label>Fecha de creacion</label><br>
        <input disabled type="text" name="fechaCreacion" value="<?php echo $avRehabilitar['fechaCreacion']?>">
    </p>
    <p>
        <label>Fecha de baja logica</label><br>
        <input disabled type="text" name="fechaCreacion" value="<?php echo $avRehabilitar['fechaBajaLogica']?>">
    </p>
    <h4>¿Estas seguro que quieres rehabilitar este departamento?</h4>
    <button class="botonGenericoFormulario" type="submit" name="ACEPTAR">ACEPTAR</button>
    <button class="botonGenericoFormulario" name="CANCELAR">CANCELAR</button>
</form>
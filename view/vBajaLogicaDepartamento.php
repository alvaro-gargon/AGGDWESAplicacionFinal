<form method="post" id="inicioSesion">
    <p>
        <h4>Baja lógica de departamento</h4>
        <p class="error"><?php echo($aErrores['codigo'])?></p>
    </p>
    <p>
        <label>Código de departamento</label><br>
        <input disabled type="text" name="usuario" value="<?php echo $avBajaLogica['codigo'] ?>">
    </p>
    <p>
        <label>Descripción de departamento</label><br>
        <input disabled type="text" name="descripcion" placeholder="<?php echo $avBajaLogica['descripcion'] ?>">
    </p>
    <p>
        <label>Volumen de negocio</label><br>
        <input disabled type="text" name="volumen" value="<?php echo $avBajaLogica['volumenNegocio'] ?>">
    </p>
    <p>
        <label>Fecha de creacion</label><br>
        <input disabled type="text" name="fechaCreacion" value="<?php echo $avBajaLogica['fechaCreacion']?>">
    </p>
    <p>
        <label>Fecha de baja logica</label><br>
        <input disabled type="text" name="fechaCreacion" value="<?php echo $avBajaLogica['fechaBajaLogica']?>">
    </p>
    <h4>¿Estas seguro que quieres dar de baja este departamento?</h4>
    <button class="botonGenericoFormulario" type="submit" name="ACEPTAR">ACEPTAR</button>
    <button class="botonGenericoFormulario" name="CANCELAR">CANCELAR</button>
</form>
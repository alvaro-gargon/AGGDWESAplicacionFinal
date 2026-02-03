<form method="post" id="inicioSesion">
    <p>
        <h4>Borrar departamento</h4>
        <h4>OJO: Vas a borrar el departamento lo que implica borrarlo de la base de datos <br>
        Los datos no se podran recuperar</h4>
        <p class="error"><?php echo($aErrores['codigo'])?></p>
    </p>
    <p>
        <label>Código de departamento</label><br>
        <input disabled type="text" name="usuario" value="<?php echo $avBorrar['codigo'] ?>">
    </p>
    <p>
        <label>Descripción de departamento</label><br>
        <input disabled type="text" name="descripcion" placeholder="<?php echo $avBorrar['descripcion'] ?>">
    </p>
    <p>
        <label>Volumen de negocio</label><br>
        <input disabled type="text" name="volumen" value="<?php echo $avBorrar['volumenNegocio'] ?>">
    </p>
    <p>
        <label>Fecha de creacion</label><br>
        <input disabled type="text" name="fechaCreacion" value="<?php echo $avBorrar['fechaCreacion']?>">
    </p>
    <h4>¿Estas seguro que quieres eliminar para siempre este departamento?</h4>
    <button class="botonGenericoFormulario" type="submit" name="ACEPTAR">ACEPTAR</button>
    <button class="botonGenericoFormulario" name="CANCELAR">CANCELAR</button>
</form>
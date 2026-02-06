<form method="post">
    <button class="volver" name="VOLVER">VOLVER</button>
    <p id="arribaDerecha"><button class="login" name="LOGOFF">LOGOFF</button></p>
</form>
<p class="textoApi"><?php echo $avDetallesNasa['titulo']; ?></p>
<p class="textoApi">Fecha: <?php echo $avDetallesNasa['fechaFoto']; ?></p>
<div class="fotoDetalleApi">
    <img src="<?php echo $avDetallesNasa['hdurl'];?>" alt="Foto">
</div>
<p class="infoApi"><?php echo $avDetallesNasa['informacion']; ?></p>
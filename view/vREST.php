<form method="post">
    <button class="volver" name="VOLVER">VOLVER</button>
    <p id="arribaDerecha"><button class="login" name="LOGOFF">LOGOFF</button></p>
</form>
<div class="apis">
    <form method="post" id="formNasa">
        <p>
            <label>Fecha de la foto de la nasa</label><br>
            <button name="ENVIARNASA">Enviar</button>
            <input type="date" name="fechaNasa"  value="<?php echo $avREST['fechaNasa'] ?>">
            <p><?php echo ($avREST['tituloFotoNasa']); ?></p>
            <p class="error"><?php echo($aErrores['fechaNasa'])?></p>
            <div class="fotoNasa">
                <img src="<?php echo ($avREST['urlNasa']); ?>" alt="Foto de la Nasa"/>
            </div>
            <div>
                <p><button class="botonGenerico" name="DETALLENASA">Foto detallada</button></p>
                <p><button class="botonGenerico" name="INSTRUCCIONNASA">Instrucciones</button></p>
            </div>
        </p>
    </form>
    <form method="post" id="formApiFrutas">
        <div>
            <label>Frutas</label>
            <button name="ENVIARFRUTA">Enviar</button>
            <select name="frutas">
                <option value="Apple" <?php if(isset($_SESSION['nombreFrutaBuscada'])&& $_SESSION['nombreFrutaBuscada']=='Apple'){echo 'selected';} ?>>Manzana</option>
                <option value="Strawberry" <?php if(isset($_SESSION['nombreFrutaBuscada'])&& $_SESSION['nombreFrutaBuscada']=='Strawberry'){echo 'selected';} ?>>Fresa</option>
                <option value="Banana" <?php if(isset($_SESSION['nombreFrutaBuscada'])&& $_SESSION['nombreFrutaBuscada']=='Banana'){echo 'selected';} ?>v>Platano</option>
                <option value="Pear" <?php if(isset($_SESSION['nombreFrutaBuscada'])&& $_SESSION['nombreFrutaBuscada']=='Pear'){echo 'selected';} ?>>Pera</option>
            </select>
            <p>Nombre en ingles:<?php echo $_SESSION['datosFrutaBuscada']['nombre'] ?? 'Aqui se mostrata el nombre de la fruta' ?></p>
            <p>Familia:<?php echo $_SESSION['datosFrutaBuscada']['familia'] ?? 'Aqui se mostrata la familia de la fruta' ?></p>
            <p>Calorias:<?php echo $_SESSION['datosFrutaBuscada']['calorias'] ?? 'Aqui se mostrata las calorias de la fruta' ?></p>
            <p>Azucares:<?php echo $_SESSION['datosFrutaBuscada']['azucares'] ?? 'Aqui se mostrata los azucares de la fruta' ?></p>
        </div>
    </form>
    <form method="post" id="formApiPropia">
        <div>
            <label>Codigo de Departamento</label><br>
            <button name="ENVIARPROPIA">Enviar</button>
            <select name="codDepartamento">
                <?php 
                foreach ($avDepartamentosREST as $codDepartamento){
                    $selected = (!empty($_SESSION['codigoDepartamentoBuscadoApi']) && $_SESSION['codigoDepartamentoBuscadoApi'] == $codDepartamento)
                                ? 'selected'
                                : '';
                    echo '<option value="'.$codDepartamento.'" '.$selected.'>'.$codDepartamento.'</option>';
                }
                    ?>
            </select>
            <p><?php echo $_SESSION['volumenDepartamentoApiEnUso'] ?? 'Aqui se mostrata el volumen de departamento' ?></p>
        </div>
    </form>
</div>


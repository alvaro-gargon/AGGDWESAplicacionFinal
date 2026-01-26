<form method="post">
    <button class="volver" name="VOLVER">VOLVER</button>
</form>

<form method="post">
    <input type="text" placeholder="Descripcion departamento..." name="descripcionBuscada" value="<?php echo $_REQUEST['descripcionBuscada']??'' ?>">
    <button class="volver" name="BUSCAR">BUSCAR</button>
</form>

<div class="mtoDepartamentos">
    <table class="principal">
        <tr>
            <th>Código</th><th>Descripcion</th><th>Fecha Creacion</th><th>Volumen Negocio</th><th>Fecha Baja</th><th>Opciones</th>
        </tr>
        <?php 
            foreach ($avDepartamento as $oDepartamento){
                echo '<tr>';
                    echo '<td>'. $avDepartamento['codDepartamento'] .'</td>';
                    echo '<td>'. $avDepartamento['descDepartamento'] .'</td>';
                    echo '<td>'. $avDepartamento['fechaCreacionDepartamento'] .'</td>';
                    echo '<td>'. $avDepartamento['volumenDeNegocio'] .'</td>';
                    echo '<td>'. $avDepartamento['fechaBajaDepartamento'] .'</td>';
                echo '</tr>';
            }
        ?>
    </table>
</div>
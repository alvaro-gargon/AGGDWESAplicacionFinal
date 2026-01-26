<form method="post">
    <button class="volver" name="VOLVER">VOLVER</button>
</form>

<form method="post" id="buscar">
    <input type="text" placeholder="Descripcion departamento..." name="descripcionBuscada" value="<?php echo $_SESSION['descBuscadaEnUso']??'' ?>">
    <button  name="BUSCAR">BUSCAR</button>
</form>

<div class="mtoDepartamentos">
    <table class="principal">
        <tr>
            <th>Código</th><th>Descripcion</th><th>Fecha Creacion</th><th>Volumen Negocio</th><th>Fecha Baja</th><th>Opciones</th>
        </tr>
        <?php 
            foreach ($avDepartamento as $aDepartamento){
                echo '<tr>';
                    echo '<td>'. $aDepartamento['codDepartamento'] .'</td>';
                    echo '<td>'. $aDepartamento['descDepartamento'] .'</td>';
                    echo '<td>'. $aDepartamento['fechaCreacionDepartamento'] .'</td>';
                    echo '<td>'. $aDepartamento['volumenDeNegocio'] .'</td>';
                    echo '<td>'. $aDepartamento['fechaBajaDepartamento'] .'</td>';
                echo '</tr>';
            }
        ?>
    </table>
</div>
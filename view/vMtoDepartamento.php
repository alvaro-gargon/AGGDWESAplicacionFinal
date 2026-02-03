<form method="post">
    <button class="volver" name="VOLVER">VOLVER</button>
</form>

<form method="post" id="buscar">
    <input type="text" placeholder="Descripcion departamento..." name="descripcionBuscada" value="<?php echo $_SESSION['descBuscadaEnUso']??'' ?>">
    <button  name="BUSCAR">BUSCAR</button>
    <button  name="AÑADIR">AÑADIR</button>
</form>

<form method="post">
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
                        echo '<td>'
                            . '<button  class="icono" name="EDITAR" value="'.$aDepartamento['codDepartamento'].'">&#9998;</button>'
                            . '<button class="icono" name="CONSULTAR" value="'.$aDepartamento['codDepartamento'].'">&#128065;</button>'
                            . '<button class="icono" name="BORRAR" value="'.$aDepartamento['codDepartamento'].'">&#128465;</button>'
                        . '</td>';
                    echo '</tr>';
                }
            ?>
        </table>
        
    </div>
</form>
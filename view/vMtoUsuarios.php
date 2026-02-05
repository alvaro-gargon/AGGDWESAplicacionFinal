<form method="post">
    <button class="volver" name="VOLVER">VOLVER</button>
</form>

<form method="post" id="buscar">
    <input type="text" placeholder="Descripcion usada..." name="descripcionBuscada" value="<?php echo $_SESSION['descBuscadaEnUso']??'' ?>">
    <button disabled name="BUSCAR">BUSCAR</button>
    <button disabled name="AÑADIR">AÑADIR</button>
</form>

<form method="post">
    <div class="mtoDepartamentos">
        <table class="principal">
            <tr>
                <th>Código</th><th>Descripcion</th><th>Conexiones</th><th>Fecha ultima conexion</th><th>Perfil</th><th>Opciones</th>
            </tr>
            <!-- comment 
            <?php 
                foreach ($avDepartamento as $aDepartamento){
                    echo '<tr>';
                        echo '<td>'. $aDepartamento['codDepartamento'] .'</td>';
                        echo '<td>'. $aDepartamento['descDepartamento'] .'</td>';
                        echo '<td>'. $aDepartamento['fechaCreacionDepartamento'] .'</td>';
                        echo '<td>'. $aDepartamento['volumenDeNegocio'] .'</td>';
                        echo '<td>'. $aDepartamento['fechaBajaDepartamento'] .'</td>';
                        echo '<td>'
                            . '<button disabled class="icono" name="EDITAR" value="'.$aDepartamento['codDepartamento'].'">&#9998;</button>'
                            . '<button disabled class="icono" name="CONSULTAR" value="'.$aDepartamento['codDepartamento'].'">&#128065;</button>'
                            . '<button disabled class="icono" name="BORRAR" value="'.$aDepartamento['codDepartamento'].'">&#128465;</button>'
                        . '</td>';
                    echo '</tr>';
                }
            ?>
            -->
        </table>
        
    </div>
</form>
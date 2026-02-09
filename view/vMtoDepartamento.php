
<form method="post">
    <section class="tituloPaginas"><h1>MANTENIMIENTO DE DEPARTAMENTOS</h1></section>
    <button class="volver" name="VOLVER">VOLVER</button>
</form>

<form method="post" id="buscar">
    <label for="estadoDepartamentos">Estado de departamento</label>
    <select name="estadoDepartamentos">
        <option value="todos" selected>TODOS</option>
        <option value="baja">ALTA</option>
        <option value="baja">BAJA</option>
    </select>
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
                        echo '<td>'. $aDepartamento['volumenDeNegocio'] .'€</td>';
                        echo '<td>'. $aDepartamento['fechaBajaDepartamento'] .'</td>';
                        echo '<td>'
                            . '<button  class="icono" name="EDITAR" value="'.$aDepartamento['codDepartamento'].'">&#9998;</button>'
                            . '<button class="icono" name="BORRAR" value="'.$aDepartamento['codDepartamento'].'">&#128465;</button>';
                                if($aDepartamento['fechaBajaDepartamento']==null){
                                    echo '<button class="icono rojo" name="BAJA" value="'.$aDepartamento['codDepartamento'].'"><i class="fas fa-calendar-times"></i></button>';
                                }else{
                                    echo '<button class="icono verde" name="REHABILITAR" value="'.$aDepartamento['codDepartamento'].'"><i class="fa-solid fa-calendar-check"></i></button>';
                                }
                        echo '</td>';
                    echo '</tr>';
                }
            ?>
        </table>
        
    </div>
</form>
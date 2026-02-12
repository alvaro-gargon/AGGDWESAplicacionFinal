
<form method="post">
    <section class="tituloPaginas"><h1>MANTENIMIENTO DE DEPARTAMENTOS</h1></section>
    <button class="volver" name="VOLVER">VOLVER</button>
</form>

<form method="post" id="buscar">
    <label for="numResultados">Numero de registros mostrados</label>
    <select class="selectsDepartamentos" name="numResultados">
        <option value="5" <?php if(isset($_SESSION['numeroResultadosDepartamentos'])){echo $_SESSION['numeroResultadosDepartamentos']==5?'selected':''; } ?>>5</option>
        <option value="10" <?php if(isset($_SESSION['numeroResultadosDepartamentos'])){echo $_SESSION['numeroResultadosDepartamentos']==10?'selected':''; } ?>>10</option>
        <option value="15" <?php if(isset($_SESSION['numeroResultadosDepartamentos'])){echo $_SESSION['numeroResultadosDepartamentos']==15?'selected':''; } ?>>15</option>
    </select>
    <label for="estadoDepartamentos">Estado de departamento</label>
    <select class="selectsDepartamentos" name="estadoDepartamentos">
        <option value="todos" <?php if(isset($_SESSION['estadoDepartamentos'])){echo $_SESSION['estadoDepartamentos']=='todos'?'selected':''; } ?>>TODOS</option>
        <option value="alta" <?php if(isset($_SESSION['estadoDepartamentos'])){ echo $_SESSION['estadoDepartamentos']=='alta'?'selected':'';} ?>>ALTA</option>
        <option value="baja" <?php if(isset($_SESSION['estadoDepartamentos'])){ echo $_SESSION['estadoDepartamentos']=='baja'?'selected':'';} ?>>BAJA</option>
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
        <div class="paginacion">
            <p class="pPaginacion">
                <button class="icono" name="paginaInicial"><i class="fa-solid fa-angles-left"></i></button>
                <button class="icono" name="paginaAtras"><i class="fa-solid fa-angle-left"></i></button>
                <?php echo $_SESSION['numPagina']; ?>|<?php echo $avMtoDepartamento['numPaginasTotal']; ?>
                <button class="icono" name="paginaSiguiente"><i class="fa-solid fa-angle-right"></i></button>
                <button class="icono" name="paginaFinal"><i class="fa-solid fa-angles-right"></i></button>
            </p>
        </div>
    </div>
</form>
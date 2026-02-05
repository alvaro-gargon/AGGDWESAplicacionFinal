<form method="post">
    <section class="tituloPaginas"><h1>MANTENIMIENTO DE USUARIOS</h1></section>
    <button class="volver" name="VOLVER">VOLVER</button>
</form>

<form method="post" id="buscar">
    <input type="text" placeholder="Descripcion usada..." name="descripcionUsuariosBuscada" value="<?php echo $_SESSION['descUsuariosBuscadaEnUso']??'' ?>">
</form>

<form method="post">
    <div class="mtoDepartamentos">
        <table class="principal">
            <tr>
                <th>Código</th><th>Descripcion</th><th>Conexiones</th><th>Fecha ultima conexion</th><th>Perfil</th><th>Opciones</th>
            </tr>
        </table>
        
    </div>
</form>

<script>
    var inputBuscar=document.getElementsByTagName("input");
    
    inputBuscar.addEventListener
</script>
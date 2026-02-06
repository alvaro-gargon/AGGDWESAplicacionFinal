<script type="module" src="webroot/js/Mto.Usuarios.js" defer></script>
<form method="post">
    <section class="tituloPaginas"><h1>MANTENIMIENTO DE USUARIOS</h1></section>
    <button class="volver" name="VOLVER">VOLVER</button>
</form>

<form method="post" id="buscar">
    <input id="busqueda" type="text" placeholder="Descripcion usada..." name="descripcionUsuariosBuscada" value="<?php echo $_SESSION['descUsuariosBuscadaEnUso']??'' ?>">
</form>

<form method="post">
    <div class="mtoDepartamentos">
        <table class="principal">
            <thead>
                <th>Código</th><th>Descripcion</th><th>Conexiones</th><th>Fecha ultima conexion</th><th>Perfil</th><th>Opciones</th>
            </thead>
            <tbody id="registrosUsuarios">
                
            </tbody>
        </table> 
    </div>
</form>
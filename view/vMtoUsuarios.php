<script type="module" src="webroot/js/consultarUsuarios.js" defer></script>
<script type="module" src="webroot/js/eliminarUsuario.js" defer></script>
<main id="vUsuarios">
    <form method="post">
        <section class="tituloPaginas"><h1>MANTENIMIENTO DE USUARIOS</h1></section>
        <button class="volver" name="VOLVER">VOLVER</button>
    </form>

    <form method="post" id="buscar">
        <input id="busqueda" type="text" placeholder="Descripcion usada..." name="descripcionUsuariosBuscada" value="<?php echo $_SESSION['descUsuariosBuscadaEnUso'] ?? '' ?>">
    </form>

    <form method="post">
        <div class="mtoDepartamentos">
            <table class="principal">
                <thead>
                    <tr><th>Código</th><th>Descripcion</th><th>Conexiones</th><th>Fecha ultima conexion</th><th>Perfil</th><th>Opciones</th></tr>
                </thead>
                <tbody id="registrosUsuarios">

                </tbody>
            </table> 
        </div>
    </form>
</main>

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
    //declaracion de variables de HTML sobre las que vamos a trabajar
    var inputBuscar=document.getElementsByTagName("input")[0];
    var tabla=document.getElementsByTagName("table")[0];
    //evento que se ejecuta cuando los usuarios escriben los eventos
    inputBuscar.addEventListener("input",(event)=>{
        fetch('api/wsBuscaUsuariosPorDescripcion.php?descripcionUsuariosBuscada=<?php echo $_REQUEST['descripcionUsuariosBuscada'];?>');
        then((response)=>responde.json())
        .then((data)=>{
            console.log(data);
        })
    })
</script>
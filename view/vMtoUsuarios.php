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

<script>
    //declaracion de variables de HTML sobre las que vamos a trabajar
    var inputBuscar=document.getElementById("busqueda");
    var tabla=document.getElementsByTagName("table")[0];
    var registros=document.getElementById("registrosUsuarios");
    //evento que se ejecuta cuando los usuarios escriben los eventos
    inputBuscar.addEventListener("input",(event)=>{
        fetch('http://daw203.local.ieslossauces.es/AGGDWESAplicacionFinal/api/wsBuscaUsuariosPorDescripcion.php?descripcionUsuariosBuscada='+inputBuscar.value)
        .then((response)=>response.json())
        .then((data)=>{
            registros.innerHTML="";
            mostrarUsuarios(data);
        })
    })
    
    
    //primera llamada para que se muestren los usuarios nada más abrir la página
    fetch('http://daw203.local.ieslossauces.es/AGGDWESAplicacionFinal/api/wsBuscaUsuariosPorDescripcion.php')
        .then((response)=>response.json())
        .then((data)=>{
            mostrarUsuarios(data);
        })
    //funcion que nos muestra los usuarios
    function mostrarUsuarios(usuarios){
        
        for(i=0;i<usuarios.length;i++){
            let fila=document.createElement("tr");
            let celdaCodigo=document.createElement("td");
            celdaCodigo.textContent=usuarios[i].codUsuario;
            fila.appendChild(celdaCodigo);
            let celdaDesc=document.createElement("td");
            celdaDesc.textContent=usuarios[i].descUsuario;
            fila.appendChild(celdaDesc);
            let celdaConexiones=document.createElement("td");
            celdaConexiones.textContent=usuarios[i].numConexiones;
            fila.appendChild(celdaConexiones);
            let celdaFechaUltimaConexion=document.createElement("td");
            celdaFechaUltimaConexion.textContent=usuarios[i].fechaHoraUltimaConexion;
            fila.appendChild(celdaFechaUltimaConexion);
            let celdaPerfil=document.createElement("td");
            celdaPerfil.textContent=usuarios[i].perfil;
            fila.appendChild(celdaPerfil);
            registros.appendChild(fila);
        }
    }
</script>
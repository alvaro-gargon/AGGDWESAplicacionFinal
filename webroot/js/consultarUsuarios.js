//importacion de funciones
    import {vistaEliminarUsuario} from "./eliminarUsuario.js"
//declaracion de variables de HTML sobre las que vamos a trabajar
    var inputBuscar=document.getElementById("busqueda");
    var tabla=document.getElementsByTagName("table")[0];
    var registros=document.getElementById("registrosUsuarios");
    //evento que se ejecuta cuando los usuarios escriben los eventos
    inputBuscar.addEventListener("input",(event)=>{
        //guardo en una cookie el valor de la descripcion buscada en uso
        localStorage.setItem("busquedaUsuarioEnCurso",inputBuscar.value);
        fetch('http://daw203.local.ieslossauces.es/AGGDWESAplicacionFinal/api/wsBuscaUsuariosPorDescripcion.php?descripcionUsuariosBuscada='+inputBuscar.value)
        .then((response)=>response.json())
        .then((data)=>{
            registros.innerHTML="";
            mostrarUsuarios(data);
        });
    });
    //si la cookie existe, le da ese valor en el input
    inputBuscar.value=localStorage.getItem("busquedaUsuarioEnCurso");
    //primera llamada para que se muestren los usuarios nada más abrir la página
    fetch('http://daw203.local.ieslossauces.es/AGGDWESAplicacionFinal/api/wsBuscaUsuariosPorDescripcion.php?descripcionUsuariosBuscada='+inputBuscar.value)
        .then((response)=>response.json())
        .then((data)=>{
            mostrarUsuarios(data);
        });
    //funcion que nos muestra los usuarios
    function mostrarUsuarios(usuarios){
        
        for(let i=0;i<usuarios.length;i++){
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
            celdaFechaUltimaConexion.textContent=formatearFecha(usuarios[i].fechaHoraUltimaConexion);
            fila.appendChild(celdaFechaUltimaConexion);
            let celdaPerfil=document.createElement("td");
            celdaPerfil.textContent=usuarios[i].perfil;
            fila.appendChild(celdaPerfil);
            let celdaBotones=document.createElement("td");
            const botonBorrar=document.createElement("button");
            botonBorrar.classList.add("icono","botonBorrar");
            botonBorrar.innerHTML="&#128465";
            botonBorrar.addEventListener("click", () => {
                vistaEliminarUsuario(usuarios[i].codUsuario);
            });
            celdaBotones.appendChild(botonBorrar)
            fila.appendChild(celdaBotones);
            registros.appendChild(fila);
        }
    }
    
    //funcion para formatear las fechas al formato español
    function formatearFecha(fecha){
        if(fecha!==null){
            let fechaFormateada=new Date(fecha);
            //el metodo getMonth devuelve un numero del 0 al 11, por eso el +1
            return fechaFormateada.getDate()+'-'+(fechaFormateada.getMonth()+1)+'-'+fechaFormateada.getFullYear()+' '+
                    fechaFormateada.getHours()+':'+fechaFormateada.getMinutes()+':'+fechaFormateada.getSeconds();
        }
    }
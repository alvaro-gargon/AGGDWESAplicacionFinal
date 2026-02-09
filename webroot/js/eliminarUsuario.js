//declaramos la varibale que contiene la vista entera
var main=document.getElementById("vUsuarios");
//funcion para modificar la vista para avisar al usuario
export function vistaEliminarUsuario(codUsuario) {
    main.innerHTML = `
        <div><h4>¿Estás seguro de que quieres eliminar el usuario `+codUsuario+` ?</h4></div>
        <div>
            <button id="confirmarEliminar"><span>ACEPTAR</span></button>
            <button id="cancelarEliminar"><span>CANCELAR</span></button>     
        </div>
        `;
    //declaracion de los botones generados
    var botonConfirmarEliminar=document.getElementById("confirmarEliminar");
    var botonCancelarEliminar=document.getElementById("cancelarEliminar");
    //addEventListener para el boton de cancelar y recargue la página
    botonCancelarEliminar.addEventListener("click",()=>{
        recarga();
    });
    //addEventListener para que termine de eliminar el usuario
    botonConfirmarEliminar.addEventListener("click",()=>{
        eliminarUsuario();
    });
    //funcion para recargar la pagina y volver al estado inicial
    function recarga() {
        location.reload();
    }
    //funcion que elmina el usuario
    function eliminarUsuario(codUsuario){
        try{
            fetch('http://daw203.local.ieslossauces.es/AGGDWESAplicacionFinal/api/wsBorrarUsuario.php?codigoUsuarioBuscado='+codUsuario)
            .then((response)=>response.json())
            .then((data)=>{
                if (data=== true){
                    alert("Borrao");
                    location.reload();
                }else{
                    main.innerHTML += "<p>Error al eliminar usuario</p>";
                }
            });
        }catch(error){
            main.innerHTML= "<p>Error al eliminar usuario</p>";
        }
    };
}



    
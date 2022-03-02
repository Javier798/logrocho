function verResenia() {
    window.location.href = "infoResena";
}
function cambiarImagen(item) {
    document.getElementById("imagenMostrada").src = item.src;
}
var usuarios = [];
var pinchos = [];
window.onload = () => {
    getPinchos();
    getUsuarios();
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');
    var codUsu = urlParams.get('coUsu');


    $.ajax({
        url: "getResenaDetalle",
        method: 'POST',
        data: { id: id,codUsu:codUsu },
        //dataType: 'json',
        success: function (json) {
            resultados = eval(json);
            setTimeout(() => {
                document.getElementById("resenaNombre").value = buscarUsuarios(resultados[0]);;
                document.getElementById("resenaPincho").value = buscarPinchos(resultados[0]);
                document.getElementById("resenaMensaje").value = resultados[0].Mensaje;
                document.getElementById("resenaValoracion").value = resultados[0].Valoracion;
                document.getElementById("resenaLike").value = resultados[0].likes;
                if(resultados[0].ruta!=null){
                    document.getElementById("imagenMostrada").src =resultados[0].ruta;
                }
                
            }, 50);

        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        }
    });
}
function esNumero(event){
    if(!/^[0-9]$/.test(event.key)){
        event.preventDefault();
        event.stopPropagation();
        return false;
    }
}
function getBar() {
    $.ajax({
        method: "POST",
        url: "nombreBares",
        success: function (response) {
            bar = eval(response);

            var keys = Object.keys(bar[2]);
        }
    });

}

function buscarPinchos(datos) {
    for (let i = 0; i < pinchos.length; i++) {
        var keys = Object.keys(pinchos[i]);
        if (parseInt(keys) == datos.Fk_pinchos) {
            return Object.values(pinchos[i]);
        }
    }
}
function buscarUsuarios(datos) {
    for (let i = 0; i < usuarios.length; i++) {
        var keys = Object.keys(usuarios[i]);
        if (parseInt(keys) == datos.Fk_usuarios) {
            return Object.values(usuarios[i]);
        }
    }
}
function getPinchos() {
    $.ajax({
        method: "POST",
        url: "nombrePinchos",
        success: function (response) {
            pinchos = eval(response);

        }
    });

}
function getUsuarios() {
    $.ajax({
        method: "POST",
        url: "nombreUsuarios",
        success: function (response) {
            usuarios = eval(response);

        }
    });

}

function enviarDatos() {
    let mensaje = document.getElementById("resenaMensaje").value;
    let valoracion = document.getElementById("resenaValoracion").value;
    
    
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');

    $.ajax({
        type: "POST",
        url: "modificarResena",
        data: { mensaje:mensaje,valoracion:valoracion,id:id },
        success: function (response) {


        }
    });
    
}

function eliminar() {

    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');

    $.ajax({
        type: "POST",
        url: "bajaResena",
        data: { id:id },
        success: function (response) {
            window.location="listadoResenas"
        }
    });
}

function cancelar() { 
    window.location.reload();
 }
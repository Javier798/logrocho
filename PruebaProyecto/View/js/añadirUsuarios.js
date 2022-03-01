
function verReseña() {
    window.location.href = "infoResena";
}
function cambiarImagen(item) {
    document.getElementById("imagenMostrada").src = item.src;
}
var bar;
var bares = [];
var idImg1;
var usuarioactual;

function esLetra(event) {
    if (!/^[a-zA-Z]$/.test(event.key)) {
        event.preventDefault();
        event.stopPropagation();
        return false;
    }
}


function cancelar() {
    window.location.reload();
}

function previsualizacion(item, id, idpapelera, idArchivo) {
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var pinchoActual = urlParams.get('id');
    let imagen = document.getElementById(id);
    const primerArchivo = item.files[0];
    // Lo convertimos a un objeto de tipo objectURL
    const objectURL = URL.createObjectURL(primerArchivo);
    // Y a la fuente de la imagen le ponemos el objectURL
    imagen.src = objectURL;
    imagen.style.display = "block";
    document.getElementById(idpapelera).style.display = "block";
    document.getElementById(idArchivo).style.display = "none";

}

function eliminarImagen(item, id, idpapelera, idArchivo, inputarchivo) {
    item = document.getElementById(inputarchivo);

    let imagen = document.getElementById(id);
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var pinchoActual = urlParams.get('id');
    // Lo convertimos a un objeto de tipo objectURL

    // Y a la fuente de la imagen le ponemos el objectURL
    let url = imagen.src.split("/");
    imagen.style.display = "none";
    document.getElementById(idpapelera).style.display = "none";
    document.getElementById(idArchivo).style.display = "block";
    item.value = '';
}

function validarEmail(valor) {
    if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(valor)){
     return true;
    } else {
     return false;
    }
  }

function guardarDatos() {
    let nombre = document.getElementById("nombreUsuario").value;
    let apellido = document.getElementById("apellidoUsuario").value;
    let email = document.getElementById("emailUsuario").value;
    let contraseña = document.getElementById("contraseñaUsuario").value;
    let rol = document.getElementById("rolUsuario").value;
    var formData = new FormData();
    
if(validarEmail(email)){
    formData.append('nombre', nombre);
    formData.append('apellido', apellido);
    formData.append('email', email);
    formData.append('contraseña', contraseña);
    formData.append('rol', rol);
    $.ajax({
        url: 'altaUsuario',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            $.ajax({
                type: "POST",
                url: "getUltimoUsuario",
                success: function (response) {
                    var datos = eval(response);
                    let item = document.getElementById("archivos1");
                    if (item.files.length > 0) {
                        var formData = new FormData();
                        var files = item.files[0];
                        formData.append('imagen', files);
                        formData.append('usuario', datos[0].max);
                        $.ajax({
                            url: 'guardarImagenUsuario',
                            type: 'post',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                
                            }
                        });
                    }

                }
            });
        }
    });
}else{
    document.getElementById("emailUsuario").style.color="red";
}
  setTimeout(() => {
    window.location.reload();
  }, 300);  
}
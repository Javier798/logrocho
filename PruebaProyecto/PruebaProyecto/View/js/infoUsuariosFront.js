function verResenia(resena) {
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');
    window.location.href = "infoResena?id=" + resena + "&coUsu=" + id;
}
function cambiarImagen(item) {
    document.getElementById("imagenMostrada").src = item.src;
}
var bar;
var bares = [];
var idImg1;
var usuarioactual, nombreUsu, codigo;
var mostrando = 1;
window.onload = () => {
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');


    $.ajax({
        url: "getUsuariosDetalle",
        method: 'POST',
        data: { id: id },
        //dataType: 'json',
        success: function (json) {
            resultados = eval(json);
            document.getElementById("nombreUsuario").value = resultados[0].Nombre;
            document.getElementById("apellidoUsuario").value = resultados[0].Apellido;
            document.getElementById("emailUsuario").value = resultados[0].Email;
            document.getElementById("rolUsuario").value = resultados[0].Rol;
            codigo = resultados[0].Cod_usuario;
            usuarioactual = resultados[0].Cod_usuario;
            nombreUsu = resultados[0].Nombre;
            if (resultados[1][0] != undefined) {
                document.getElementById("trash").style.display = "block";
                document.getElementById("img1").style.display = "block";
                document.getElementById("img1").src = resultados[1][0];
                document.getElementById("getArchivo1").value = resultados[1][0];
                document.getElementById("getArchivo1").style.display = "none";

                idImg1 = resultados[1][0];
            }
            mostrarDatos();
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        }
    });
}
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

function enviarDatos() {
    let nombre = document.getElementById("nombreUsuario").value;
    let apellido = document.getElementById("apellidoUsuario").value;
    let email = document.getElementById("emailUsuario").value;
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');

    $.ajax({
        type: "POST",
        url: "modificarUsuario",
        data: { nombre: nombre, apellido: apellido, email: email, contrasenia: "", rol: "", id: id },
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
        url: "bajaUsuario",
        data: { id: id },
        success: function (response) {
            window.location = "listadoUsuarios"
        }
    });

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
    var formData = new FormData();
    var files = item.files[0];

    formData.append('imagen', files);
    formData.append('usuario', pinchoActual);
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
    let nombre;
    if (idImg1 != undefined) {
        url = idImg1.split("/");
        nombre = url[url.length - 1];
        idImg1 = undefined;
    } else {
        nombre = item.files[0].name
        item.value = '';
    }
    let borrar;
    var formData = new FormData();
    formData.append('id', borrar);
    formData.append('nombre', nombre);
    formData.append('usuario', pinchoActual);
    $.ajax({
        url: 'eliminarImagenUsuario',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {

        }
    });
}

function eliminarLikes() {
    $.ajax({
        type: "POST",
        url: "borrarLikes",
        data: { id: usuarioactual },
        success: function (response) {

        }
    });
}


/*----------------------------------------------------------------------------------------------------------------------*/


var indice = 0;
var sentencia = "";
var ordenar = "";
var cmapos = { Cod_resena: "", Mensaje: "", Valoracion: "", Fk_pinchos: "", Fk_usuarios: "", Likes: "" };
var itemsMowstrados = [];
var pinchos, usuarios;
function mostrarDatos() {

    getPinchos();
    getUsuarios();

    var numFilas = parseInt(document.getElementById("cantidad").value);
    if (indice == 0) {
        $("[name=anterior]").prop("disabled", true);
    } else {
        $("[name=anterior]").prop("disabled", false);
    }
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');

    let url;
    if (mostrando == 1) {
        url = "getResenasPorUsuarioLimit";
    } else {
        url = "getResenasPorUsuarioLikeLimit";
    }
    if (numFilas == "") {
        $("#tabla").html("");
        return;
    } else {
        if (indice < 0) {
            indice = 0;
        }
        $.ajax({
            url: url,
            method: 'POST',
            data: { indice: indice, id: id, "ordenacion": ordenar, "cantidad": (parseInt(numFilas) + 1) },
            //dataType: 'json',
            success: function (json) {
                resultados = eval(json);
                var resenias = document.querySelector('#agrupacionResenias');


                resenias.innerHTML = "";
                if (resultados.length == numFilas + 1) {
                    $("[name=siguiente]").prop("disabled", false);
                } else {
                    $("[name=siguiente]").prop("disabled", true);
                }

                setTimeout(() => {
                    if (numFilas >= resultados.length) {
                        for (let i = 0; i < resultados.length; i++) {
                            let fila = construirFila(resultados[i], resultados[i].Cod_bar, url);
                            resenias.appendChild(fila);
                        }
                    }
                    else {
                        for (let i = 0; i < resultados.length - 1; i++) {
                            let fila = construirFila(resultados[i], resultados[i].Cod_bar, url);
                            resenias.appendChild(fila);
                        }
                    }
                }, 100);
            },
            error: function (xhr, status) {
                alert('Disculpe, existió un problema');
            }
        });
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
function siguiente() {
    var numFilas = $("#cantidad").val();
    indice += parseInt(numFilas);
    mostrarDatos();
}

function anterior() {
    var numFilas = $("#cantidad").val();
    indice -= parseInt(numFilas);
    mostrarDatos();
}

function construirFila(datos, n, url) {
    var resena = document.createElement('div');
    resena.className = "resenia";

    var contenido = document.createElement('div');
    contenido.className = "contenido";
    var parteIzquierda = document.createElement('div');
    parteIzquierda.className = "parteIzquierda";
    var infoResena = document.createElement('div');
    infoResena.className = "infoResenia";

    var imagen = document.createElement('img');
    imagen.className = "imgResenia";
    if (datos.ruta != null) {
        imagen.src = datos.ruta;
    } else {
        imagen.src = "../View/img/perfildeusuario.jpg";
    }
    parteIzquierda.appendChild(imagen);
    let estrellas = pintarEstrellas(datos);
    var usuario = document.createElement('h6');
    usuario.innerHTML = buscarUsuarios(datos);
    var mensaje = document.createElement('p');
    mensaje.innerHTML = datos.Mensaje;
    infoResena.appendChild(usuario);
    infoResena.appendChild(mensaje);
    let contendorInfo = document.createElement("div");
    let like = document.createElement("div");
    contendorInfo.className = "contendorInfo";
    if (url == "getResenasPorUsuarioLimit") {
        like.innerHTML = "<i class='papelera fa fa-2x fa-trash'></i>";

    } else {
        like.innerHTML = "<i class='like fa fa-2x fa-thumbs-o-up aria-hidden='true'></i>";
        if (datos.likesUsuario > 0) {
            like.children[0].style.color = "#c1a36a";
        }
    }

    contenido.appendChild(parteIzquierda);
    contendorInfo.appendChild(like);
    contendorInfo.appendChild(estrellas);
    infoResena.appendChild(contendorInfo);
    contenido.appendChild(infoResena);
    resena.appendChild(contenido);
    if (url = "getResenasPorUsuarioLimit") {
        like.addEventListener("click", () => {
            eliminarResena(datos.Cod_resena);
        });
    } else {
        like.addEventListener("click", (event) => {
            let funcion = "";
            let id = datos.Cod_resena;;
            if (event.target.style.color != "") {
                event.target.style.color = "";
                funcion = "borrarLike";

            } else {
                event.target.style.color = "#c1a36a";
                funcion = "anadirLikes";

            }

            $.ajax({
                method: "POST",
                url: funcion,
                data: { id, id },
                success: function (response) {


                }
            });

        });
    }

    return resena;
}
function borrarCuenta(params) {
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');

    $.ajax({
        type: "POST",
        url: "bajaUsuario",
        data: { id: id },
        success: function (response) {
            window.location = "loginFront"
        }
    });
}
function pintarEstrellas(datos) {
    let puntos;
    if (datos.Puntuacion != undefined) {
        puntos = datos.Puntuacion = datos.Puntuacion / 2;
    } else {
        puntos = datos.Valoracion = datos.Valoracion / 2;
    }

    let devolver = document.createElement('div');
    devolver.className = "estrellas";
    if (puntos >= 0.5) {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        parrafo.style.color = "#c1a36a";
        devolver.appendChild(parrafo);
    } else {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        devolver.appendChild(parrafo);
    }
    if (puntos >= 1) {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        parrafo.style.color = "#c1a36a";
        devolver.appendChild(parrafo);
    } else {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        devolver.appendChild(parrafo);
    }
    if (puntos >= 3) {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        parrafo.style.color = "#c1a36a";
        devolver.appendChild(parrafo);
    } else {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        devolver.appendChild(parrafo);
    }
    if (puntos >= 4) {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        parrafo.style.color = "#c1a36a";
        devolver.appendChild(parrafo);
    } else {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        devolver.appendChild(parrafo);
    }
    if (puntos == 5) {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        parrafo.style.color = "#c1a36a";
        devolver.appendChild(parrafo);
    } else {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        devolver.appendChild(parrafo);
    }
    return devolver;
}
function buscarUsuarios(datos) {
    for (let i = 0; i < usuarios.length; i++) {
        var keys = Object.keys(usuarios[i]);
        if (parseInt(keys) == datos.Fk_usuarios) {
            return Object.values(usuarios[i]);
        }
    }
}

function mostrarResenas(item) {
    mostrando = 1;
    numFilas = 0;
    mostrarDatos();
    item.style.borderBottom = "solid black 1px";
    item.style.color = "#c1a36a";
    document.getElementById("tituloLikes").style.borderBottom = "solid black 1px";
    document.getElementById("tituloLikes").style.color = "black";
}
function mostrarLikes(item) {
    mostrando = 0;
    numFilas = 0;
    mostrarDatos();
    item.style.borderBottom = "solid black 1px";
    item.style.color = "#c1a36a";
    document.getElementById("tituloResenias").style.borderBottom = "solid black 1px";
    document.getElementById("tituloResenias").style.color = "black";
}
function eliminarResena(id) {

    $.ajax({
        type: "POST",
        url: "bajaResena",
        data: { id: id },
        success: function (response) {
            window.location.reload();
        }
    });
}
function cambiarContraserna() {
    window.location = "cambiarContrasena";
}
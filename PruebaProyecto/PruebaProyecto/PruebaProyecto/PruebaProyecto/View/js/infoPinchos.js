function verResenia() {
    window.location.href = "infoResena";
}
function cambiarImagen(item) {
    document.getElementById("imagenMostrada").src = item.src;
}
var bar;
var bares = [];
var idImg1, idImg2, idImg3;

window.onload = () => {
    getBar();
    getUsuarios();
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');


    $.ajax({
        url: "getPinchoDetalle",
        method: 'POST',
        data: { id: id },
        //dataType: 'json',
        success: function (json) {
            resultados = eval(json);
            document.getElementById("nombrePincho").value = resultados[0].Nombre;
            document.getElementById("descPincho").value = resultados[0].Descripcion;
            document.getElementById("puntuacionPincho").value = resultados[0].Puntuacion;
            try {
                if (resultados[1][0] != undefined) {
                    document.getElementById("papelera1").style.display = "block";
                    document.getElementById("img1").style.display = "block";
                    document.getElementById("img1").src = resultados[1][0];
                    document.getElementById("getArchivo1").value = resultados[1][0];
                    document.getElementById("getArchivo1").style.display = "none";
                    document.getElementById("imagenMostrada").src = resultados[1][0];
                    idImg1 = resultados[1][0];
                }
                if (resultados[1][1] != undefined) {
                    document.getElementById("papelera2").style.display = "block";
                    document.getElementById("img2").style.display = "block";
                    document.getElementById("img2").src = resultados[1][1];
                    document.getElementById("getArchivo2").style.display = "none";
                    idImg2 = resultados[1][1];
                }
                if (resultados[1][2] != undefined) {
                    document.getElementById("papelera3").style.display = "block";
                    document.getElementById("img3").style.display = "block";
                    document.getElementById("img3").src = resultados[1][2];
                    document.getElementById("getArchivo3").style.display = "none";
                    idImg3 = resultados[1][2];
                }
            } catch (Ex) {

            }

            mostrarDatos();
            setTimeout(() => {
                createSELECT(resultados);
            }, 50);

        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        }
    });
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
function getUsuarios() {
    $.ajax({
        method: "POST",
        url: "nombreUsuarios",
        success: function (response) {
            usuarios = eval(response);

        }
    });

}
function createSELECT(res) {
    let cont = 0;
    for (let i = 0; i < bar.length; i++) {
        if (res[0].Fk_bar == Object.keys(bar[i])[0]) {
            cont = i;
        }
        bares.push(Object.values(bar[i])[0]);

    }
    let select = document.getElementById("selectBares");
    if (bares && Array.isArray(bares)) {
        for (let index = 0; index < bares.length; index++) {
            const element = bares[index];

            let option = document.createElement("option");


            option.setAttribute("value", element);

            if (index == cont) {
                option.selected = true;
            }
            let optionText = document.createTextNode(element);
            option.appendChild(optionText);


            select.appendChild(option);
        }
    }


}

function esNumero(event) {
    if (!/^[0-9]$/.test(event.key)) {
        event.preventDefault();
        event.stopPropagation();
        return false;
    }
}


var indice = 0;
var sentencia = "";
var ordenar = "";
var cmapos = { Cod_pinchos: "", Nombre: "", Descripcion: "", Descripcion: "" };
var usuarios;
var bar;
function mostrarDatos() {
    var numFilas = parseInt(document.getElementById("cantidad").value);;//parseInt(document.getElementById("selectFilas").value);
    if (indice == 0) {
        $("[name=anterior]").prop("disabled", true);
    } else {
        $("[name=anterior]").prop("disabled", false);
    }
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');


    if (numFilas == "") {
        $("#tabla").html("");
        return;
    } else {
        if (indice < 0) {
            indice = 0;
        }
        $.ajax({
            url: "getResenasPorPincho",
            method: 'POST',
            data: { indice: indice, "ordenacion": ordenar, cantidad: (parseInt(numFilas) + 1), id: id },
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
                            let fila = construirFila(resultados[i], resultados[i].Cod_resenia);
                            resenias.appendChild(fila);
                        }
                    }
                    else {
                        for (let i = 0; i < resultados.length - 1; i++) {
                            let fila = construirFila(resultados[i], resultados[i].Cod_resenia);
                            resenias.appendChild(fila);
                        }
                    }
                    //$("#tabla").html("");
                    //$("#tabla").append(tbody);
                }, 100);
            },
            error: function (xhr, status) {
                alert('Disculpe, existió un problema');
            }
        });
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
function ordenacion(item) {

    if (cmapos[item.id] == "" || cmapos[item.id] == "desc") {
        cmapos[item.id] = "asc";
        ordenar = "order by " + item.id + " asc";
        mostrarDatos();
    } else {
        cmapos[item.id] = "desc";
        ordenar = "order by " + item.id + " desc";
        mostrarDatos();
    }
}

function construirFila(datos, n) {

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
    imagen.src = "../View/img/perfildeusuario.jpg";
    var i = document.createElement('i');
    i.className = "papelera fa fa-2x fa-trash";
    i.ariaHidden = true;
    parteIzquierda.appendChild(imagen);
    parteIzquierda.appendChild(i);

    var usuario = document.createElement('h6');
    usuario.innerHTML = buscarUsuarios(datos);
    var mensaje = document.createElement('p');
    mensaje.innerHTML = datos.Mensaje;
    infoResena.appendChild(usuario);
    infoResena.appendChild(mensaje);

    contenido.appendChild(parteIzquierda);
    contenido.appendChild(infoResena);
    resena.appendChild(contenido);

    resena.addEventListener("click", () => {
        verResenia();
    })
    return resena;
}
function buscarUsuarios(datos) {
    for (let i = 0; i < usuarios.length; i++) {
        var keys = Object.keys(usuarios[i]);
        if (parseInt(keys) == datos.Fk_usuarios) {
            return Object.values(usuarios[i]);
        }
    }
}

function enviarDatos() {
    let nombre = document.getElementById("nombrePincho").value;
    let puntuacion = document.getElementById("puntuacionPincho").value;
    let descripcion = document.getElementById("descPincho").value;
    let propiedad = document.getElementById("selectBares").value;
    let codBar;
    for (let i = 0; i < bar.length; i++) {
        if (Object.values(bar[i]) == propiedad) {
            codBar = Object.keys(bar[i]);
        }

    }
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');

    $.ajax({
        type: "POST",
        url: "modificarPincho",
        data: { nombre: nombre, puntuacion: puntuacion, descripcion: descripcion, bar: codBar[0], id: id },
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
        url: "bajaPincho",
        data: { id: id },
        success: function (response) {
            window.location = "listadoPinchos"
        }
    });

} function cancelar() {
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
    var formData = new FormData();
    var files = item.files[0];
    formData.append('imagen', files);
    formData.append('pincho', pinchoActual);
    $.ajax({
        url: 'guardarImagenPincho',
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

    let imagen = document.getElementById(idArchivo);
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var pinchoActual = urlParams.get('id');
    // Lo convertimos a un objeto de tipo objectURL

    // Y a la fuente de la imagen le ponemos el objectURL
    let url;
    imagen.style.display = "none";
    document.getElementById(idpapelera).style.display = "none";
    document.getElementById(id).style.display = "none";
    document.getElementById(idArchivo).style.display = "block";
    let nombre;

    let borrar;
    switch (id) {
        case "img1":
            if (idImg1 != undefined) {
                url = idImg1.split("/");
                nombre = url[url.length - 1];

            } else {
                nombre = item.files[0].name
                item.value = '';
            }

            break;
        case "img2":
            if (idImg2 != undefined) {
                url = idImg2.split("/");
                nombre = url[url.length - 1];
            } else {
                nombre = item.files[0].name
                item.value = '';
            }
            break;
        case "img3":
            if (idImg3 != undefined) {
                url = idImg3.split("/");
                nombre = url[url.length - 1];
            } else {
                nombre = item.files[0].name
                item.value = '';
            }
            break;
        default:
            break;
    }
    var formData = new FormData();
    formData.append('id', borrar);
    formData.append('nombre', nombre);
    formData.append('pincho', pinchoActual);
    $.ajax({
        url: 'eliminarImagenPincho',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {

        }
    });
}


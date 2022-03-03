function cambiarImagen(item) {
    document.getElementById("imagenMostrada").src = item.src;
}


var barActual;
var idImg1, idImg2, idImg3;
window.onload = () => {
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');


    $.ajax({
        url: "getBarDetalle",
        method: 'POST',
        data: { id: id },
        //dataType: 'json',
        success: function (json) {
            resultados = eval(json);
            document.getElementById("nombreBar").value = resultados[0].Nombre;
            document.getElementById("descripcionBar").value = resultados[0].Descripcion;
            document.getElementById("direccionBar").value = resultados[0].Localizacion;
            document.getElementById("puntuacionBar").value = resultados[0].Puntuacion;
            document.getElementById("longitudBar").value = resultados[0].Longitud;
            document.getElementById("latitudBar").value = resultados[0].Latitud;
            if (resultados[1][0] != undefined) {
                document.getElementById("papelera1").style.display = "block";
                document.getElementById("img1").style.display = "block";
                document.getElementById("img1").src = resultados[1][0];
                document.getElementById("getArchivo1").value = resultados[1][0];
                document.getElementById("getArchivo1").style.display = "none";
                document.getElementById("imagenMostrada").src=resultados[1][0];
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
            barActual = resultados[0].Cod_bar;

            mostrarDatos();
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        }
    });
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
            url: "getPinchosPorBar",
            method: 'POST',
            data: { indice: indice, "ordenacion": ordenar, cantidad: (parseInt(numFilas) + 1), id: id },
            //dataType: 'json',
            success: function (json) {
                resultados = eval(json);

                itemsMowstrados = [];
                for (let i = 0; i < numFilas; i++) {
                    if (resultados[i] == undefined) {
                        break;
                    }
                    itemsMowstrados.push(resultados[i]);
                }
                var tabla = document.querySelector('table');


                var thead = tabla.tHead
                thead.innerHTML = "";
                var cabecera = construirCabecera();
                var tbody = tabla.tBodies[0];
                tbody.innerHTML = "";
                thead.appendChild(cabecera);
                if (resultados.length == numFilas + 1) {
                    $("[name=siguiente]").prop("disabled", false);
                } else {
                    $("[name=siguiente]").prop("disabled", true);
                }

                setTimeout(() => {
                    if (numFilas >= resultados.length) {
                        for (let i = 0; i < resultados.length; i++) {
                            let fila = construirFila(resultados[i], resultados[i].Cod_bar);
                            tbody.appendChild(fila);
                        }
                    }
                    else {
                        for (let i = 0; i < resultados.length - 1; i++) {
                            let fila = construirFila(resultados[i], resultados[i].Cod_bar);
                            tbody.appendChild(fila);
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
    var tabla = document.querySelector('table');
    var tbody = tabla.tBodies[0];
    tbody.innerHTML = "";

    var s;
    if (cmapos[item.id] == "" || cmapos[item.id] == "desc") {
        cmapos[item.id] = "asc";
        SortArrayInverso(item.id, itemsMowstrados);

        s = itemsMowstrados
            ;
        //        s= itemsMowstrados.sort(SortArrayInverso);
    } else {
        cmapos[item.id] = "desc";
        sortArray(item.id, itemsMowstrados)
        s = itemsMowstrados
        //s= itemsMowstrados.sort(SortArray);
    }
    for (let i = 0; i < s.length; i++) {
        let fila = construirFila(s[i], s[i].Cod_usuarios);
        tbody.appendChild(fila);
    }
}

function sortArray(id, array) {
    switch (id) {
        case "Cod_pincho":
            array.sort(function (a, b) {
                return (b.Cod_pincho - a.Cod_pincho)
            })
            break;
        case "Nombre":
            array.sort(function (a, b) {
                return ((a.Nombre < b.Nombre) ? -1 : ((a.Nombre > b.Nombre) ? 1 : 0));
            })
            break;
        case "Descripcion":
            array.sort(function (a, b) {
                return ((a.Nombre < b.Nombre) ? -1 : ((a.Nombre > b.Nombre) ? 1 : 0));
            })
            break;
        case "Fk_bar":
            array.sort(function (a, b) {
                return (b.Fk_bar - a.Fk_bar)
            })
            break;
        case "Puntuacion":
            array.sort(function (a, b) {
                return (b.Puntuacion - a.Puntuacion)
            })
            break;
    }
}

function SortArrayInverso(id, array) {
    switch (id) {
        case "Cod_pincho":
            array.sort(function (a, b) {
                return (a.Cod_pincho - b.Cod_pincho)
            })
            break;
        case "Nombre":
            array.sort(function (a, b) {
                return ((b.Nombre < a.Nombre) ? -1 : ((b.Nombre > a.Nombre) ? 1 : 0));
            })
            break;
        case "Descripcion":
            array.sort(function (a, b) {
                return ((b.Nombre < a.Nombre) ? -1 : ((b.Nombre > a.Nombre) ? 1 : 0));
            })
            break;
        case "Fk_bar":
            array.sort(function (a, b) {
                return (a.Fk_bar - b.Fk_bar)
            })
            break;
        case "Puntuacion":
            array.sort(function (a, b) {
                return (a.Puntuacion - b.Puntuacion)
            })
            break;
    }
}

function construirCabecera() {
    var cabecera = document.createElement('tr');

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Cod Pincho");

    titulo.appendChild(texto);
    titulo.scope = "col";
    titulo.id = "Cod_pincho";
    titulo.className = "col1";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Cod_pincho"));

    });
    titulo.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    cabecera.appendChild(titulo);


    var titulo = document.createElement('th');
    var texto = document.createTextNode("Nombre");
    titulo.id = "Nombre";
    titulo.scope = "col";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Nombre"));
    });

    titulo.appendChild(texto);
    titulo.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Descripcion");
    titulo.scope = "col";
    titulo.id = "Descripcion";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Descripcion"));
    });


    titulo.appendChild(texto);
    titulo.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var texto = document.createTextNode("Puntuacion");
    titulo.id = "Puntuacion";
    titulo.scope = "col";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Puntuacion"));
    });

    titulo.appendChild(texto);
    titulo.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    cabecera.appendChild(titulo);
    return cabecera;
}

function insertarFila() {
    $.ajax({
        type: "GET",
        url: "insertarEmpleado.php",
        dataType: "json",
        success: function (response) {
            var json = response;
            resultado = eval(json);
            $("#tablaEmpleados").append(document.createElement("tr").appendChild(construirFila(resultado[0], resultado[0]["emp_no"])));
        }
    });
}
function actualizarFila(item, n) {
    n = parseInt(n);
    var valorOriginal = item.value;
    $.ajax({
        type: "GET",
        url: "updateFila.php?" + "clave=" + item.className + "&valor=" + valor + "&numero=" + n,
        dataType: "json",
        success: function (response) {
            var json = response;
            resultado = eval(json);

            item.value = valorOriginal;
        }
    });

    var valor = comprobarDatos(item.className, item.value);
    if (valor == false) {
        event.preventDefault();
        event.stopImmediatePropagation();
        alert("Escriba correctamente el campo: " + item.className);
        return;
    }

}
function construirFila(datos, n) {
    linea = document.createElement('tr');

    var titulo = document.createElement('th');
    var campo = document.createElement('p');
    campo.className = "Cod_pincho";
    campo.type = "number";
    titulo.scope = "row";
    campo.innerHTML = datos.Cod_pincho;
    campo.setAttribute("readonly", true);
    titulo.appendChild(campo);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var campo = document.createElement('p');
    campo.className = "Nombre";
    campo.type = "text";
    campo.innerHTML = datos.Nombre;
    titulo.appendChild(campo);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var campo = document.createElement('p');
    campo.className = "Descripcion";
    campo.type = "text";
    campo.innerHTML = datos.Descripcion;
    titulo.appendChild(campo);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var campo = document.createElement('p');
    campo.className = "Puntuacion";
    campo.type = "text";
    campo.innerHTML = datos.Puntuacion;

    titulo.appendChild(campo);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var campo = document.createElement('a');
    campo.className = "btn btn-primary";
    campo.innerHTML = "ver";
    campo.href = "infoPinchos?id=" + datos.Cod_pincho;
    titulo.appendChild(campo);
    linea.appendChild(titulo);
    return linea;
}

function enviarDatos() {
    let nombre = document.getElementById("nombreBar").value;
    let puntuacion = document.getElementById("puntuacionBar").value;
    let descripcion = document.getElementById("descripcionBar").value;
    let direccion = document.getElementById("direccionBar").value;
    let longitud = document.getElementById("longitudBar").value;
    let latitud = document.getElementById("latitudBar").value;

    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');

    $.ajax({
        type: "POST",
        url: "modificarBar",
        data: { nombre: nombre, puntuacion: puntuacion, descripcion: descripcion, localizacion: direccion,longitud:longitud,latitud:latitud, id: id },
        success: function (response) {

            window.location.reload();
        }
    });
}

function eliminar() {
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');

    $.ajax({
        type: "POST",
        url: "bajaBar",
        data: { id: id },
        success: function (response) {
            window.location = "listadoBares"
        }
    });

}

function cancelar() {
    window.location.reload();
}

function previsualizacion(item, id, idpapelera, idArchivo) {
    let imagen = document.getElementById(id);
    const primerArchivo = item.files[0];
    // Lo convertimos a un objeto de tipo objectURL
    const objectURL = URL.createObjectURL(primerArchivo);
    // Y a la fuente de la imagen le ponemos el objectURL
    imagen.src = objectURL;
    imagen.style.display = "block";
    document.getElementById(idpapelera).style.display = "block";
    document.getElementById(idArchivo).style.display = "none";
    /* $.ajax({
         type: "POST",
         url: "guardarImagenBar",
  
         data: { bar:barActual },
         
         success: function (response) {
             
         }
     });*/
    var formData = new FormData();
    var files = item.files[0];
    formData.append('imagen', files);
    formData.append('bar', barActual);
    $.ajax({
        url: 'guardarImagenBar',
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
    
    // Lo convertimos a un objeto de tipo objectURL
    
    // Y a la fuente de la imagen le ponemos el objectURL
    let url = imagen.src.split("/");
    imagen.style.display = "none";
    document.getElementById(idpapelera).style.display = "none";
    document.getElementById(idArchivo).style.display = "block";

    let borrar;
   /* switch (id) {
        case "img1":
        borrar = idImg1;
            break;
        case "img2":
            borrar = idImg2;
            break;
        case "img3":
            borrar = idImg3;
            break;

        default:
            break;
    }*/

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
    formData.append('nombre',nombre );
    formData.append('bar',barActual );
    $.ajax({
        url: 'eliminarImagenBar',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {

        }
    });
}


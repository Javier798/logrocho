var indice = 0;
var sentencia = "";
var ordenar = "";
var cmapos = { Cod_pinchos: "", Nombre: "", Descripcion: "", Descripcion: "" };
var itemsMowstrados = [];
var bar;
var inicio = 0;
function mostrarDatos() {

    getBar();

    var numFilas = parseInt(document.getElementById("cantidad").value);
    if (indice == 0) {
        $("[name=anterior]").prop("disabled", true);
    } else {
        $("[name=anterior]").prop("disabled", false);
    }



    if (numFilas == "") {
        $("#tabla").html("");
        return;
    } else {
        if (indice < 0) {
            indice = 0;
        }

        $.ajax({
            url: "getPinchoLimit",
            method: 'POST',
            data: { indice: indice, "ordenacion": ordenar, cantidad: (parseInt(numFilas) + 1), puntuacionmax: document.getElementById("hasta").value, puntuacion: document.getElementById("desde").value, filtro: document.getElementById("search").value, bar: document.getElementById("roles").value },
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
            if (inicio == 0) {
                crearSelect(bar);
                inicio++;
            }
            var keys = Object.keys(bar[2]);
        }
    });

}
function crearSelect(bares) {
    let select = document.getElementById("roles");
    let option = document.createElement("option");
    option.value = "";
    option.appendChild(document.createTextNode("Sin filtrar"));
    select.appendChild(option);
    for (let i = 0; i < bares.length; i++) {
        let option = document.createElement("option");
        option.value = Object.keys(bares[i]);
        option.appendChild(document.createTextNode(Object.values(bares[i])));
        select.appendChild(option);
    }
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
var itemAnterior = document.createElement("p");
function ordenacion(item) {
    var tabla = document.querySelector('table');
    var tbody = tabla.tBodies[0];
    tbody.innerHTML = "";

    var s;
    if (cmapos[item.id] == "" || cmapos[item.id] == "desc") {
        cmapos[item.id] = "asc";
        SortArrayInverso(item.id, itemsMowstrados);
        item.style.borderBottom = "solid 1px black";
        s = itemsMowstrados;

        //        s= itemsMowstrados.sort(SortArrayInverso);
    } else {
        cmapos[item.id] = "desc";
        sortArray(item.id, itemsMowstrados)
        s = itemsMowstrados
        item.style.borderBottom = "solid 1px black";

        //s= itemsMowstrados.sort(SortArray);
        if (item != itemAnterior) {
            itemAnterior.style.borderBottom = "";
        } else if (item = itemAnterior) {
            itemAnterior.style.borderBottom = "";
        }
    }
    if (item != itemAnterior) {
        itemAnterior.style.borderBottom = "";
    }
    itemAnterior = item;
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
                return ((a.Descripcion < b.Descripcion) ? -1 : ((a.Descripcion > b.Descripcion) ? 1 : 0));
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
                return ((b.Descripcion < a.Descripcion) ? -1 : ((b.Descripcion > a.Descripcion) ? 1 : 0));
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
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Cod Pincho");

    titulo.appendChild(texto);
    titulo.scope = "col";
    titulo.id = "Cod_pincho";
    titulo.className = "col1";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Cod_pincho"));

    });
    contenedor.appendChild(texto);
    contenedor.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    titulo.appendChild(contenedor);
    cabecera.appendChild(titulo);


    var titulo = document.createElement('th');
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Nombre");
    titulo.id = "Nombre";
    titulo.scope = "col";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Nombre"));
    });

    contenedor.appendChild(texto);
    contenedor.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    titulo.appendChild(contenedor);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Descripcion");
    titulo.scope = "col";
    titulo.id = "Descripcion";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Descripcion"));
    });


    contenedor.appendChild(texto);
    contenedor.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    titulo.appendChild(contenedor);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Bar");
    titulo.id = "Fk_bar";
    titulo.scope = "col";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Fk_bar"));
    });

    contenedor.appendChild(texto);
    contenedor.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    titulo.appendChild(contenedor);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Puntuaciom");
    titulo.id = "Puntuacion";
    titulo.scope = "col";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Puntuacion"));
    });

    contenedor.appendChild(texto);
    contenedor.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    titulo.appendChild(contenedor);
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

    var titulo = document.createElement('td');
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
    campo.className = "Fk_bar";
    campo.type = "number";
    campo.innerHTML = buscarBar(datos);
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

function buscarBar(datos) {
    for (let i = 0; i < bar.length; i++) {
        var keys = Object.keys(bar[i]);
        if (parseInt(keys) == datos.Fk_bar) {
            return Object.values(bar[i]);
        }
    }
}
function anadirPincho() {
    window.location = "anadirPincho";
}
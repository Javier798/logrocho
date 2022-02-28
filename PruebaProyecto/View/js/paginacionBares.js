var indice = 0;
var sentencia = "";
var ordenar = "";
var cmapos = { Cod_bar: "", Nombre: "", Localizacion: "", Puntuacion: "", Descripcion: "" };
var itemsMowstrados = [];
var departamentos;
function mostrarDatos() {
    var numFilas = parseInt(document.getElementById("cantidad").value);;//parseInt(document.getElementById("selectFilas").value);
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
            url: "getBarLimit",
            method: 'POST',
            data: { indice: indice, "ordenacion": ordenar, cantidad: (parseInt(numFilas) + 1),puntuacionmax:document.getElementById("hasta").value,puntuacion:document.getElementById("desde").value,filtro:document.getElementById("search").value },
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
        s = itemsMowstrados
            ;
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
        case "Cod_bar":
            array.sort(function (a, b) {
                return (a.Cod_bar - b.Cod_bar)
            })
            break;
        case "Nombre":
            array.sort(function (a, b) {
                return ((a.Nombre < b.Nombre) ? -1 : ((a.Nombre > b.Nombre) ? 1 : 0));
            })
            break;
        case "Localizacion":
            array.sort(function (a, b) {
                return ((a.Localizacion < b.Localizacion) ? -1 : ((a.Localizacion > b.Localizacion) ? 1 : 0));
            })
            break;
        case "Puntuacion":
            array.sort(function (a, b) {
                return (b.Puntuacion - a.Puntuacion)
            })
            break;
        case "Descripcion":
            array.sort(function (a, b) {
                return ((a.Descripcion < b.Descripcion) ? -1 : ((a.Descripcion > b.Descripcion) ? 1 : 0));
            })
            break;
    }
}

function SortArrayInverso(id, array) {
    switch (id) {
        case "Cod_bar":
            array.sort(function (a, b) {
                return (b.Cod_bar - a.Cod_bar)
            })
            break;
        case "Nombre":
            array.sort(function (a, b) {
                return ((b.Nombre < a.Nombre) ? -1 : ((b.Nombre > a.Nombre) ? 1 : 0));
            })
            break;
        case "Localizacion":
            array.sort(function (a, b) {
                return ((b.Localizacion < a.Localizacion) ? -1 : ((b.Localizacion > a.Localizacion) ? 1 : 0));
            })
            break;
        case "Puntuacion":
            array.sort(function (a, b) {
                return (a.Puntuacion - b.Puntuacion)
            })
            break;
        case "Descripcion":
            array.sort(function (a, b) {
                return ((b.Descripcion < a.Descripcion) ? -1 : ((b.Descripcion > a.Descripcion) ? 1 : 0));
            })
            break;
    }
}

function construirCabecera() {
    var cabecera = document.createElement('tr');

    var titulo = document.createElement('th');
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Cod Bar");
    titulo.scope = "col";
    titulo.id = "Cod_bar";
    titulo.className = "col1";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Cod_bar"));

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
    var texto = document.createTextNode("Localizacion");
    titulo.scope = "col";
    titulo.id = "Localizacion";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Localizacion"));
    });
    contenedor.appendChild(texto);
    contenedor.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    titulo.appendChild(contenedor);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Puntuacion");
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
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Descripcion");
    titulo.id = "Descripcion";
    titulo.scope = "col";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Descripcion"));
    });
    contenedor.appendChild(texto);
    contenedor.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    titulo.appendChild(contenedor);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    cabecera.appendChild(titulo);
    return cabecera;
}

function construirFila(datos, n) {
    linea = document.createElement('tr');

    var titulo = document.createElement('td');
    var campo = document.createElement('p');
    campo.className = "Cod_bar";
    campo.type = "number";
    titulo.scope = "row";
    campo.innerHTML = datos.Cod_bar;
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
    campo.className = "Localizacion";
    campo.type = "text";
    campo.innerHTML = datos.Localizacion;
    titulo.appendChild(campo);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var campo = document.createElement('p');
    campo.className = "Puntuacion";
    campo.type = "number";
    campo.innerHTML = datos.Puntuacion;
    titulo.appendChild(campo);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var campo = document.createElement('p');
    campo.className = "Descripcion";
    campo.type = "text";
    if (datos.Descripcion.length > 200) {
        campo.innerHTML = datos.Descripcion.substring(0, 200);
    } else {
        campo.innerHTML = datos.Descripcion;
    }

    titulo.appendChild(campo);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var campo = document.createElement('a');
    campo.className = "btn btn-primary";
    campo.innerHTML = "ver";
    campo.href = "infoBares?id=" + datos.Cod_bar;
    titulo.appendChild(campo);
    linea.appendChild(titulo);
    return linea;

}

function anadirBar() {
    window.location="anadirBar";
}
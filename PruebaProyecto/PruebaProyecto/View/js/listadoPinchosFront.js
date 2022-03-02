var indice = 0;
var sentencia = "";
var ordenar = "";
var cmapos = { Cod_bar: "", Nombre: "", Localizacion: "", Puntuacion: "", Descripcion: "" };
var itemsMowstrados = [];
var departamentos;
var numFilas = 2;
function mostrarDatos() {



    let algo = document.getElementById("search-input").value;
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
            data: { indice: indice, "ordenacion": ordenar, cantidad: (parseInt(numFilas) + 1), puntuacionmax: document.getElementById("hasta").value, puntuacion: document.getElementById("desde").value, filtro: document.getElementById("search-input").value, bar: "" },
            //dataType: 'json',
            success: function (json) {
                resultados = eval(json);
if(resultados.length==0){
                    document.getElementById("flechita").style.display="none";
                }else{
                    document.getElementById("flechita").style.display="block";
                }
                for (let i = 0; i < numFilas; i++) {
                    if (resultados[i] == undefined) {
                        break;
                    }
                    itemsMowstrados.push(resultados[i]);
                }
                
                    indice += 3;
                
                let contenedorBares = document.querySelector("#bares");
                setTimeout(() => {
                    for (let i = 0; i < resultados.length; i++) {
                        contenedorBares.appendChild(construirFila(resultados[i]));

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
function verMas() {
    numFilas = 2;

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
function mostrarDatosFiltros() {
    indice = 0;
    document.querySelector("#bares").innerHTML = "";
    mostrarDatos()
}
function sortArray(id, array) {
    switch (id) {
        case "Cod_bar":
            array.sort(function (a, b) {
                return (b.Cod_bar - a.Cod_bar)
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
                return (a.Cod_bar - b.Cod_bar)
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



function construirFila(datos, n) {

    let bar = document.createElement('div');
    bar.className = "bar";
    let imgBar = document.createElement('div');
    imgBar.className = "imgBar";
    imgBar.style.backgroundImage = "url(" + datos.Ruta + ")";
    let datosBar = document.createElement('div');
    datosBar.className = "datosBar";
    let contenedorTituli = document.createElement('div');
    let h5 = document.createElement('h5');
    h5.innerHTML = datos.Nombre;
    let nombreBar = document.createElement('h5');
    nombreBar.innerHTML = datos.NombreBar;
    contenedorTituli.className = "nombreBar";
    let estrellas = pintarEstrellas(datos);
    contenedorTituli.appendChild(h5);
    contenedorTituli.appendChild(estrellas);
    datosBar.appendChild(contenedorTituli);
    datosBar.appendChild(nombreBar);
    bar.appendChild(imgBar);
    bar.appendChild(datosBar);
    bar.addEventListener("click", () => {
        window.location = "mostrarInfoPinchosFront?id=" + datos.Cod_pincho;
    });
    return bar;
}

function anadirBar() {
    window.location = "anadirBar";
}

function pintarEstrellas(datos) {
    let devolver = document.createElement('div');
    devolver.className = "estrellas";
    if (datos.Puntuacion >= 0.5) {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        parrafo.style.color = "#c1a36a";
        devolver.appendChild(parrafo);
    } else {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        devolver.appendChild(parrafo);
    }
    if (datos.Puntuacion >= 1) {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        parrafo.style.color = "#c1a36a";
        devolver.appendChild(parrafo);
    } else {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        devolver.appendChild(parrafo);
    }
    if (datos.Puntuacion >= 3) {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        parrafo.style.color = "#c1a36a";
        devolver.appendChild(parrafo);
    } else {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        devolver.appendChild(parrafo);
    }
    if (datos.Puntuacion >= 4) {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        parrafo.style.color = "#c1a36a";
        devolver.appendChild(parrafo);
    } else {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        devolver.appendChild(parrafo);
    }
    if (datos.Puntuacion == 5) {
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

$(document).ready(function () {
    $(window).scroll(function () {

        let algo = $(window).scrollTop();

        if ($(window).scrollTop() == $(document).height() - $(window).height()) {
            numFilas = 2;

            mostrarDatos();
        }
    });
});
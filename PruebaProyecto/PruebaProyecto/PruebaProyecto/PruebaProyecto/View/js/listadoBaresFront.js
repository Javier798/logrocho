var indice = 0;
var sentencia = "";
var ordenar = "";
var cmapos = { Cod_bar: "", Nombre: "", Localizacion: "", Puntuacion: "", Descripcion: "" };
var itemsMowstrados = [];
var departamentos;
var numFilas = 2;
function mostrarDatos() {
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
            data: { indice: indice, "ordenacion": ordenar, cantidad: (parseInt(numFilas) + 1), puntuacionmax: document.getElementById("hasta").value, puntuacion: document.getElementById("desde").value, filtro: document.getElementById("search-input").value },
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
function mostrarDatosFiltros() {
    indice = 0;
    document.querySelector("#bares").innerHTML = "";
    mostrarDatos()
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
    let direccion = document.createElement('h5');
    direccion.innerHTML = datos.Localizacion;
    let estrellas = pintarEstrellas(datos);
    contenedorTituli.appendChild(h5);
    contenedorTituli.className = "contenedorTitulo";
    contenedorTituli.appendChild(estrellas);
    datosBar.appendChild(contenedorTituli);
    datosBar.appendChild(direccion);
    bar.appendChild(imgBar);
    bar.appendChild(datosBar);
    bar.addEventListener("click", () => {
        window.location = "mostrarInfoBaresFront?id=" + datos.Cod_bar;
    })
    return bar;
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
        if ($(window).scrollTop() != 0) {
            document.getElementById("subir").style.display = "flex";
        } else {
            document.getElementById("subir").style.display = "none";
        }
        if ($(window).scrollTop() == $(document).height() - $(window).height()) {
            numFilas = 2;

            mostrarDatos();
        }
    });
});
function verMas() {
    numFilas = 2;

    mostrarDatos();
}
function subir() {
    $(window).scrollTop(0);
}
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
            intervalo = crearIntervalo(resultados[1]);
            img.style.background = "url(" + imagenes[0] + ") no-repeat scroll center center";
            img.style.backgroundSize="cover";
            document.getElementById("descripcionBar").innerHTML = resultados[0].Descripcion;
            document.getElementById("direccionBar").innerHTML = resultados[0].Localizacion;
            document.getElementById("puntuacion").appendChild(pintarEstrellas(resultados[0]));
            let titulo = document.getElementById("tituloPagina").children[0];
            titulo.innerHTML = resultados[0].Nombre;
           
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

    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');



        $.ajax({
            url: "getPinchosPorBarFront",
            method: 'POST',
            data: { id: id },
            //dataType: 'json',
            success: function (json) {
                resultados = eval(json);
                
                
                let contenedorBares = document.querySelector("#bares");
                setTimeout(() => {
                    for (let i = 0; i < resultados.length; i++) {
                        contenedorBares.appendChild(construirFilaPincho(resultados[i]));
                        
                    }    
                }, 100);
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


function construirFilaPincho(datos, n) {

    let bar = document.createElement('div');
    bar.className="bar";
    let imgBar=document.createElement('div');
    imgBar.className="imgBar";
    imgBar.style.backgroundImage="url("+datos.Ruta+")";
    let datosBar=document.createElement('div');
    datosBar.className="datosBar";
    let contenedorTituli=document.createElement('div');
    let h5=document.createElement('h5');
    h5.innerHTML=datos.Nombre;
    let estrellas=pintarEstrellas(datos);
    contenedorTituli.appendChild(h5);
    datosBar.appendChild(contenedorTituli);
    datosBar.appendChild(estrellas);
    bar.appendChild(imgBar);
    bar.appendChild(datosBar);
    bar.style.borderBottom ="solid 1px black";
    bar.addEventListener("click",()=>{
        window.location="mostrarInfoPinchosFront?id="+datos.Cod_pincho;
    });
    return bar;
    
}

function pintarEstrellas(datos) {
    datos.Puntuacion = datos.Puntuacion / 2;
    let devolver = document.createElement('div');
    devolver.className = "estrellas";
    if (datos.Puntuacion >= 0.5) {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        parrafo.style.color = "yellow";
        devolver.appendChild(parrafo);
    } else {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        devolver.appendChild(parrafo);
    }
    if (datos.Puntuacion >= 1) {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        parrafo.style.color = "yellow";
        devolver.appendChild(parrafo);
    } else {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        devolver.appendChild(parrafo);
    }
    if (datos.Puntuacion >= 3) {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        parrafo.style.color = "yellow";
        devolver.appendChild(parrafo);
    } else {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        devolver.appendChild(parrafo);
    }
    if (datos.Puntuacion >= 4) {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        parrafo.style.color = "yellow";
        devolver.appendChild(parrafo);
    } else {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        devolver.appendChild(parrafo);
    }
    if (datos.Puntuacion == 5) {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        parrafo.style.color = "yellow";
        devolver.appendChild(parrafo);
    } else {
        let parrafo = document.createElement("p");
        parrafo.appendChild(document.createTextNode("★"));
        devolver.appendChild(parrafo);
    }
    return devolver;
}
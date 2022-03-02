function cambiarImagen(item) {
    document.getElementById("imagenMostrada").src = item.src;
}


var barActual;
var idImg1, idImg2, idImg3;
window.onload = () => {
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');
    getUsuarios();

    $.ajax({
        url: "getPinchoDetalle",
        method: 'POST',
        data: { id: id },
        //dataType: 'json',
        success: function (json) {
            resultados = eval(json);
            intervalo = crearIntervalo(resultados[1]);
            img.style.background = "url(" + imagenes[0] + ") no-repeat scroll center center";
            img.style.backgroundSize = "cover";
            document.getElementById("descripcionBar").innerHTML = resultados[0].Descripcion;
            document.getElementById("direccionBar").innerHTML = resultados[0].NombreBar;
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
        url: "getTodasResenasPorPincho",
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
function buscarUsuarios(datos) {
    for (let i = 0; i < usuarios.length; i++) {
        var keys = Object.keys(usuarios[i]);
        if (parseInt(keys) == datos.Fk_usuarios) {
            return Object.values(usuarios[i]);
        }
    }
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

function construirFilaPincho(datos, n) {
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
    contendorInfo.className="contendorInfo";
    like.innerHTML = "<i class='like fa fa-2x fa-thumbs-o-up aria-hidden='true'></i>";
    if(datos.likes>0){
        like.children[0].style.color="#c1a36a";
    }
    contenido.appendChild(parteIzquierda);
    contendorInfo.appendChild(like);
    contendorInfo.appendChild(estrellas);
    infoResena.appendChild(contendorInfo);
    contenido.appendChild(infoResena);
    resena.appendChild(contenido);

    like.addEventListener("click",(event)=>{
        let funcion="";
        let id = datos.Cod_resena;;
        if(event.target.style.color!=""){
            event.target.style.color="";
            funcion="borrarLike";
            
        }else{
            event.target.style.color="#c1a36a";
            funcion="anadirLikes";
            
        }
        
        $.ajax({
            method: "POST",
            url: funcion,
            data:{id,id},
            success: function (response) {
                
    
            }
        });
        
    })
    return resena;
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
function aniadirResenias() {
    let mensaje  = document.getElementById("mensaje").value;
    let puntuacuion = document.getElementById("valoracion").value;
    $.ajax({
        method: "POST",
        url: funcion,
        data:{id,id},
        success: function (response) {
            

        }
    });
}
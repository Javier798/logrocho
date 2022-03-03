let imagenes = ["../View/img/pinchoMejorValorado1.jpg", "../View/img/pinchoMejorValorado2.jpg", "../View/img/pinchoMejorValorado3.jpg"];
let posicion = 0;
let img = document.getElementById("imagenMostrada");
let barras = document.getElementsByClassName("barra");
var intervalo;
let mostrando = "favoritos";
let contador = 0;
let funcionar = true;/*
window.onload = () => {
    intervalo = crearIntervalo();
    img.style.background = "url("+imagenes[0]+") no-repeat scroll center center";
}
*/
function crearIntervalo(rutas) {
    if (contador == 0) {
        imagenes = rutas;
        contador++;
    }

    return setInterval(() => {
        if (funcionar) {
            if (imagenes[posicion + 1] != undefined) {

                img.style.animationName = "";
                
                barras[posicion].classList.remove("activada");
                setTimeout(() => {
                    if (mostrando == "favoritos") {
                        img.style.animationName = "animacionFavoritos";
                        img.style.animationDuration = "1.5s";
                    } else {
                        img.style.animationName = "animacionValorados";
                        img.style.animationDuration = "4s";
                    }


                    posicion += 1;
                    img.style.background = "url(" + imagenes[posicion] + ") no-repeat scroll center center";
                    img.style.backgroundSize = "cover";
                    barras[posicion].className += " activada";
                }, 50);


            } else {
                img.style.animationName = "";
                setTimeout(() => {
                    if (mostrando == "favoritos") {
                        img.style.animationName = "animacionFavoritos";
                        img.style.animationDuration = "1.5s";
                    } else {
                        img.style.animationName = "animacionValorados";
                        img.style.animationDuration = "4s";
                    }
                    barras[posicion].classList.remove("activada");
                    posicion = 0;
                    img.style.background = "url(" + imagenes[posicion] + ") no-repeat scroll center center";
                    img.style.backgroundSize = "cover";

                    barras[posicion].className += " activada";
                }, 50);

            }
        }
    }, 5000);
}
function comprobar(item) {
    if (funcionar == true) {
        funcionar = false;
        clearInterval(intervalo);
    } else {
        intervalo = crearIntervalo();
        funcionar = true;
    }

}
function posicionSlider(n) {
    barras[posicion].classList.remove("activada");
    img.style.animationName = "";
    setTimeout(() => {
        posicion = n;
        barras[posicion].className += " activada";
        clearInterval(intervalo);
        intervalo = crearIntervalo();
        img.style.background = "url(" + imagenes[n] + " no-repeat scroll center center)";
        img.style.backgroundSize="cover";
    }, 50);

}
function avanzar(n) {
    img.style.animationName = "";
    barras[posicion].classList.remove("activada");
    setTimeout(() => {
        if (mostrando == "favoritos") {
            img.style.animationName = "animacionFavoritos";
            img.style.animationDuration = "1.5s";
        } else {
            img.style.animationName = "animacionValorados";
            img.style.animationDuration = "4s";
        }

        if (imagenes[posicion + n] != undefined) {
            posicion += n;
        } else {
            if (posicion != 0) {
                posicion = 0;
            } else {
                posicion = imagenes.length - 1;
            }
        }
        barras[posicion].className += " activada";
        clearInterval(intervalo);
        intervalo = crearIntervalo();

        img.style.background = "url(" + imagenes[posicion] + ") no-repeat scroll center center";
        img.style.backgroundSize = "cover";
    }, 50);

}
function cambiarRutas(item) {
    barras[posicion].classList.remove("activada");
    img.style.animationName = "";
    setTimeout(() => {
        if (mostrando == "favoritos") {
            img.style.animationName = "animacionFavoritos";
            img.style.animationDuration = "1.5s";
        } else {
            img.style.animationName = "animacionValorados";
            img.style.animationDuration = "4s";
        }
        posicion = 0;
        barras[posicion].className += " activada";
        clearInterval(intervalo);

        img.style.background = "url(" + imagenes[posicion] + ") no-repeat scroll center center";
        img.style.backgroundSize = "cover";
        if (mostrando == "favoritos") {
            mostrando = "valorados";

            imagenes = ["../View/img/pinchoFavorito1.jpg", "../View/img/pinchoFavorito2.jpg", "../View/img/pinchoFavorito3.jpg"];
            img.style.background = "url(" + imagenes[0] + ") no-repeat scroll center center";
            img.style.backgroundSize="cover";
        } else if (mostrando == "valorados") {
            mostrando = "favoritos";

            imagenes = ["../View/img/pinchoMejorValorado1.jpg", "../View/img/pinchoMejorValorado2.jpg", "../View/img/pinchoMejorValorado3.jpg"];
            img.style.background = "url(" + imagenes[0] + ") no-repeat scroll center center";
            img.style.backgroundSize = "cover";
        }
        intervalo = crearIntervalo();
    }, 50);


}
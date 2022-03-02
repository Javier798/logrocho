let imagenes = ["../View/img/pinchoMejorValorado1.jpg", "../View/img/pinchoMejorValorado2.jpg", "../View/img/pinchoMejorValorado3.jpg"];
let imagenesMejoresValoradas=[];
let imagenesMasVotadas=[];
let posicion = 0;
let img = document.getElementById("imagenMostrada");

var intervalo;
let mostrando = "favoritos";
let funcionar = true;
window.onload = () => {
    intervalo = crearIntervalo();
    $.ajax({
        method: "POST",
        url: "imagenesMasValoradas",
        success: function (response) {
            bar = eval(response);
            for (let i = 0; i < bar.length; i++) {
                
                imagenesMejoresValoradas.push(bar[i]);    
            }
            imagenes=imagenesMejoresValoradas;
           img.style.backgroundImage = "url("+imagenes[0].ruta+")"; 
        }
    });
    $.ajax({
        method: "POST",
        url: "imagenesMasVotadas",
        success: function (response) {
            bar = eval(response);
            for (let i = 0; i < bar.length; i++) {
                
                imagenesMasVotadas.push(bar[i]);    
            }
            
            
        }
    });
    
}

function crearIntervalo() {
    return setInterval(() => {
        if (funcionar) {
            if (imagenes[posicion + 1] != undefined) {

                img.style.animationName = "";
    
                setTimeout(() => {
                    if (mostrando == "favoritos") {
                        img.style.animationName = "animacionFavoritos";
                        img.style.animationDuration = "1.5s";
                    } else {
                        img.style.animationName = "animacionValorados";
                        img.style.animationDuration = "4s";
                    }


                    posicion += 1;
                    img.style.backgroundImage = "url("+imagenes[posicion].ruta+")";
    
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
    
                    posicion = 0;
                    img.style.backgroundImage = "url("+imagenes[posicion]+") ";

    
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
    
    img.style.animationName = "";
    setTimeout(() => {
        posicion = n;
    
        clearInterval(intervalo);
        intervalo = crearIntervalo();
        img.style.backgroundImage = "url("+imagenes[n].ruta+" )";
    }, 50);

}
function avanzar(n) {
    img.style.animationName = "";
    
    setTimeout(() => {
        if (mostrando == "favoritos") {
            img.style.animationName = "animacionFavoritos";
            img.style.animationDuration = "1.5s";
        } else {
            img.style.animationName = "animacionValorados";
            img.style.animationDuration = "4s";
        }

        if (imagenes[posicion + n].ruta != undefined) {
            posicion += n;
        } else {
            if (posicion != 0) {
                posicion = 0;
            } else {
                posicion = imagenes.length - 1;
            }
        }
        
        clearInterval(intervalo);
        intervalo = crearIntervalo();
        
        img.style.backgroundImage = "url("+imagenes[posicion].ruta+")r";
    }, 50);

}
function cambiarRutas(item) {
    
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
        
        clearInterval(intervalo);
        
        img.style.backgroundImage = "url("+imagenes[posicion].ruta+")";
        if (mostrando == "favoritos") {
            mostrando = "valorados";
            imagenes=imagenesMasVotadas;
            //imagenes = ["../View/img/pinchoFavorito1.jpg", "../View/img/pinchoFavorito2.jpg", "../View/img/pinchoFavorito3.jpg"];
            img.style.backgroundImage = "url("+imagenes[0].ruta+")";
        } else if (mostrando == "valorados") {
            mostrando = "favoritos";
            imagenes=imagenesMejoresValoradas;
            //imagenes = ["../View/img/pinchoMejorValorado1.jpg", "../View/img/pinchoMejorValorado2.jpg", "../View/img/pinchoMejorValorado3.jpg"];
            img.style.backgroundImage = "url("+imagenes[0].ruta+")";
        }
        intervalo = crearIntervalo();    
    }, 50);
    

}
window.onload = () => {
    $.ajax({
        url: "getBares",
        method: 'POST',
        //dataType: 'json',
        success: function (json) {
            resultados = eval(json);


            let contenedorBares = document.querySelector("#listadoBares");
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

var mymap = L.map('mimapa').setView([42.46559459356974, -2.4483092241897157], 18);
let mapLink ='<a href="http://openstreetmap.org/%22%3EOpenStreetMap</a>';
L.tileLayer(
    'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; ' + mapLink,
    maxZoom: 18,
}).addTo(mymap);



function construirFila(datos, n) {

    let bar = document.createElement('div');
    bar.className = "bar";
    bar.id = datos.Cod_bar;
    bar.addEventListener("click", () => {
        cambiaColor(datos.Cod_bar);
    });
    let superior = document.createElement('div');
    superior.className = "parteSuperior";
    let inferior = document.createElement('div');
    inferior.className = "parteInferior";
    let h4 = document.createElement('h4');
    h4.innerHTML = datos.Nombre;
    let h6 = document.createElement('h6');
    h6.innerHTML = datos.Longitud + ", " + datos.Latitud;
    inferior.appendChild(h6);
    superior.appendChild(h4);
    bar.appendChild(superior);
    bar.appendChild(inferior);
    var marker
    bar.addEventListener("click", () => {
        if (marker == undefined) {
            marker = L.marker([parseFloat(datos.Longitud), parseFloat(datos.Latitud)]);
            marker.addTo(mymap);
        } else {
            marker.remove();
            marker = undefined;
        }
    });
    return bar;
}
function cambiaColor(item) {
    item = document.getElementById(item);
    if (item.className == "bar") {
        item.className = "seleccionado";
    } else {
        item.className = "bar";
    }
}

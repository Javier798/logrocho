function verReseña() {
    window.location.href = "infoResena";
}
function cambiarImagen(item) {
    document.getElementById("imagenMostrada").src = item.src;
}
var bar;
var bares = [];


window.onload = () => {
    getBar();

}

function getBar() {
    $.ajax({
        method: "POST",
        url: "nombreBares",
        success: function (response) {
            bar = eval(response);
            createSELECT();
            var keys = Object.keys(bar[2]);
        }
    });

}

function createSELECT() {

    let select = document.getElementById("selectBares");

    for (let index = 0; index < bar.length; index++) {


        let option = document.createElement("option");


        option.setAttribute("value", Object.keys(bar[index]));


        let optionText = document.createTextNode(Object.values(bar[index]));
        option.appendChild(optionText);


        select.appendChild(option);
    }
}




function esNumero(event) {
    if (!/^[0-9]$/.test(event.key)) {
        event.preventDefault();
        event.stopPropagation();
        return false;
    }
}

function cancelar() {
    window.location.reload();
}

function previsualizacion(item, id, idpapelera, idArchivo) {
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var pinchoActual = urlParams.get('id');
    let imagen = document.getElementById(id);
    const primerArchivo = item.files[0];
    // Lo convertimos a un objeto de tipo objectURL
    const objectURL = URL.createObjectURL(primerArchivo);
    // Y a la fuente de la imagen le ponemos el objectURL
    imagen.src = objectURL;
    imagen.style.display = "block";
    document.getElementById(idpapelera).style.display = "block";
    document.getElementById(idArchivo).style.display = "none";
}
function eliminarImagen(item, id, idpapelera, idArchivo, inputarchivo) {
    item = document.getElementById(inputarchivo);

    let imagen = document.getElementById(idArchivo);
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var pinchoActual = urlParams.get('id');
    // Lo convertimos a un objeto de tipo objectURL

    // Y a la fuente de la imagen le ponemos el objectURL
    let url;
    imagen.style.display = "none";
    document.getElementById(idpapelera).style.display = "none";
    document.getElementById(id).style.display = "none";
    document.getElementById(idArchivo).style.display = "block";
    item.value = '';
}
function guardarPincho(params) {
    let nombre = document.getElementById("nombrePincho").value;
    let descripcion = document.getElementById("descPincho").value;
    let pertenecea = document.getElementById("selectBares").value;
    $.ajax({
        type: "POST",
        url: "altaPincho",
        data: { nombre: nombre, descripcion: descripcion, bar: pertenecea, puntuacion: "" },
        success: function (response) {
            guardarImagenes();
        }
    });
}
function guardarImagenes() {
    let datos;
    $.ajax({
        type: "POST",
        url: "getUltimoPincho",
        success: function (response) {
            datos = eval(response);
            let imagen1 = document.getElementById("archivos1");
        let imagen2 = document.getElementById("archivos2");
        let imagen3 = document.getElementById("archivos3");
        if (imagen1.files.length > 0) {
            var formData = new FormData();
            formData.append('imagen', imagen1.files[0]);
            formData.append('pincho', datos[0].max);
            $.ajax({
                url: 'guardarImagenPincho',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {

                }
            });
        }
        if (imagen2.files.length > 0) {
            var formData = new FormData();
            formData.append('imagen', imagen2.files[0]);
            formData.append('pincho', datos[0].max);
            $.ajax({
                url: 'guardarImagenPincho',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {

                }
            });
        }
        if (imagen3.files.length > 0) {
            var formData = new FormData();
            formData.append('imagen', imagen3.files[0]);
            formData.append('pincho', datos[0].max);
            $.ajax({
                url: 'guardarImagenPincho',
                type: 'post',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    
                }
            });
        }
        }
    });
    setTimeout(() => {
        window.location.reload();    
    }, 100);
    
}
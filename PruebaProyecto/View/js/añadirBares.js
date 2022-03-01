function cambiarImagen(item) {
    document.getElementById("imagenMostrada").src = item.src;
}


var barActual;
var idImg1, idImg2, idImg3;

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

function cancelar() {
    window.location.reload();
}

function previsualizacion(item, id, idpapelera, idArchivo) {
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

    let imagen = document.getElementById(id);

    // Lo convertimos a un objeto de tipo objectURL
    item.value="";
    // Y a la fuente de la imagen le ponemos el objectURL
    let url = imagen.src.split("/");
    imagen.style.display = "none";
    document.getElementById(idpapelera).style.display = "none";
    document.getElementById(idArchivo).style.display = "block";
}



function guardarBar(params) {
    let nombre = document.getElementById("nombreBar").value;
    let descripcion = document.getElementById("descripcionBar").value;
    let direccion = document.getElementById("direccionBar").value;
    let longitud = document.getElementById("longitudBar").value;
    let latitud = document.getElementById("latitudBar").value;
    $.ajax({
        type: "POST",
        url: "altaBar",
        data: { nombre: nombre, descripcion: descripcion, localizacion: direccion, puntuacion: "",latitud:latitud,longitud:longitud },
        success: function (response) {
            guardarImagenes();
        }
    });
}
function guardarImagenes() {
    let datos;
    $.ajax({
        type: "POST",
        url: "getUltimoBar",
        success: function (response) {
            datos = eval(response);
            let imagen1 = document.getElementById("archivos1");
            let imagen2 = document.getElementById("archivos2");
            let imagen3 = document.getElementById("archivos3");
            if (imagen1.files.length > 0) {
                var formData = new FormData();
                formData.append('imagen', imagen1.files[0]);
                formData.append('bar', datos[0].max);
                $.ajax({
                    url: 'guardarImagenBar',
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (imagen2.files.length > 0) {
                            var formData = new FormData();
                            formData.append('imagen', imagen2.files[0]);
                            formData.append('bar', datos[0].max);
                            $.ajax({
                                url: 'guardarImagenBar',
                                type: 'post',
                                data: formData,
                                contentType: false,
                                processData: false,
                                success: function (response) {
                                    if (imagen3.files.length > 0) {
                                        var formData = new FormData();
                                        formData.append('imagen', imagen3.files[0]);
                                        formData.append('bar', datos[0].max);
                                        $.ajax({
                                            url: 'guardarImagenBar',
                                            type: 'post',
                                            data: formData,
                                            contentType: false,
                                            processData: false,
                                            success: function (response) {
                                                window.location.reload();
                                            }
                                        });
                                    }else{
                                        window.location.reload();
                                    }
                                }
                            });
                        }else{
                            if (imagen3.files.length > 0) {
                                var formData = new FormData();
                                formData.append('imagen', imagen3.files[0]);
                                formData.append('bar', datos[0].max);
                                $.ajax({
                                    url: 'guardarImagenBar',
                                    type: 'post',
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success: function (response) {
                                        window.location.reload();
                                    }
                                });
                            }else{
                                window.location.reload();
                            }
                        }
                    }
                });
            }else{
                if (imagen2.files.length > 0) {
                    var formData = new FormData();
                    formData.append('imagen', imagen2.files[0]);
                    formData.append('bar', datos[0].max);
                    $.ajax({
                        url: 'guardarImagenBar',
                        type: 'post',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            if (imagen3.files.length > 0) {
                                var formData = new FormData();
                                formData.append('imagen', imagen3.files[0]);
                                formData.append('bar', datos[0].max);
                                $.ajax({
                                    url: 'guardarImagenBar',
                                    type: 'post',
                                    data: formData,
                                    contentType: false,
                                    processData: false,
                                    success: function (response) {
                                        window.location.reload();
                                    }
                                });
                            }else{
                                window.location.reload();
                            }
                        }
                    });
                }else{
                    if (imagen3.files.length > 0) {
                        var formData = new FormData();
                        formData.append('imagen', imagen3.files[0]);
                        formData.append('bar', datos[0].max);
                        $.ajax({
                            url: 'guardarImagenBar',
                            type: 'post',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function (response) {
                                window.location.reload();
                            }
                        });
                    }else{
                        window.location.reload();
                    }
                }
            }
            
            
        }
    });
 setTimeout(() => {
    window.location.reload();
 }, 300); 
}

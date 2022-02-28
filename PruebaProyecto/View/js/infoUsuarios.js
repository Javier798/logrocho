function verReseña() {
    window.location.href = "infoResena";
}
function cambiarImagen(item) {
    document.getElementById("imagenMostrada").src = item.src;
}
var bar;
var bares = [];
var idImg1;
var usuarioactual,nombreUsu,codigo;
console.error=function () {};
window.onload = () => {
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');


    $.ajax({
        url: "getUsuariosDetalle",
        method: 'POST',
        data: { id: id },
        //dataType: 'json',
        success: function (json) {
            resultados = eval(json);
            document.getElementById("nombreUsuario").value = resultados[0].Nombre;
            document.getElementById("apellidoUsuario").value = resultados[0].Apellido;
            document.getElementById("emailUsuario").value = resultados[0].Email;
            document.getElementById("contraseñaUsuario").value = resultados[0].Contrasena;
            codigo=resultados[0].Cod_usuario;
            usuarioactual=resultados[0].Cod_usuario;
            nombreUsu=resultados[0].Nombre;
            if (resultados[1][0] != undefined) {
                document.getElementById("trash").style.display = "block";
                document.getElementById("img1").style.display = "block";
                document.getElementById("img1").src = resultados[1][0];
                document.getElementById("getArchivo1").value = resultados[1][0];
                document.getElementById("getArchivo1").style.display = "none";
                
                idImg1 = resultados[1][0];
            }
            mostrarDatos();
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        }
    });
}
function esLetra(event) {
    if (!/^[a-zA-Z]$/.test(event.key)) {
        event.preventDefault();
        event.stopPropagation();
        return false;
    }
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
function createSELECT(res) {
    let cont = 0;
    for (let i = 0; i < bar.length; i++) {
        if (res[0].Fk_bar == Object.keys(bar[i])[0]) {
            cont = i;
        }
        bares.push(Object.values(bar[i])[0]);

    }
    let select = document.getElementById("selectBares");
    if (bares && Array.isArray(bares)) {
        for (let index = 0; index < bares.length; index++) {
            const element = bares[index];

            let option = document.createElement("option");


            option.setAttribute("value", element);

            if (index == cont) {
                option.selected = true;
            }
            let optionText = document.createTextNode(element);
            option.appendChild(optionText);


            select.appendChild(option);
        }
    }


}

function cancelar() {
    window.location.reload();
}

function enviarDatos() {
    let nombre = document.getElementById("nombreUsuario").value;
    let apellido = document.getElementById("apellidoUsuario").value;
    let email = document.getElementById("emailUsuario").value;
    let contrasena = document.getElementById("contraseñaUsuario").value;
    let rol = document.getElementById("rolUsuario").value;
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');

    $.ajax({
        type: "POST",
        url: "modificarUsuario",
        data: { nombre: nombre, apellido: apellido, email: email, contrasena: contrasena, rol: rol, id: id },
        success: function (response) {


        }
    });

}

function eliminar() {

    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');

    $.ajax({
        type: "POST",
        url: "bajaUsuario",
        data: { id: id },
        success: function (response) {
            window.location = "listadoUsuarios"
        }
    });

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
    var formData = new FormData();
    var files = item.files[0];

    formData.append('imagen', files);
    formData.append('usuario', pinchoActual);
    $.ajax({
        url: 'guardarImagenUsuario',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {

        }
    });

}

function eliminarImagen(item, id, idpapelera, idArchivo, inputarchivo) {
    item = document.getElementById(inputarchivo);

    let imagen = document.getElementById(id);
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var pinchoActual = urlParams.get('id');
    // Lo convertimos a un objeto de tipo objectURL

    // Y a la fuente de la imagen le ponemos el objectURL
    let url = imagen.src.split("/");
    imagen.style.display = "none";
    document.getElementById(idpapelera).style.display = "none";
    document.getElementById(idArchivo).style.display = "block";
    let nombre;
    if (idImg1 != undefined) {
        url = idImg1.split("/");
        nombre = url[url.length - 1];
        idImg1=undefined;
    } else {
        nombre = item.files[0].name
        item.value = '';
    }
    let borrar;
        var formData = new FormData();
        formData.append('id', borrar);
        formData.append('nombre', nombre);
        formData.append('usuario', pinchoActual);
        $.ajax({
            url: 'eliminarImagenUsuario',
            type: 'post',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {

            }
        });
}

function eliminarLikes() {
    $.ajax({
        type: "POST",
        url: "borrarLikes",
        data: {id:usuarioactual},
        success: function (response) {
            
        }
    });
}


/*----------------------------------------------------------------------------------------------------------------------*/


var indice = 0;
var sentencia = "";
var ordenar = "";
var cmapos = { Cod_resena: "", Mensaje: "", Valoracion: "", Fk_pinchos: "", Fk_usuarios: "",Likes:"" };
var itemsMowstrados = [];
var pinchos, usuarios;
function mostrarDatos() {

    getPinchos();
    getUsuarios();

    var numFilas = parseInt(document.getElementById("cantidad").value);;//parseInt(document.getElementById("selectFilas").value);
    if (indice == 0) {
        $("[name=anterior]").prop("disabled", true);
    } else {
        $("[name=anterior]").prop("disabled", false);
    }
    const valores = window.location.search;
    const urlParams = new URLSearchParams(valores);
    var id = urlParams.get('id');

    if (numFilas == "") {
        $("#tabla").html("");
        return;
    } else {
        if (indice < 0) {
            indice = 0;
        }
        $.ajax({
            url: "getResenasPorUsuarioLimit",
            method: 'POST',
            data: { indice: indice,id:id, "ordenacion": ordenar, "cantidad": (parseInt(numFilas) + 1) },
            //dataType: 'json',
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
                    //$("#tabla").html("");
                    //$("#tabla").append(tbody);
                }, 100);
            },
            error: function (xhr, status) {
                alert('Disculpe, existió un problema');
            }
        });
    }
}
function getPinchos() {
    $.ajax({
        method: "POST",
        url: "nombrePinchos",
        success: function (response) {
            pinchos = eval(response);

        }
    });

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
    }
    if(item!=itemAnterior){
        itemAnterior.style.borderBottom = "";
    }else if(item=itemAnterior){
        itemAnterior.style.borderBottom = "";
        
    }
    itemAnterior=item;
    for (let i = 0; i < s.length; i++) {
        let fila = construirFila(s[i], s[i].Cod_usuarios);
        tbody.appendChild(fila);
    }
}

function sortArray(id, array) {
    switch (id) {
        case "Cod_reseña":
            array.sort(function (a, b) {
                return (b.Cod_resena - a.Cod_resena)
            })
            break;
        case "Mensaje":
            array.sort(function (a, b) {
                return ((a.Mensaje < b.Mensaje) ? -1 : ((a.Mensaje > b.Mensaje) ? 1 : 0));
            })
            break;
        case "Valoracion":
            array.sort(function (a, b) {
                return (b.Valoracion - a.Valoracion)
            })
            break;
        case "Puntuacion":
            array.sort(function (a, b) {
                return (a.Fk_pinchos - b.Fk_pinchos)
            })
            break;
        case "Fk_pinchos":
            array.sort(function (a, b) {
                return (b.Fk_pinchos - a.Fk_pinchos)
            })
            break;
        case "Fk_usuarios":
            array.sort(function (a, b) {
                return (b.Fk_usuarios - a.Fk_usuarios)
            })
            break;
        case "Likes":
            array.sort(function (a, b) {
                return (b.likes - a.likes)
            })
            break;
    }
}

function SortArrayInverso(id, array) {
    switch (id) {
        case "Cod_reseña":
            array.sort(function (a, b) {
                return (a.Cod_resena - b.Cod_resena)
            })
            break;
        case "Mensaje":
            array.sort(function (a, b) {
                return ((b.Mensaje < a.Mensaje) ? -1 : ((b.Mensaje > a.Mensaje) ? 1 : 0));
            })
            break;
        case "Valoracion":
            array.sort(function (a, b) {
                return (a.Valoracion - b.Valoracion)
            })
            break;
        case "Puntuacion":
            array.sort(function (a, b) {
                return (a.Fk_pinchos - b.Fk_pinchos)
            })
            break;
        case "Fk_pinchos":
            array.sort(function (a, b) {
                return (a.Fk_pinchos - b.Fk_pinchos)
            })
            break;
        case "Fk_usuarios":
            array.sort(function (a, b) {
                return (a.Fk_usuarios - b.Fk_usuarios)
            })
            break;
        case "Likes":
            array.sort(function (a, b) {
                return (a.likes - b.likes)
            })
            break;
    }
}

function construirCabecera() {
    var cabecera = document.createElement('tr');

    var titulo = document.createElement('th');
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Cod Reseña");

    titulo.appendChild(texto);
    titulo.scope = "col";
    titulo.id = "Cod_reseña";
    titulo.className = "col1";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Cod_reseña"));

    });
    contenedor.appendChild(texto);
    contenedor.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    titulo.appendChild(contenedor);
    cabecera.appendChild(titulo);


    var titulo = document.createElement('th');
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Mensaje");
    titulo.id = "Mensaje";
    titulo.scope = "col";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Mensaje"));
    });

    contenedor.appendChild(texto);
    contenedor.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    titulo.appendChild(contenedor);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Valoracion");
    titulo.scope = "col";
    titulo.id = "Valoracion";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Valoracion"));
    });


    contenedor.appendChild(texto);
    contenedor.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    titulo.appendChild(contenedor);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Pincho");
    titulo.id = "Fk_pinchos";
    titulo.scope = "col";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Fk_pinchos"));
    });

    contenedor.appendChild(texto);
    contenedor.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    titulo.appendChild(contenedor);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Usuario");
    titulo.id = "Fk_usuarios";
    titulo.scope = "col";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Fk_usuarios"));
    });
    contenedor.appendChild(texto);
    contenedor.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    titulo.appendChild(contenedor);
    cabecera.appendChild(titulo);
    var titulo = document.createElement('th');
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Likes");
    titulo.id = "Likes";
    titulo.scope = "col";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Likes"));
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
    campo.className = "Cod_resena";
    campo.type = "number";
    titulo.scope = "row";
    campo.innerHTML = datos.Cod_resena;
    campo.setAttribute("readonly", true);
    titulo.appendChild(campo);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var campo = document.createElement('p');
    campo.className = "Mensaje";
    campo.type = "text";
    if(datos.Mensaje.length>130){
        campo.innerHTML = datos.Mensaje.substring(0,130) +"...";
    }else{
        campo.innerHTML = datos.Mensaje;
    }
    titulo.appendChild(campo);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var campo = document.createElement('p');
    campo.className = "Valoracion";
    campo.type = "text";
    campo.innerHTML = datos.Valoracion;
    titulo.appendChild(campo);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var campo = document.createElement('p');
    campo.className = "Fk_pinchos";
    campo.type = "number";
    campo.innerHTML = buscarPinchos(datos);
    titulo.appendChild(campo);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var campo = document.createElement('p');
    campo.className = "Fk_usuarios";
    campo.type = "text";
    campo.innerHTML = buscarUsuarios(datos);

    titulo.appendChild(campo);
    linea.appendChild(titulo);


    var titulo = document.createElement('td');
    var campo = document.createElement('p');
    campo.className = "Likes";
    campo.type = "number";
    campo.innerHTML = datos.likes;

    titulo.appendChild(campo);
    linea.appendChild(titulo);


    var titulo = document.createElement('td');
    var campo = document.createElement('a');
    campo.className = "btn btn-primary";
    campo.innerHTML = "ver";
    campo.href = "infoResena?id=" + datos.Cod_resena+"&coUsu="+codigo;
    titulo.appendChild(campo);
    linea.appendChild(titulo);

    return linea;
}

function buscarPinchos(datos) {
    for (let i = 0; i < pinchos.length; i++) {
        var keys = Object.keys(pinchos[i]);
        if (parseInt(keys) == datos.Fk_pinchos) {
            return Object.values(pinchos[i]);
        }
    }
}
function buscarUsuarios(datos) {
    for (let i = 0; i < usuarios.length; i++) {
        var keys = Object.keys(usuarios[i]);
        if (parseInt(keys) == datos.Fk_usuarios) {
            return Object.values(usuarios[i]);
        }
    }
}

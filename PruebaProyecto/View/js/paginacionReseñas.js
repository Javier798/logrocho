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


    if (numFilas == "") {
        $("#tabla").html("");
        return;
    } else {
        if (indice < 0) {
            indice = 0;
        }
        $.ajax({
            url: "getResenasLimit",
            method: 'POST',
            data: { indice: indice, "ordenacion": ordenar, "cantidad": (parseInt(numFilas) + 1) },
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
        if(item!=itemAnterior){
            itemAnterior.style.borderBottom = "";
        }else if(item=itemAnterior){
            itemAnterior.style.borderBottom = "";
        }
    }
    if(item!=itemAnterior){
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
    campo.href = "infoResena?id=" + datos.Cod_resena;
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

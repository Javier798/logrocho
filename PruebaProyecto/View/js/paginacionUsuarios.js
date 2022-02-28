var indice = 0;
var sentencia = "";
var ordenar = "";
var cmapos = { Cod_usuario: "", Nombre: "", Apellido: "", Email: "", Contraseña: "", Rol: "" };
var itemsMowstrados = [];
var departamentos;
var claveOrdenacion;
function mostrarDatos() {
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
            url: "getUsuariosLimit",
            method: 'POST',
            data: { indice: indice, "ordenacion": ordenar, cantidad: (parseInt(numFilas) + 1) },
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
function getIDDepartamentos() {
    $.ajax({
        type: "GET",
        url: "getIDDepart.php",
        dataType: "json",
        success: function (response) {
            var json = response;
            departamentos = eval(json);
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
        case "Cod_usuario":
            array.sort(function (a, b) {
                return (a.Cod_usuario - b.Cod_usuario)
            })
            break;
        case "Nombre":
            array.sort(function (a, b) {
                return ((a.Nombre < b.Nombre) ? -1 : ((a.Nombre > b.Nombre) ? 1 : 0));
            })
            break;
        case "Apellido":
            array.sort(function (a, b) {
                return ((a.Apellido < b.Apellido) ? -1 : ((a.Apellido > b.Apellido) ? 1 : 0));
            })
            break;
        case "Email":
            array.sort(function (a, b) {
                return ((a.Email < b.Email) ? -1 : ((a.Email > b.Email) ? 1 : 0));
            })
            break;
        case "Rol":
            array.sort(function (a, b) {
                return ((a.Rol < b.Rol) ? -1 : ((a.Rol > b.Rol) ? 1 : 0));
            })
            break;
    }
}

function SortArrayInverso(id, array) {
    switch (id) {
        case "Cod_usuario":
            array.sort(function (a, b) {
                return (b.Cod_usuario - a.Cod_usuario)
            })
            break;
        case "Nombre":
            array.sort(function (a, b) {
                return ((b.Nombre < a.Nombre) ? -1 : ((b.Nombre > a.Nombre) ? 1 : 0));
            })
            break;
        case "Apellido":
            array.sort(function (a, b) {
                return ((b.Apellido < a.Apellido) ? -1 : ((b.Apellido > a.Apellido) ? 1 : 0));
            })
            break;
        case "Email":
            array.sort(function (a, b) {
                return ((b.Email < a.Email) ? -1 : ((b.Email > a.Email) ? 1 : 0));
            })
            break;
        case "Rol":
            array.sort(function (a, b) {
                return ((b.Rol < a.Rol) ? -1 : ((b.Rol > a.Rol) ? 1 : 0));
            })
            break;
    }
}


function construirCabecera() {
    var cabecera = document.createElement('tr');

    var titulo = document.createElement('th');
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Cod usuario");
    contenedor.appendChild(texto);
    contenedor.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    titulo.appendChild(contenedor);
    titulo.scope = "col";
    titulo.id = "Cod_usuario";
    titulo.className = "col1";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Cod_usuario"));

    });

    cabecera.appendChild(titulo);


    var titulo = document.createElement('th');
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Nombre");

    contenedor.appendChild(texto);
    contenedor.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    titulo.appendChild(contenedor);

    titulo.id = "Nombre";
    titulo.scope = "col";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Nombre"));
    });


    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Apellido");
    titulo.scope = "col";
    titulo.id = "Apellido";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Apellido"));
    });


    contenedor.appendChild(texto);
    contenedor.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    titulo.appendChild(contenedor);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Email");
    titulo.id = "Email";
    titulo.scope = "col";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Email"));
    });
    contenedor.appendChild(texto);
    contenedor.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    titulo.appendChild(contenedor);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Contraseña");
    titulo.id = "Contraseña";
    titulo.scope = "col";
    contenedor.appendChild(texto);
    contenedor.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    titulo.appendChild(contenedor);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');
    var contenedor = document.createElement('p');
    var texto = document.createTextNode("Rol");
    titulo.id = "Rol";
    titulo.scope = "col";
    titulo.addEventListener("click", () => {
        ordenacion(document.getElementById("Rol"));
    });
    contenedor.appendChild(texto);
    contenedor.innerHTML += "<i class='fa fa-sort' aria-hidden='true'></i>";
    titulo.appendChild(contenedor);
    cabecera.appendChild(titulo);

    var titulo = document.createElement('th');

    cabecera.appendChild(titulo);
    return cabecera;
}

function insertarFila() {
    $.ajax({
        type: "GET",
        url: "insertarEmpleado.php",
        dataType: "json",
        success: function (response) {
            var json = response;
            resultado = eval(json);
            $("#tablaEmpleados").append(document.createElement("tr").appendChild(construirFila(resultado[0], resultado[0]["emp_no"])));
        }
    });
}
function actualizarFila(item, n) {
    n = parseInt(n);
    var valorOriginal = item.value;
    $.ajax({
        type: "GET",
        url: "updateFila.php?" + "clave=" + item.className + "&valor=" + valor + "&numero=" + n,
        dataType: "json",
        success: function (response) {
            var json = response;
            resultado = eval(json);

            item.value = valorOriginal;
        }
    });

    var valor = comprobarDatos(item.className, item.value);
    if (valor == false) {
        event.preventDefault();
        event.stopImmediatePropagation();
        alert("Escriba correctamente el campo: " + item.className);
        return;
    }

}
function comprobarDatos(clave, valor) {
    switch (clave) {
        case "emp_no":
            return valor;
        case "apellido":
            if (/^[a-zA-Z]+$/.test(valor)) {
                return valor;
            } else {
                return false;
            }

        case "oficio":
            if (/^[a-zA-Z]+$/.test(valor)) {
                return valor;
            } else {
                return false;
            }
        case "dir":
            if (/^[0-9]+$/.test(valor)) {
                return parseInt(valor);
            } else {
                return false;
            }
        case "fecha_alt":
            if (/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/.test(valor)) {
                return valor;
            } else {
                return false;
            }

        case "salario":
            if (/^[0-9]+$/.test(valor)) {
                return parseInt(valor);
            } else {
                return false;
            }
        case "comision":
            if (/^[0-9]+$/.test(valor)) {
                return parseInt(valor);
            } else {
                return false;
            }

        case "dept_no":
            return parseInt(valor);

        default:
            break;
    }
}
function construirFila(datos, n) {
    linea = document.createElement('tr');

    var titulo = document.createElement('td');
    var campo = document.createElement('p');
    campo.className = "Cod_usuairo";
    campo.type = "number";
    titulo.scope = "row";
    campo.innerHTML = datos.Cod_usuario;
    campo.setAttribute("readonly", true);
    titulo.appendChild(campo);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var campo = document.createElement('p');
    campo.className = "Nombre";
    campo.type = "text";
    campo.innerHTML = datos.Nombre;
    titulo.appendChild(campo);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var campo = document.createElement('p');
    campo.className = "Apellido";
    campo.type = "text";
    campo.innerHTML = datos.Apellido;
    titulo.appendChild(campo);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var campo = document.createElement('p');
    campo.className = "Email";
    campo.type = "number";
    campo.innerHTML = datos.Email;
    titulo.appendChild(campo);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var campo = document.createElement('p');
    campo.className = "Contraseña";
    campo.type = "text";
    campo.innerHTML = datos.Contrasena;
    titulo.appendChild(campo);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var campo = document.createElement('p');
    campo.className = "Rol";
    campo.type = "text";
    campo.innerHTML = datos.Rol;
    titulo.appendChild(campo);
    linea.appendChild(titulo);

    var titulo = document.createElement('td');
    var campo = document.createElement('a');
    campo.className = "btn btn-primary";
    campo.innerHTML = "ver";
    campo.href = "infoUsuarios?id=" + datos.Cod_usuario;
    titulo.appendChild(campo);
    linea.appendChild(titulo);
    return linea;
}
function anadirUsu() {
    window.location="anadirUsuario";
}
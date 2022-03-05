<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../View/styles/infoUsuariosFront.css">
    <link rel="stylesheet" href="../View/styles/menuFront.css">
    <link rel="stylesheet" href="../View/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="../View/styles/ionicons.min.css">
    <link rel="stylesheet" href="../View/styles/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../View/styles/paginacion.css">
    <title>Document</title>
</head>

<body>
    <nav class="menuNav">
        <div id="logo">
            <img onclick="window.location='home'" src="../View/img/logo.PNG" alt="">
        </div>
        <div id="navegador">
            <div id="logrocho">
            <a href=<?php echo $perfil; ?>>Perfil</a>
            </div>
            <div id="enlaces">
                <a href=<?php echo $bares; ?>>Bares</a>
                <a href=<?php echo $pinchos; ?>>Pinchos</a>
                <a href=<?php echo $mapa; ?>>Mapa</a>
                <a href=<?php echo $logOut; ?>>LogOut</a>
            </div>
        </div>
    </nav>
    <div id="parteSuperior">
        <div id="galeria">
            <div id="mostrando">
                <i id="trash" onclick="eliminarImagen(this,'img1','trash','getArchivo1','archivos1')" class="imagenes papelera fa fa-2x fa-trash" aria-hidden="true"></i>
                <img src="../View/img/bar.jpg" id="img1" alt="">
                <div id="getArchivo1" class="form-group">
                    <label class="label">
                        <i class="material-icons">attach_file</i>
                        <span class="title">Add File</span>
                        <input id="archivos1" onchange="previsualizacion(this,'img1','trash','getArchivo1')" type="file" />
                    </label>
                </div>
            </div>
            <div id="botones">
                <a class="btn btn-primary" onclick="enviarDatos()" href="#">Guardar</a>
                <a class="btn btn-secondary" onclick="cancelar()" href="#">Cancelar</a>
            </div>
        </div>
        <div id="informacion">
            <div id="titulo">
                <div>
                    <h5>Nombre</h5>
                    <input onkeypress="esLetra(event)" id="nombreUsuario" type="text" placeholder="Champiniones">
                </div>
            </div>
            <div>
                <h5>Apellidos</h5>
                <input onkeypress="esLetra(event)" type="text" id="apellidoUsuario" placeholder="Gonzalez">
            </div>
            <div id="credenciales">
                <div id="email">
                    <h5>Email</h5>
                    <input type="email" id="emailUsuario" placeholder="ejemplo@ejemplo.com">
                </div>
            </div>
            <div id="rol">
                <h5>Rol:</h5>
                <input type="email" id="rolUsuario" disabled>
            </div>
            <div id="cambioContrasenia">
                <button onclick="cambiarContraserna()" class="btn btn-primary">Cambiar contrasenia</button>
            </div>
            <div id="borrarCuenta">
                <button onclick="borrarCuenta()" class="btn btn-danger">Borrar cuenta</button>
            </div>
        </div>
    </div>
    <div id="parteInferior">
        <div id="resenias">
            <div id="titulos">
                <h4 id="tituloResenias" onclick="mostrarResenas(this)">Reseñas</h4>
                <h4 id="tituloLikes" onclick="mostrarLikes(this)">Likes</h4>
            </div>
            <div id="agrupacionResenias">

            </div>
        </div>
        <div id="likes">

        </div>

        <div id="paginacion">
            <button name="anterior" onclick="anterior()" class="btn btn-primary">Anterior</button>
            <select name="" onchange="mostrarDatos()" class="form-select" id="cantidad">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <button name="siguiente" onclick="siguiente()" class="btn btn-primary">Siguiente</button>
        </div>
    </div>
    <footer class="footer-07">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <h2 class="footer-heading"><a href="listadoBares" class="logo">Logrocho.com</a></h2>
                    <p class="menu">
                        <a href="#">Home</a>
                        <a href="#">Agent</a>
                        <a href="#">About</a>
                        <a href="#">Listing</a>
                        <a href="#">Blog</a>
                        <a href=<?php echo $contacto ?>>Contact</a>
                    </p>
                    <ul class="ftco-footer-social p-0">
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="ion-logo-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="ion-logo-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="ion-logo-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | <i class="ion-ios-heart" aria-hidden="true"></i> by <a href="listadoBares" target="_blank">Logrocho.com</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <script src="../View/js/jquery-3.6.0.js"></script>
    <script src="../View/js/infoUsuariosFront.js"></script>
</body>

</html>
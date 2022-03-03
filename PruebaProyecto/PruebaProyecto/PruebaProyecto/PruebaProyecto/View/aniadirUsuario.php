<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../View/styles/infoUsuarios.css">
    <link rel="stylesheet" href="../View/styles/menu.css">
    <link rel="stylesheet" href="../View/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="../View/styles/ionicons.min.css">
    <link rel="stylesheet" href="../View/styles/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../View/styles/paginacion.css">
    <title>Document</title>
</head>

<body>
    
    <nav class="navbar navbar-dark bg-dark">
        <div>
            <a class="nav-link" href=<?php echo $bares ?>>Bares</a>
            <a class="nav-link" href=<?php echo $pinchos ?>>Pinchos</a>
            <a class="nav-link" href=<?php echo $resenias ?>>Resenias</a>
            <a class="nav-link" href=<?php echo $usuarios ?>>Usuarios</a>
        </div>
        <div>
            <a class="nav-link" href=<?php echo $logOut ?>>Log out</a>
        </div>

    </nav>
    
    <div id="tituloPagina">
        <h3>Aniadir usuarios</h3>
    </div>
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
                <a class="btn btn-primary" onclick="guardarDatos()" href="#">Guardar</a>
                <a class="btn btn-danger" onclick="cancelar()" href="#">Cancelar</a>
            </div>
        </div>
        <div id="informacion">
            <div id="titulo">
                <div>
                    <h5>Nombre</h5>
                    <input onkeypress="esLetra(event)" id="nombreUsuario" type="text" placeholder="Champiniones">

                </div>
                <div>
                    <h5>Apellidos</h5>
                    <input onkeypress="esLetra(event)" type="text" id="apellidoUsuario" placeholder="Gonzalez">
                </div>
            </div>
            <div id="credenciales">
               <div id="email">
                    <h5>Email</h5>
                    <input type="email" id="emailUsuario" placeholder="ejemplo@ejemplo.com">
                </div>
                <div id="password">
                    <h5>Contraseña</h5>
                    <input type="text" id="contraseniaUsuario" placeholder="****">
                </div>
            </div>
                <div id="rol">
                    <h5>Rol:</h5>
                    <select name="" id="rolUsuario">
                        <option value="Admin">Admin</option>
                        <option value="Editor">Editor</option>
                        <option value="Usuario">Usuario</option>
                    </select>
                </div>
                <div>
                    
                </div>

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
    <script src="../View/js/aniadirUsuarios.js"></script>

</body>

</html>
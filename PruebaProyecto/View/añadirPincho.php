<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="../View/styles/infoPinchos.css">
    <link rel="stylesheet" href="../View/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../View/styles/menu.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="../View/styles/ionicons.min.css">
    <link rel="stylesheet" href="../View/styles/style.css">
    <link rel="stylesheet" href="../View/styles/paginacion.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div>
        <a class="nav-link" href=<?php echo $bares ?>>Bares</a>
            <a class="nav-link" href=<?php echo $pinchos ?>>Pinchos</a>
            <a class="nav-link" href=<?php echo $reseñas ?>>Reseñas</a>
            <a class="nav-link" href=<?php echo $usuarios ?>>Usuarios</a>
        </div>
        <div>
            <a class="nav-link" href=<?php echo $logOut ?>>Log out</a>
        </div>
    </nav>
    <div id="tituloPagina">
        <h3>Añadir pincho</h3>
    </div>
    <div id="parteSuperior">
        <div id="galeria">
            <div id="mostrando">
                <img src="../View/img/blanco.PNG" id="imagenMostrada" alt="">
            </div>
            <div id="fotos">
            <div id="imagen1">
                    <i class="imagenes papelera fa fa-2x fa-trash" id="papelera1" onclick="eliminarImagen(this,'img1','papelera1','getArchivo1','archivos1')" aria-hidden="true"></i>
                    <img src="" id="img1" onclick="cambiarImagen(this)" alt="">
                    <div id="getArchivo1" class="form-group">
                        <label class="label">
                            <i class="material-icons">attach_file</i>
                            <span class="title">Add File</span>
                            <input id="archivos1" onchange="previsualizacion(this,'img1','papelera1','getArchivo1')" type="file" />
                        </label>
                    </div>
                </div>
                <div id="imagen2">
                <i class="imagenes papelera fa fa-2x fa-trash" id="papelera2" onclick="eliminarImagen(this,'img2','papelera2','getArchivo2','archivos2')" aria-hidden="true"></i>
                    <img src="" id="img2" onclick="cambiarImagen(this)" alt="">
                    <div id="getArchivo2" class="form-group">
                        <label class="label">
                            <i class="material-icons">attach_file</i>
                            <span class="title">Add File</span>
                            <input id="archivos2" onchange="previsualizacion(this,'img2','papelera2','getArchivo2')" type="file" />
                        </label>
                    </div>
                </div>
                <div id="imagen3">
                    <i class="imagenes papelera fa fa-2x fa-trash" id="papelera3" onclick="eliminarImagen(this,'img3','papelera3','getArchivo3','archivos3')" aria-hidden="true"></i>
                    <img src="" id="img3" onclick="cambiarImagen(this)" alt="">
                    <div id="getArchivo3" class="form-group">
                        <label class="label">
                            <i class="material-icons">attach_file</i>
                            <span class="title">Add File</span>
                            <input id="archivos3" onchange="previsualizacion(this,'img3','papelera3','getArchivo3')" type="file" />
                        </label>
                    </div>
                </div>
            </div>
            <div id="botones">
                <a class="btn btn-primary" onclick="guardarPincho()" href="#">Guardar</a>
                <a class="btn btn-secondary" onclick="cancelar()" href="#">Cancelar</a>
            </div>
        </div>
        <div id="informacion">
            <div id="arriba">
            <div id="titulo">
                <h5>Nombre</h5>
                <input id="nombrePincho" type="text" placeholder="Champiñones">
            </div>
            <div id="puntuacion">
            <h5>Pertenece a:</h5>
                <select name="" id="selectBares">

                </select>
            </div>    
            </div>
            
            <div id="descripcion">
                <h5>Descripcion</h5>
                <textarea name="" id="descPincho" cols="70" rows="10"></textarea>
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
    <script src="../View/js/añadirPincho.js"></script>
    <script src="../View/js/jquery-3.6.0.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../View/styles/menu.css">
    <link rel="stylesheet" href="../View/styles/infoResenia.css">
    <link rel="stylesheet" href="../View/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="../View/styles/ionicons.min.css">
    <link rel="stylesheet" href="../View/styles/style.css">
    <title>Document</title>
</head>

<body onload="mostrarDatos()">
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
        <h3>Editor de resenias</h3>
    </div>
    <div id="parteSuperior">
        <div id="galeria">
            <div id="mostrando">
            
                <img src="../View/img/perfildeusuario.jpg" id="imagenMostrada" alt="">
            </div>
            <div id="botones">
                <a class="btn btn-danger" onclick="eliminar()" href="#">Eliminar</a>
                <a class="btn btn-primary" onclick="enviarDatos()" href="#">Guardar</a>
                <a class="btn btn-secondary" onclick="cancelar()" href="#">Cancelar</a>
            </div>
        </div>
        <div id="informacion">
            <div id="titulo">
                <div>
                    <h5>Nombre</h5>
                    <input disabled id="resenaNombre" type="text" placeholder="Champiniones">
                </div>
                <div>
                    <h5>Pincho</h5>
                    <input disabled type="text" id="resenaPincho" name="" placeholder="Champiniones">
                </div>
            </div>
            <div id="descripcion">
                <h5>Contenido del mensaje</h5>
                <textarea name="" id="resenaMensaje" cols="70" rows="10"></textarea>
            </div>
            <div id="pincho">

                <div>
                    <h5>Valoracion</h5>
                    <input type="number" onkeypress="esNumero(event)" name="" placeholder="50" id="resenaValoracion">
                </div>
                <div>
                    <h5>Likes</h5>
                    <input type="number" disabled name="" placeholder="50" id="resenaLike">
                </div>
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
    <script src="../View/js/infoResenas.js"></script>
</body>

</html>
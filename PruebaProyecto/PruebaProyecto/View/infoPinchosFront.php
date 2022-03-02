<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../View/styles/infoBaresFront.css">
    <link rel="stylesheet" href="../View/styles/menuFront.css">
    <link rel="stylesheet" href="../View/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="../View/styles/ionicons.min.css">
    <link rel="stylesheet" href="../View/styles/paginacion.css">
    <link rel="stylesheet" href="../View/styles/style.css">
    <link rel="stylesheet" href="../View/styles/slider.css">
    <link rel="stylesheet" href="../View/styles/reseniasPinchosFront.css">
    <link rel="stylesheet" href="../View/styles/listadoBaresFront.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Escriba y puntue</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="mesgResenia">
                        <h5>Mensaje</h5>
                        <textarea id="mensaje" cols="" rows=""></textarea>
                    </div>
                    <div id="valoracionResenia">
                        <h5>Valoracion</h5>

                        <input id="valoracion" min=0 max=10 type="number">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="tituloPagina">
        <h3>Editor de bares</h3>
    </div>
    <div id="parteSuperior">
        <div id="galeria">
            <div id="mostrando">
                <div id="contenedorSlider">
                    <div id="slider">
                        <div id="imagenMostrada"></div>
                        <div id="anterior" class="direccion">
                            <a href="javascript:void(0);" onclick="avanzar(-1)">&#10094;</a>
                        </div>
                        <div class="direccion" id="siguiente">
                            <a href="javascript:void(0);" onclick="avanzar(1)">&#10095;</a>
                        </div>

                        <div id="barras">
                            <span class="barra activada" onclick="posicionSlider(0)"></span>
                            <span class="barra" onclick="posicionSlider(1)"></span>
                            <span class="barra" onclick="posicionSlider(2)"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="informacion">
            <div id="arriba">

            </div>

            <div id="descripcion">
                <h5>Descripcion</h5>
                <p id="descripcionBar"></p>
            </div>
            <div id="direccion">
                <h5>Bar</h5>
                <p id="direccionBar"></p>
            </div>
            <div id="puntuacion">
                <h5>Puntuacion</h5>
                <p id="puntuacionBar"></p>
            </div>
        </div>
    </div>
    <div id="tituloPinchos">
        <h1>Pinchos</h1>
        <button class="btn btn-success" id="anadirResenia" data-toggle="modal" data-target="#exampleModalCenter">Aniadir resenia</button>
    </div>
    <div id="bares">
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
    <script src="../View/js/popper.js"></script>
    <script src="../View/js/bootstrap.min.js"></script>
    <script src="../View/js/main.js"></script>
    <script src="../View/js/infoPinchosFront.js"></script>
    <script src="../View/js/sliderFichas.js"></script>

</body>

</html>
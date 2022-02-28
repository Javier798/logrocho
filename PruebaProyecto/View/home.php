<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../View/styles/slider.css">
    <link rel="stylesheet" href="../View/styles/menuFront.css">
    <link rel="stylesheet" href="../View/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="../View/styles/ionicons.min.css">
    <link rel="stylesheet" href="../View/styles/home.css">
    <link rel="stylesheet" href="../View/styles/style.css">
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
    <section>
        <div id="contenedorSlider">
            <div id="opcionesSlider">
                <div id="cambios">
                    <select class="form-select" onchange="cambiarRutas(this)" name="" id="pinchos">
                        <option value="favoritos">Mejores valorados</option>
                        <option value="valorados">Favoritos</option>
                    </select>
                </div>
                <div id="funcionamiento">
                    <div class="form-check form-switch">
                        <input onclick="comprobar(this)" checked class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Parar/Continuar</label>
                    </div>
                </div>
            </div>
            <div id="slider">
                <div id="imagenMostrada"></div>
                <div id="anterior" class="direccion">
                    <a href="#" onclick="avanzar(-1)">&#10094;</a>
                </div>
                <div class="direccion" id="siguiente">
                    <a href="#" onclick="avanzar(1)">&#10095;</a>
                </div>

                <div id="barras">
                    <span class="barra activada" onclick="posicionSlider(0)"></span>
                    <span class="barra" onclick="posicionSlider(1)"></span>
                    <span class="barra" onclick="posicionSlider(2)"></span>
                </div>
            </div>
        </div>
    </section>
    <section>
        <h1 class="titulo">Reseñas populares</h1>
        <div id="reseñasPopulares">
            <div class="reseña">
                <div class="contenido">
                    <div class="parteIzquierda">
                        <img class="imgReseña" src="../View/img/perfildeusuario.jpg" alt="">
                        <h6>Usuario</h6>
                        <hr>
                        <p onclick="verReseña()">Lorem fistrum fistro ese que llega sexuarl benemeritaar por la gloria de mi madre.</p>
                    </div>
                    <div class="infoReseña">
                        <img class="imgPincho" src="../View/img/champisSalsa.jpg" alt="">
                        <div class="estrellas">
                            <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="reseña">
                <div class="contenido">
                    <div class="parteIzquierda">
                        <img class="imgReseña" src="../View/img/perfildeusuario.jpg" alt="">
                        <h6>Usuario</h6>
                        <hr>
                        <p onclick="verReseña()">Lorem fistrum fistro ese que llega sexuarl benemeritaar por la gloria de mi madre.</p>
                    </div>
                    <div class="infoReseña">
                        <img class="imgPincho" src="../View/img/champisSalsa.jpg" alt="">
                        <div class="estrellas">
                            <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="reseña">
                <div class="contenido">
                    <div class="parteIzquierda">
                        <img class="imgReseña" src="../View/img/perfildeusuario.jpg" alt="">
                        <h6>Usuario</h6>
                        <hr>
                        <p onclick="verReseña()">Lorem fistrum fistro ese que llega sexuarl benemeritaar por la gloria de mi madre.</p>
                    </div>
                    <div class="infoReseña">
                        <img class="imgPincho" src="../View/img/champisSalsa.jpg" alt="">
                        <div class="estrellas">
                            <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="reseña">
                <div class="contenido">
                    <div class="parteIzquierda">
                        <img class="imgReseña" src="../View/img/perfildeusuario.jpg" alt="">
                        <h6>Usuario</h6>
                        <hr>
                        <p onclick="verReseña()">Lorem fistrum fistro ese que llega sexuarl benemeritaar por la gloria de mi madre.</p>
                    </div>
                    <div class="infoReseña">
                        <img class="imgPincho" src="../View/img/champisSalsa.jpg" alt="">
                        <div class="estrellas">
                            <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <h1 class="titulo">Que puedes hacer</h1>
        <div id="quienesSomos">
            <div id="paso1">
                <h3>Paso 1</h3>
                <p>Comer tantos pinchos como puedas</p>
                <img src="../View/img/comer1.png" alt="">
            </div>
            <div id="paso2">
                <h3>Paso 2</h3>
                <p>Puntuar cuanto te han gustado los pinchos</p>
                <img src="../View/img/puntuar1.png" alt="">
            </div>
            <div id="paso3">
                <h3>Paso 3</h3>
                <p>Repetir el proceso tantas veces como quieras</p>
                <img src="../View/img/repetir.png" alt="">
            </div>
        </div>
    </section>
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
    <script src="../View/js/slider.js"></script>
    <script src="../View/js/home.js"></script>
</body>

</html>
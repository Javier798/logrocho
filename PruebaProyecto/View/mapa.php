<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../View/styles/menuFront.css">
    <link rel="stylesheet" href="../View/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="../View/styles/ionicons.min.css">
    <link rel="stylesheet" href="../View/styles/style.css">
    <link rel="stylesheet" href="../View/styles/mapa.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
        integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
        crossorigin="" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
        integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
        crossorigin=""></script>
    <title>Bares</title>
</head>

<body>
    <nav class=" menuNav">
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
    <div id="mapa">
        <div id="mimapa">
          <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1123.8935213593775!2d-2.44900454664282!3d42.4656623538059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5aab4784a44781%3A0x7e5599973315e588!2sCalle%20del%20Laurel%2C%2026001%20Logro%C3%B1o%2C%20La%20Rioja!5e0!3m2!1ses!2ses!4v1644420260726!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>-->
        </div>
        <div id="bares">
        <div id="buscador">
            <div class="input-group">
                <div class="form-outline">
                    <input id="search-input" type="search" name="form1" class="form-control">
                    
                </div>
                <button id="search-button" type="button" class="btn btn-primary">
                <i class="fa fa-search" aria-hidden="true"></i>

                </button>
            </div>
        </div>
        <div id="listadoBares">
            
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
    <script src="../View/js/mapa.js"></script>
</body>

</html>

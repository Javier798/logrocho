<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../View/styles/listadoUsuarios.css">
    <link rel="stylesheet" href="../View/styles/menu.css">
    <link rel="stylesheet" href="../View/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="../View/styles/ionicons.min.css">
    <link rel="stylesheet" href="../View/styles/style.css">
    <link rel="stylesheet" href="../View/styles/paginacion.css">
    <title>Bares</title>
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
    <div id="contenedor">
        <div id="titulo">
            <h2>Listado de usuarios</h2>
        </div>
        <div id="filtros">
            <div id="filtrosFiltrar">
            <select id="roles" class="form-select" aria-label="Default select example">
                <option selected>Admin</option>
                <option value="1">Editor</option>
                <option value="2">Usuario</option>
            </select>
            <div id="buscador" class="input-group rounded">
                <input type="search" class="form-control rounded" placeholder="Buscar" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </span>
            </div>
            </div>
            
            <div id="aniadir">
                <button onclick="anadirUsu()" class="btn btn-success">Añadir</button>
            </div>
        </div>

        <div id="tabla">
            <table class="table table-striped">
                <thead>
                </thead>
                <tbody>
                </tbody>
            </table>
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
    <script src="../View/js/paginacionUsuarios.js"></script>
    <script src="../View/js/jquery-3.6.0.js"></script>
</body>

</html>
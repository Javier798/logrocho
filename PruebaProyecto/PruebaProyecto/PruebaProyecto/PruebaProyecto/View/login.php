<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/styles/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div id="container">
        <div class="card">
            <div class="card-header">
                <div class="card-heading text-primary">Calle laurel</div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <h3 class="mb-4">Bienvenido a la administracion de Logrocho! 👋👋</h3>
                    <!--<p class="text-muted text-sm mb-5">Bienvenido a la web en la que podras calificar los mejores pinchos de la calle laurel</p>-->
                    <form id="loginForm" method="POST" action="<?php echo $accion; ?>" class="">
                        <div class="form-floating mb-3"><input placeholder="pepe" name="usuario" type="text" id="usuario" class="form-control"><label class="form-label" for="email">Usuario</label></div>
                        <div class="form-floating mb-3"><input placeholder="Contrase�a" type="password" name="contrasena" id="password" class="form-control"><label class="form-label" for="password">Contraseña</label></div>
                        <div>
                            <a href="./cambiarContrasena">¿Has olvidado la contraseña?</a>
                        </div>
                        <small class="loginIncorrecto">
                            <?php
                            if (isset($_SESSION["respuestaLogin"])&&!empty($_SESSION["respuestaLogin"])) {
                                echo $_SESSION["respuestaLogin"]."\n";
                                $_SESSION["respuestaLogin"]="";
                            }
                            ?>
                        </small>
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                </form>
            </div>
        </div>
        <div class="logo">
            <img src="../View/img/logo.PNG" alt="">
        </div>
    </div>
    </div>
</body>
</html>
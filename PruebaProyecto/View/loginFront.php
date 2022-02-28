<!DOCTYPE html>
<html lang="en">

<head>
	<title>Contact V12</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../View/img/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Model/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../View/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Model/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Model/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Model/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../View/styles/util.css">
	<link rel="stylesheet" type="text/css" href="../View/styles/main.css">
	<link rel="stylesheet" type="text/css" href="../View/styles/menu.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" href="../View/styles/ionicons.min.css">
	<link rel="stylesheet" href="../View/styles/style.css">
	<link rel="stylesheet" href="../View/styles/loginFront.css">
	<!--===============================================================================================-->
</head>

<body>
	<div class="bg-contact100" >
		<div id="fondo" class="container-contact100">
			<div class="wrap-contact100">
				<div class="contact100-pic js-tilt" data-tilt>
					<img src="../View/img/logoSinFondo.PNG" alt="IMG">
				</div>
				<form id="loginForm" method="POST" action="<?php echo $accion; ?>" class="contact100-form validate-form">
					<span class="contact100-form-title">
						Login
					</span>
					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="usuario" placeholder="Correo">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-user" aria-hidden="true"></i>
							
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<input class="input100" type="password" name="contrasena" placeholder="nombre">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-key" aria-hidden="true"></i>
						</span>
					</div>
					<small class="loginIncorrecto">
                            <?php
                            if (isset($_SESSION["respuestaLogin"])&&!empty($_SESSION["respuestaLogin"])) {
                                echo $_SESSION["respuestaLogin"]."\n";
                                $_SESSION["respuestaLogin"]="";
                            }
                            ?>
                        </small>
						<a href=<?php echo $registro; ?>>¿Registro?</a>
					<div class="container-contact100-form-btn">
						
						<button id="enviar" class="contact100-form-btn">
							Enviar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--===============================================================================================-->
	<script src="../Model/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../Model/vendor/bootstrap/js/popper.js"></script>
	<script src="../Model/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../Model/vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="../Model/vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="../View/js/contacto.js"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->



</body>

</html>

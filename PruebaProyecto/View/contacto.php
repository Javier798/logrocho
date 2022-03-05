<!DOCTYPE html>
<html lang="en">

<head>
	<title>Contact V12</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
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
	<link rel="stylesheet" href="../View/styles/contacto.css">
	<!--===============================================================================================-->
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
			<a class="nav-link" href="#">Log out</a>
		</div>

	</nav>
	<div class="bg-contact100" style="background-image: url('images/bg-01.jpg');">
		<div class="container-contact100">
			<div class="wrap-contact100">
				<div class="contact100-pic js-tilt" data-tilt>
					<img src="../View/img/img-01.png" alt="IMG">
				</div>

				<form class="contact100-form validate-form">
					<span class="contact100-form-title">
						Contactar con nosotros
					</span>

					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<input class="input100" type="text" name="name" placeholder="nombre">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Correo">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Message is required">
						<textarea class="input100" name="message" placeholder="Mensaje"></textarea>
						<span class="focus-input100"></span>
					</div>

					<div class="container-contact100-form-btn">
						<button class="contact100-form-btn">
							Enviar
						</button>
					</div>
				</form>
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

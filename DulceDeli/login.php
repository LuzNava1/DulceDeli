<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/54578da939.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/rec.css">
	
	<title>Login</title>
</head>

<style>
		.input-lg {
			font-size: 16px;
		}
		
	</style>

<body>
<?php include('barra.php'); ?>
 <!-- barras.php -->
 <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item"><a href="login.php">Iniciar Sesión</a></li>
  </ol>
</nav>

	<section class="vh-100" style="background-color: #800C80;">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col col-xl-10">
					<div class="card" style="border-radius: 1rem;">
						<div class="row g-0">
							<div class="col-md-6 col-lg-5 d-none d-md-block">
								<div class="d-flex justify-content-center align-items-center h-100">
									<img src="imagenes/Assets/log.png" alt="login form" class="img-fluid"
										style="border-radius: 2rem 0 0 2rem; display: inline-block;" />
								</div>
							</div>

							<div class="col-md-6 col-lg-7 d-flex align-items-center">
								<div class="card-body p-4 p-lg-5 text-black">

									<form action="validar.php" name="login" method="get">

										<div class="d-flex align-items-center mb-3 pb-1">
											
											<span class="h1 fw-bold mb-0">Acceso al sistema</span>
										</div>

										<h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Inicia sesión o <a href="registro.php">Regístrate</a></h5>


										<div class="form-outline mb-4">
											<input type="email" class="form-control form-control-lg input-lg" id="usuario"
												name="usuario" placeholder="Ingresa tu correo" required>
											<label class="form-label" for="usuario">Correo Electrónico</label>
										</div>

										<div class="form-outline mb-4">
											<input type="password" class="form-control form-control-lg input-lg" id="clave"
												name="clave" maxlength="10" placeholder="Ingresa tu contraseña"
												required>
											<label class="form-label" for="clave">Contraseña</label>
										</div>

										<div class="pt-1 mb-4">
											<button class="btn btn-dark btn-lg btn-block" type="submit"
												name="enviar">Login</button>
										</div>
										<!-- <a class="small text-muted" href="recuperar.php">Forgot password?</a>
											  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="index.php" style="color: #393f81;">Register here</a></p> -->
										<a href="index.php" class="small text-muted">Regresar a la pagina principal.</a><br>
									


									</form>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</section>
</body>

</html>
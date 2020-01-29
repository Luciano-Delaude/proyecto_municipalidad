<?php
//AVISO AL BROWSER QUE VOY A USAR VARIABLES DE SESION.
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>MiMunicipio</title>

	<!--=====================================
	PLUGINS DE CSS
	======================================-->	

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!--=====================================
	PLUGINS DE JS
	======================================-->	

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<!-- Latest compiled Fontawesome-->
	<script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

</head>
<body>


	<!--=====================================
	LOGOTIPO
	======================================-->

	<div class="container-fluid">
		
		<h3 class="text-center py-3">Pagina MiMunicipio</h3>

	</div>

	<!--=====================================
	BOTONERA (ACA TENGO LOS BOTONES, QUE SE
	PONEN EN AZUL SEGÚN SI ESTAN PULZADOS O NO)
	======================================-->

	<div class="container-fluid  bg-light">
		
		<div class="container">

			<ul class="nav nav-justified py-2 nav-pills">
			
			<?php if (isset($_GET["pagina"])): ?>

				<?php if ($_GET["pagina"] == "empleados"): ?>

					<li class="nav-item">
						<a class="nav-link active" href="index.php?pagina=empleados">Empleados</a>
					</li>

				<?php else: ?>

					<li class="nav-item">
						<a class="nav-link" href="index.php?pagina=empleados">Empleados</a>
					</li>
					
				<?php endif ?>

				<?php if ($_GET["pagina"] == "proveedores"): ?>

					<li class="nav-item">
						<a class="nav-link active" href="index.php?pagina=proveedores">Proveedores</a>
					</li>

				<?php else: ?>

					<li class="nav-item">
						<a class="nav-link" href="index.php?pagina=proveedores">Proveedores</a>
					</li>
					
				<?php endif ?>

				
				<?php if ($_GET["pagina"] == "municipalidades"): ?>

					<li class="nav-item">
						<a class="nav-link active" href="index.php?pagina=municipalidades">Municipalidades</a>
					</li>

				<?php else: ?>

					<li class="nav-item">
						<a class="nav-link" href="index.php?pagina=municipalidades">Municipalidades</a>
					</li>

				<?php endif ?>

				<?php if ($_GET["pagina"] == "transacciones"): ?>

					<li class="nav-item">
						<a class="nav-link active" href="index.php?pagina=transacciones">Transacciones</a>
					</li>

				<?php else: ?>

					<li class="nav-item">
						<a class="nav-link" href="index.php?pagina=transacciones">Transacciones</a>
					</li>

				<?php endif ?>

			<?php else: ?>

				<!-- GET: $_GET["variable"] Variables que se pasan como parámetros Vía URL ( También conocido como cadena de consulta a través de la URL) 
				Cuando es la primera variable se separa con ?
				las que siguen a continuación se separan con &
				-->
				<li class="nav-item">
					<a class="nav-link active" href="index.php?pagina=inicio">Inicio</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="index.php?pagina=empleados">Empleados</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="index.php?pagina=proveedores">Proveedores</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="index.php?pagina=municipalidades">Municipalidades</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="index.php?pagina=transacciones">Transacciones</a>
				</li>
				
			<?php endif ?>

			</ul>

		</div>

	</div>

	<!--=====================================
	CONTENIDO (ACA SEGUN LA VARIABLE GET QUE TENGO
	VOY A UNA PAGINA O LA OTRA.)
	======================================-->

	<div class="container-fluid">
		
		<div class="container py-5">

			<?php 

				#ISSET: isset() Determina si una variable está definida y no es NULL

				if(isset($_GET["pagina"])){

					if($_GET["pagina"] == "empleados" ||
					   $_GET["pagina"] == "proveedores" ||
					   $_GET["pagina"] == "municipalidades" ||
					   $_GET["pagina"] == "transacciones" ||
					   $_GET["pagina"] == "editarEmpleados" ||
					   $_GET["pagina"] == "editarProveedores" ||
					   $_GET["pagina"] == "editarMunicipalidades" ||
					   $_GET["pagina"] == "editarTransacciones"){

						include "paginas/".$_GET["pagina"].".php";

					}else{

						include "paginas/error404.php";
					}


				}else{

					include "paginas/inicio.php";

				}

				

			 ?>

		</div>

	</div>


	
</body>
</html>
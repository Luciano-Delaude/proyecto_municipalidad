<?php

if(isset($_GET["id_municipalidad"])){

	$tabla = "municipalidades";
	$item = "id_municipalidad";
	$valor = $_GET["id_municipalidad"];


	$municipalidad = ControladorFormularios::ctrlSelect($tabla,$item, $valor);
}

?>


<div class="d-flex justify-content-center text-center">

	<form class="p-5 bg-light" method="post">

		<div class="form-group">

			<div class="input-group">

				<input type="hidden" class="form-control" value="<?php echo $municipalidad["id_municipalidad"]; ?>" 
				placeholder="Identificador de municipalidad" id="id_municipalidad" name="id_municipalidad">

			</div>
			
		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $municipalidad["nombre"]; ?>" 
				placeholder="Nombre de municipalidad" id="nombre" name="nombre">
			
			</div>
			
		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $municipalidad["n_provincia"];?>" 
				placeholder="Numero de provincia" id="n_provincia" name="n_provincia">

			</div>

		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $municipalidad["n_empleados"];?>" 
				placeholder="Numero de empleados" id="n_empleados" name="n_empleados">

			</div>

		</div>
		<?php
		$data = array('id_municipalidad'=>null,'nombre'=>null,'n_provincia'=>null,'n_empleados'=>null);
		$actualizar = ControladorFormularios::ctrlUpdate("municipalidades",$data);
		
		if($actualizar == "ok"){
			echo '<script>
			if ( window.history.replaceState ) {
				window.history.replaceState( null, null, window.location.href );
			}
			</script>';

			echo '<div class="alert alert-success">La municipalidad ha sido actualizada</div>
			<script>
				setTimeout(function(){           
					window.location = "index.php?pagina=municipalidades";
				},3000);
			</script>
			
			<script>
				setTimeout(function(){
					window.location = "index.php?pagina=municipalidades";
				})';
		}

		?>
		<button type="submit" name= "submit" class="btn btn-primary">Actualizar</button>

	</form>

</div>
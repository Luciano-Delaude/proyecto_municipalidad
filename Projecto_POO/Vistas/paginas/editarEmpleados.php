
<?php
if(isset($_GET["n_tarjeta"])){
	$tabla = "empleados";
	$item = "n_tarjeta";
    $valor = $_GET["n_tarjeta"];
	
    $empleado = ControladorFormularios::ctrlSelect($tabla,$item,$valor);
    
}

?>


<div class="d-flex justify-content-center text-center">

	<form class="p-5 bg-light" method="post">

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $empleado["dni"]; ?>" 
				placeholder="DNI" id="n_transaccion" name="dni">

			</div>
			
		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $empleado["n_tarjeta"]; ?>" 
				placeholder="Numero de tarjeta" id="n_tarjeta" name="n_tarjeta">
			
			</div>
			
		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $empleado["pin_tarjeta"];?>" 
				placeholder="Pin de tarjeta" id="pin_tarjeta" name="pin_tarjeta">

			</div>

		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $empleado["nombre"];?>" 
				placeholder="Nombre de empleado" id="nombre" name="nombre">

			</div>

		</div>
		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $empleado["saldo"];?>" 
				placeholder="Saldo" id="saldo" name="saldo">

			</div>

		</div>
		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $empleado["id_municipalidad"];?>" 
				placeholder="Identificador de Municipalidad" id="id_municipalidad" name="id_municipalidad">

			</div>

		</div>
		<?php
		$data = array("dni"=>null,"n_tarjeta"=>null,"pin_tarjeta"=>null,"nombre"=>null,"saldo"=>null,"id_municipalidad"=>null);
		$actualizar = ControladorFormularios::ctrlUpdate("empleados",$data);
		
		if($actualizar == "ok"){
			echo '<script>
			if ( window.history.replaceState ) {
				window.history.replaceState( null, null, window.location.href );
			}
			</script>';

			echo '<div class="alert alert-success">El empleado ha sido actualizado</div>
			<script>
				setTimeout(function(){           
					window.location = "index.php?pagina=empleados";
				},3000);
			</script>
			
			<script>
				setTimeout(function(){
					window.location = "index.php?pagina=empleados";
				})';
		}

		?>
		<button type="submit" name="submit" class="btn btn-primary">Actualizar</button>

	</form>

</div>
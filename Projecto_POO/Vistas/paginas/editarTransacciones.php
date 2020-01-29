
<?php
if(isset($_GET["n_transaccion"])){
	$tabla = "transacciones";
	$item = "n_transaccion";
    $valor = $_GET["n_transaccion"];
	
    $transaccion = ControladorFormularios::ctrlSelect($tabla,$item,$valor);
    
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

				<input type="text" class="form-control" value="<?php echo $transaccion["n_transaccion"]; ?>" 
				placeholder="Numero de transaccion" id="n_transaccion" name="n_transaccion">

			</div>
			
		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $transaccion["id_proveedor"]; ?>" 
				placeholder="Identificador de proveedor" id="id_proveedor" name="id_proveedor">
			
			</div>
			
		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $transaccion["n_tarjeta"];?>" 
				placeholder="Numero de tarjeta" id="n_tarjeta" name="n_tarjeta">

			</div>

		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $transaccion["monto"];?>" 
				placeholder="Monto" id="monto" name="monto">

			</div>

		</div>
		<?php
		$data = array("n_tarjeta"=>null,"id_proveedor"=>null,"n_transaccion"=>null,"monto"=>null);
		$actualizar = ControladorFormularios::ctrlUpdate("transacciones",$data);
		
		if($actualizar == "ok"){
			echo '<script>
			if ( window.history.replaceState ) {
				window.history.replaceState( null, null, window.location.href );
			}
			</script>';

			echo '<div class="alert alert-success">La transaccion ha sido actualizada</div>
			<script>
				setTimeout(function(){           
					window.location = "index.php?pagina=transacciones";
				},3000);
			</script>
			
			<script>
				setTimeout(function(){
					window.location = "index.php?pagina=transacciones";
				})';
		}

		?>
		<button type="submit" name="submit" class="btn btn-primary">Actualizar</button>

	</form>

</div>
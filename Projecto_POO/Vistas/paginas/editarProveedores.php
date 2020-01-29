
<?php
if(isset($_GET["id_proveedor"])){
	$tabla = "proveedores";
	$item = "id_proveedor";
	$valor = $_GET["id_proveedor"];
	
	$proveedor = ControladorFormularios::ctrlSelect($tabla,$item,$valor);
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

				<input type="text" class="form-control" value="<?php echo $proveedor["id_municipalidad"]; ?>" 
				placeholder="Escriba nuevo Id de municipalidad" id="id_municipalidad" name="id_municipalidad">

			</div>
			
		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $proveedor["nombre"]; ?>" 
				placeholder="Escriba nuevo nombre de municipalidad" id="nombre" name="nombre">
			
			</div>
			
		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $proveedor["direccion"];?>" 
				placeholder="Escriba nueva direccion" id="direccion" name="direccion">

			</div>

		</div>

		<div class="form-group">

			<div class="input-group">
				
				<div class="input-group-prepend">
					<span class="input-group-text">
					</span>
				</div>

				<input type="text" class="form-control" value="<?php echo $proveedor["categoria"];?>" 
				placeholder="Escriba nueva categoria" id="categoria" name="categoria">

				<input type="hidden" name="id_proveedor" value="<?php echo $proveedor["id_proveedor"];?>">

			</div>

		</div>
		<?php
		$data = array("id_proveedor"=>null,"nombre"=>null,"direccion"=>null,"categoria"=>null,"id_municipalidad"=>null);
		$actualizar = ControladorFormularios::ctrlUpdate("proveedores",$data);
		
		if($actualizar == "ok"){
			echo '<script>
			if ( window.history.replaceState ) {
				window.history.replaceState( null, null, window.location.href );
			}
			</script>';

			echo '<div class="alert alert-success">El proveedor ha sido actualizado</div>
			<script>
				setTimeout(function(){           
					window.location = "index.php?pagina=proveedores";
				},3000);
			</script>
			
			<script>
				setTimeout(function(){
					window.location = "index.php?pagina=proveedores";
				})';
		}

		?>
		<button type="submit" name="submit" class="btn btn-primary">Actualizar</button>

	</form>

</div>
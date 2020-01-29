<div class="row d-flex justify-content-center text-center">
<?php

//AVISO AL BROWSER QUE VOY A USAR VARIABLES DE SESION.

$proveedores = ControladorFormularios::ctrlSelect("proveedores",null,null);
// echo '<pre>'; print_r($proveedores); echo'</pre>'; //FORMA DE IMPRIMIR LOS RESULTADOS DE UN SQL

?>
 
<div class="column">
<table class="table table-striped">
    <thead>
        <tr>
            <th>Identificador de proveedor</th>
            <th>Identificador de municipalidad</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Categoria</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach($proveedores as $key => $value):?>
        <tr>
            <td><?php echo $value["id_proveedor"];?></td>
            <td><?php echo $value["id_municipalidad"];?></td>
            <td><?php echo $value["nombre"];?></td>
            <td><?php echo $value["direccion"];?></td>
            <td><?php echo $value["categoria"];?></td>
            <td>
                <div class="btn-group">

                    <a href="index.php?pagina=editarProveedores&id_proveedor=<?php echo $value["id_proveedor"];?>" class="btn btn-warning">Editar</a>
                    <form method="POST">
						<input type="hidden" value="<?php echo $value["id_proveedor"];?>" name="eliminarProveedor">
                        <button type="submit" class="btn btn-danger">Eliminar</button>

                        <?php
                            $eliminar = new ControladorFormularios();
                            $eliminar -> ctrlDelete("proveedores","eliminarProveedor","id_proveedor");
                        ?>

                    </form>
                </div>
            </td>
        </tr>
    <?php endforeach ?>

    </tbody>
</table>
</div>

<div class="column">
	<h2>INSERTAR PROVEEDOR</h2>
<form class="p-5 bg-light" method="post">
		<div class="form-group">
			<input type="text" name="nombre" placeholder="Nombre">
		</div>
		<div class="form-group">
			<input type="text" name="direccion" placeholder="Dirección";>
		</div>
		<div class="form-group">
			<input type="text" name="categoria" placeholder="Categoría">
		</div>
		<div class="form-group">
			<input type="text" name="id_municipalidad" placeholder="Identificador de municipalidad">
		</div>
		<button type="submit" name="submit" class="btn btn-primary">ACEPTAR</button>

		<?php 

		/*=============================================
		FORMA EN QUE SE INSTANCIA LA CLASE DE UN MÉTODO NO ESTÁTICO 
		=============================================*/
		
		// $registro = new ControladorFormularios();
		// $registro -> ctrRegistro();

		/*=============================================
		FORMA EN QUE SE INSTANCIA LA CLASE DE UN MÉTODO ESTÁTICO 
		=============================================*/
		$proveedor = ControladorFormularios::ctrlProveedores();

		if($proveedor == "ok"){
			//Aca borra los datos del storage del navegador para que no se vuelva a ejecutar 2 veces la misma solicitud

			echo '<script>
				if ( window.history.replaceState ) {
					window.history.replaceState( null, null, window.location.href );
				}
			</script>';
			echo '<div class="alert alert-success">El proveedor ha sido registrado</div>
			<script>
				setTimeout(function(){           
					window.location = "index.php?pagina=proveedores";
				},1000);
			</script>
			
			<script>
				setTimeout(function(){
					window.location = "index.php?pagina=proveedores";
				})';
		}

		?>
		
	</form>
	</div>

</div>
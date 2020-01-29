<div class="row d-flex justify-content-center text-center">
<?php

//AVISO AL BROWSER QUE VOY A USAR VARIABLES DE SESION.

$proveedores = ControladorFormularios::ctrlSelect("transacciones",null,null);
// echo '<pre>'; print_r($proveedores); echo'</pre>'; //FORMA DE IMPRIMIR LOS RESULTADOS DE UN SQL

?>
<div class="column">
<table class="table table-striped">
    <thead>
        <tr>
            <th>Numero de tarjeta</th>
            <th>Identificador de proveedor</th>
            <th>Numero de transaccion</th>
            <th>Monto</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach($proveedores as $key => $value):?>
        <tr>
            <td><?php echo $value["n_tarjeta"];?></td>
            <td><?php echo $value["id_proveedor"];?></td>
            <td><?php echo $value["n_transaccion"];?></td>
            <td><?php echo $value["monto"];?></td>
            <td>
                <div class="btn-group">

                    <a href="index.php?pagina=editarTransacciones&n_transaccion=<?php echo $value["n_transaccion"];?>" class="btn btn-warning">Editar</a>
                    <form method="POST">
						<input type="hidden" value="<?php echo $value["n_transaccion"];?>" name="eliminarTransaccion">
                        <button type="submit" class="btn btn-danger">Eliminar</button>

                        <?php
                            $eliminar = new ControladorFormularios();
                            $eliminar -> ctrlDelete("transacciones","eliminarTransaccion","n_transaccion");
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
	<h2>INSERTAR TRANSACCION</h2>
	<form class="p-5 bg-light" method="post">

        <div class="form-group">
			<input type="text" name="n_tarjeta" placeholder="Número de tarjeta">
		</div>
		<div class="form-group">
			<input type="number" name="id_proveedor" placeholder="Identificador de proveedor">
		</div>
		<div class="form-group">
			<input type="number" name="n_transaccion" placeholder="Numero de transaccion">
		</div>
        <div class="form-group">
			<input type="number" name="monto" placeholder="Monto";>
		</div>

		<button type="submit" name="submit" class="btn btn-primary">ACEPTAR</button>


		<?php 

		$transaccion = ControladorFormularios::ctrlTransacciones();

		if($transaccion == "ok"){
			echo '<script>
			if(window.history.replaceState){

				window.history.replaceState(null,null,window.location.href);
			}			
			</script>';
			echo '<div class="alert alert-success">La transaccion fue registrada correctamente</div>';
		}

		?>
	</form>
</div>
</div>
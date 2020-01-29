<div class="row d-flex justify-content-center text-center">
<?php

//AVISO AL BROWSER QUE VOY A USAR VARIABLES DE SESION.

$empleados = ControladorFormularios::ctrlSelect("empleados",null,null);
// echo '<pre>'; print_r($proveedores); echo'</pre>'; //FORMA DE IMPRIMIR LOS RESULTADOS DE UN SQL

?>
<div class="column">
<table class="table table-striped">
    <thead>
        <tr>
            <th>Documento Nacional de Identidad</th>
            <th>Numero de tarjeta</th>
            <th>Pin de tarjeta</th>
            <th>Nombre de empleado</th>
            <th>Saldo</th>
            <th>Identificador de Municipalidad</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach($empleados as $key => $value):?>
        <tr>
            <td><?php echo $value["dni"];?></td>
            <td><?php echo $value["n_tarjeta"];?></td>
            <td><?php echo $value["pin_tarjeta"];?></td>
            <td><?php echo $value["nombre"];?></td>
            <td><?php echo $value["saldo"];?></td>
            <td><?php echo $value["id_municipalidad"];?></td>
            <td>
                <div class="btn-group">

                    <a href="index.php?pagina=editarEmpleados&n_tarjeta=<?php echo $value["n_tarjeta"];?>" class="btn btn-warning">Editar</a>
                    <form method="POST">
						<input type="hidden" value="<?php echo $value["n_tarjeta"];?>" name="eliminarEmpleado">
                        <button type="submit" class="btn btn-danger">Eliminar</button>

                        <?php
                            $eliminar = new ControladorFormularios();
                            $eliminar -> ctrlDelete("empleados","eliminarEmpleado","n_tarjeta");
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
	<h2>INSERTAR EMPLEADO</h2>
	<form class="p-5 bg-light" method="post">

		<div class="form-group">
			<input type="text" name="dni" placeholder="Documento Nacional de Identidad">		
		</div>
		<div class="form-group">
			<input type="text" name="n_tarjeta" placeholder="Numero de tarjeta">
		</div>
		<div class="form-group">
			<input type="text" name="pin_tarjeta" placeholder="Pin de tarjeta";>
		</div>
		<div class="form-group">
			<input type="text" name="nombre" placeholder="Nombre">
		</div>
		<div class="form-group">
			<input type="text" name="saldo" placeholder="Saldo">
		</div>
		<div class="form-group">
			<input type="text" name="id_municipalidad" placeholder="Identificador de municipalidad">
		</div>
		<button type="submit" name="submit" class="btn btn-primary">ACEPTAR</button>


		<?php 

		$empleado = ControladorFormularios::ctrlEmpleados();

		if($empleado == "ok"){
			echo '<script>
			if(window.history.replaceState){

				window.history.replaceState(null,null,window.location.href);
			}			
			</script>';
			echo '<div class="alert alert-success">El usuario fue registrado correctamente</div>
			<script>
			setTimeout(function(){           
				window.location = "index.php?pagina=empleados";
			},1000);
			</script>
			
			<script>
				setTimeout(function(){
					window.location = "index.php?pagina=empleados";
				})';
		}

		?>
	</form>
</div>

</div>
<div class="row d-flex justify-content-center text-center">

<?php
$municipalidades = ControladorFormularios::ctrlSelect("municipalidades",null,null);
// echo '<pre>'; print_r($proveedores); echo'</pre>'; //FORMA DE IMPRIMIR LOS RESULTADOS DE UN SQL

?>
 
<div class="column">
<table class="table table-striped">
    <thead>
        <tr>
            <th>Identificador de municipalidad</th>
            <th>Nombre</th>
            <th>Numero de provincia</th>
            <th>Numero de empleados</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach($municipalidades as $key => $value):?>
        <tr>
            <td><?php echo $value["id_municipalidad"];?></td>
            <td><?php echo $value["nombre"];?></td>
            <td><?php echo $value["n_provincia"];?></td>
            <td><?php echo $value["n_empleados"];?></td>
            <td>
                <div class="btn-group">
                    <a href="index.php?pagina=editarMunicipalidades&id_municipalidad=<?php echo $value["id_municipalidad"];?>" class="btn btn-warning">Editar</a>
                    
                    <form method="POST">
                        <input type="hidden" value="<?php echo $value["id_municipalidad"];?>" name="eliminarMunicipalidad">
                        <button type="submit" class="btn btn-danger">Eliminar</button>

                        <?php
                            $eliminar = new ControladorFormularios();
                            $eliminar -> ctrlDelete("municipalidades","eliminarMunicipalidad","id_municipalidad");
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
<h2>INSERTAR MUNICIPALIDAD</h2>

	<form class="p-5 bg-light" method="post">

        <div class="form-group">
			<input type="text" name="id_municipalidad" placeholder="Identificador de municipalidad">
		</div>
		<div class="form-group">
			<input type="text" name="n_provincia" placeholder="Numero de provincia">
		</div>
		<div class="form-group">
			<input type="text" name="nombre" placeholder="Nombre">
		</div>
        <div class="form-group">
			<input type="text" name="n_empleados" placeholder="Numero de empleados";>
		</div>

		<button type="submit" name="submit" class="btn btn-primary">ACEPTAR</button>


		<?php 

		$municipalidad = ControladorFormularios::ctrlMunicipalidades();

		if($municipalidad == "ok"){
			echo '<script>
			if(window.history.replaceState){

				window.history.replaceState(null,null,window.location.href);
			}			
			</script>';
            echo '<div class="alert alert-success">La municipalidad fue registrada correctamente</div>
            <script>
            setTimeout(function(){           
                window.location = "index.php?pagina=municipalidades";
            },1000);
            </script>
        
            <script>
            setTimeout(function(){
                window.location = "index.php?pagina=municipalidades";
            })';
		}

		?>
	</form>
    </div>
</div>
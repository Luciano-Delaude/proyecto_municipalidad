<?php
require_once 'includes/header.php'
?>
<div>
<h1>PROVEEDORES</h1>
<p>Desea introducir un empleado?<a href="empleados.php">Click aquí!</a></p>

<form action="includes/proveedores-inc.php" method= "post">
    <input type="text" name="id_proveedor" placeholder="ID Proveedor">
    <input type="text" name="id_municipalidad" placeholder="ID Municipalidad">
    <input type="text" name="nombre" placeholder="Nombre">
    <input type="text" name="direccion" placeholder="Dirección">
    <input type="text" name="categoria" placeholder="Categoría">
    <button type="submit" name="submit">ACEPTAR</button>
</form>
</div>
<?php
require_once 'includes/footer.php'
?>
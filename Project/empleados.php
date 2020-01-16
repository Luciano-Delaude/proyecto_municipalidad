<?php
require_once 'includes/header.php'
?>
<div>
<h1>Empleados</h1>
<p>Desea introducir un proveedor? <a href="proveedores.php">Click aquí!</a></p>

<form action="includes/empleados-inc.php" method= "post">
    <input type="text" name="DNI" placeholder="Documento Nacional de Identidad">
    <input type="text" name="n_tarjeta" placeholder="Numero de tarjeta">
    <input type="text" name="pin_tarjeta" placeholder="Pin de tarjeta";>
    <input type="text" name="nombre" placeholder="Nombre">
    <input type="text" name="saldo" placeholder="Saldo">
    <input type="text" name="id_municipalidad" placeholder="Identificador de municipalidad">
    <button type="submit" name="submit">ACEPTAR</button>
</form>
</div>
<?php
require_once 'includes/footer.php'
?>
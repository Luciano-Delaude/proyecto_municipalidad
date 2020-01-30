<?php

$conn = new mysqli("sql10.freesqldatabase.com", "sql10319705", "FUSjNnd3cE", "sql10319705");
if ($conn->connect_error){
    die("No se pudo conectar a la base de datos");
}

$response = array('error' => false);

$dni = $_POST['dni'];
$nTarjeta = $_POST['nTarjeta'];
$pinTarjeta = $_POST['pinTarjeta'];
$nombre = $_POST['nombre'];
$saldo = $_POST['saldo'];
$muni = $_POST['muni'];

$result = $conn->query("INSERT INTO `empleados` (`dni`, `n_tarjeta`, `pin_tarjeta`, `nombre`, `saldo`, `id_municipalidad`)
                        VALUES ('$dni','$nTarjeta','$pinTarjeta','$nombre','$saldo','$muni')");
if($result){
    $response['message'] = "Empleado agregado correctamente";
}else{
    $response['error'] = true;
    $response['message'] = "Error al agregar empleado";
}

$conn -> close();
header("Content-type: application/json");
echo json_encode($response);
die();

?>

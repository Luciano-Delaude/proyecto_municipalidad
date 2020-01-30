<?php

$conn = new mysqli("sql10.freesqldatabase.com", "sql10319705", "FUSjNnd3cE", "sql10319705");
if ($conn->connect_error){
    die("No se pudo conectar a la base de datos");
}

$response = array('error' => false);

$dni = $_POST['dni'];
$nTarjeta = $_POST['n_tarjeta'];
$pinTarjeta = $_POST['pin_tarjeta'];
$nombre = $_POST['nombre'];
$saldo = $_POST['saldo'];


$result = $conn->query("UPDATE `empleados` SET `n_tarjeta` = '$nTarjeta', `pin_tarjeta` = '$pinTarjeta', `nombre` = '$nombre', `saldo` = '$saldo' 
                        WHERE `empleados`.`dni` = '$dni';");
if($result){
    $response['message'] = "Empleado editado correctamente";
}else{
    $response['error'] = true;
    $response['message'] = "Error al editar empleado";
}

$conn -> close();
header("Content-type: application/json");
echo json_encode($response);
die();

?>
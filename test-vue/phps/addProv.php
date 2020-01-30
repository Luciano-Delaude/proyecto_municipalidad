<?php

$conn = new mysqli("sql10.freesqldatabase.com", "sql10319705", "FUSjNnd3cE", "sql10319705");
if ($conn->connect_error){
    die("No se pudo conectar a la base de datos");
}

$response = array('error' => false);

$muni = $_POST['muni'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$categoria = $_POST['categoria'];

$result = $conn->query("INSERT INTO `proveedores` (`id_municipalidad`, `nombre`, `direccion`, `categoria`) 
                        VALUES ($muni','$nombre','$direccion','$categoria')");
if($result){
    $response['message'] = "Proveedor agregado correctamente";
}else{
    $response['error'] = true;
    $response['message'] = "Error al agregar proveedor";
}

$conn -> close();
header("Content-type: application/json");
echo json_encode($response);
die();

?>
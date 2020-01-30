<?php

$conn = new mysqli("sql10.freesqldatabase.com", "sql10319705", "FUSjNnd3cE", "sql10319705");
if ($conn->connect_error){
    die("No se pudo conectar a la base de datos");
}

$response = array('error' => false);

$id = $_POST['id_proveedor'];


$result = $conn->query("DELETE FROM `proveedores` WHERE `proveedores`.`id_proveedor` = '$id'");
if($result){
    $response['message'] = "Proveedor borrado correctamente";
}else{
    $response['error'] = true;
    $response['message'] = "Error al borrar proveedor";
}

$conn -> close();
header("Content-type: application/json");
echo json_encode($response);
die();

?>
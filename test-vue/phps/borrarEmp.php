<?php

$conn = new mysqli("sql10.freesqldatabase.com", "sql10319705", "FUSjNnd3cE", "sql10319705");
if ($conn->connect_error){
    die("No se pudo conectar a la base de datos");
}

$response = array('error' => false);

$dni = $_POST['dni'];


$result = $conn->query("DELETE FROM `empleados` WHERE `empleados`.`dni` = '$dni'");
if($result){
    $response['message'] = "Empleado borrado correctamente";
}else{
    $response['error'] = true;
    $response['message'] = "Error al borrar empleado";
}

$conn -> close();
header("Content-type: application/json");
echo json_encode($response);
die();

?>
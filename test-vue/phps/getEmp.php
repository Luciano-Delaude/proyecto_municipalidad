<?php

$conn = mysqli_connect("localhost", "root", "", "proyecto_muni");
if (!$conn){
    die("Connection Failed".mysqli_connect_error());
}

$result = array('error'=>false);

$sql = $conn->query("SELECT * FROM `empleados`  ORDER BY `empleados`.`nombre` ASC");
$users = array();
$retval = mysqli_query($conn, "SELECT * FROM `empleados`  ORDER BY `empleados`.`nombre` ASC");
while($row = $sql->fetch_assoc()){
    array_push($users, $row);
}
$result['users'] = $users;

echo json_encode($result);

?>
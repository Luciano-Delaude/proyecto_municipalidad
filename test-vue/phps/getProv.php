<?php

$conn = mysqli_connect("sql10.freesqldatabase.com", "sql10319705", "FUSjNnd3cE", "sql10319705");
if (!$conn){
    die("Connection Failed".mysqli_connect_error());
}


$result = array('error'=>false);

$sql = $conn->query("SELECT * FROM `proveedores`");
$users = array();
$retval = mysqli_query($conn, "SELECT * FROM `proveedores`");
while($row = $sql->fetch_assoc()){
    array_push($users, $row);
}
$result['users'] = $users;

echo json_encode($result);

?>
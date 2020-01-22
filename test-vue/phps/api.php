<?php

$conn = mysqli_connect("sql10.freesqldatabase.com", "sql10319705", "FUSjNnd3cE", "sql10319705");
if (!$conn){
    die("Connection Failed".mysqli_connect_error());
}

$result = array('error'=>false);
$action = 'read';

if(isset($_GET['action'])){
    $action = $_GET['action'];
}

if($action == 'read'){
    $sql = $conn->query("SELECT * FROM empleados");
    $users = array();
    $retval = mysqli_query($conn, "SELECT * FROM empleados");
    while($row = $sql->fetch_assoc()){
        array_push($users, $row);
    }
    $result['empleados'] = $users;
}
echo json_encode($result);


?>
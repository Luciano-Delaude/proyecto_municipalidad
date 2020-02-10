<?php

$conn = mysqli_connect("sql10.freesqldatabase.com", "sql10319705", "FUSjNnd3cE", "sql10319705");
if (!$conn){
    die("Connection Failed".mysqli_connect_error());
}


$result = array('error'=>false);

$sql = $conn->query("SELECT `transacciones`.`n_transaccion`,
                            `transacciones`.`fecha`,
                            `transacciones`.`monto`,
                            `transacciones`.`n_tarjeta`,
                            `transacciones`.`id_proveedor`,
                            `proveedores`.`nombre`
                             FROM `transacciones` INNER JOIN `proveedores`
                             ON `transacciones`.`id_proveedor`=`proveedores`.`id_proveedor`
                             ORDER BY `transacciones`.`fecha`");
$users = array();
$retval = mysqli_query($conn, "SELECT `transacciones`.`n_transaccion`,
                                    `transacciones`.`fecha`,
                                    `transacciones`.`monto`,
                                    `transacciones`.`n_tarjeta`,
                                    `transacciones`.`id_proveedor`,
                                    `proveedores`.`nombre`
                                    FROM `transacciones` INNER JOIN `proveedores`
                                    ON `transacciones`.`id_proveedor`=`proveedores`.`id_proveedor`
                                    ORDER BY `transacciones`.`fecha`");
while($row = $sql->fetch_assoc()){
    array_push($users, $row);
}
$result['users'] = $users;

echo json_encode($result);

?>
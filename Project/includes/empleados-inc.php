<?php
require_once "database.php";
if (isset($_POST['submit'])){
    //Add database connection
    $nombre = $_POST['nombre'];
    $pin_tarjeta = $_POST['pin_tarjeta'];
    $DNI = $_POST['DNI'];
    $N_tarjeta = $_POST['n_tarjeta'];
    $Saldo = $_POST['saldo'];
    $ID_muni = $_POST['id_municipalidad'];
    
    if (empty($nombre) || empty($pin_tarjeta) || empty($DNI) || empty($N_tarjeta) || empty($ID_muni)){
        header("Location: ../empleados.php?error=emptyfields&nombre =".$DNI); // ../ vuelve un lugar en las carpetas
        exit();
     } else{
                $sql = "INSERT INTO empleados (dni,n_tarjeta,pin_tarjeta,nombre,saldo,id_municipalidad) VALUES (?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt,$sql)) {
                    header("Location: ../empleados.php?error=SQLerror");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt,"iiisii",$DNI,$N_tarjeta,$pin_tarjeta,$nombre,$Saldo,$ID_muni);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);

                } 
            }
        }
?>
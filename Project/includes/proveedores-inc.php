<?php
if(isset($_POST['submit'])){
    require 'database.php';

    $id_proveedor = $_POST['id_proveedor'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $categoria = $_POST['categoria'];
    $ID_muni = $_POST['id_municipalidad'];

    if(empty($id_proveedor) || empty($nombre)) {
        header("Location: ../index.php?error=emptyFields");
        exit();
    } else {
        $sql = "INSERT INTO proveedores (id_proveedor,id_municipalidad,nombre,direccion,categoria) VALUES (?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../index.php?error=SQLError");
            exit(); 
        } else {
            mysqli_stmt_bind_param($stmt,"iissi",$id_proveedor,$ID_muni,$nombre,$direccion,$categoria);
            mysqli_stmt_execute($stmt);
            exit(); 
        }
    }
} else {
    header("Location: ../index.php?error=accesoDenegado");
    exit();
}

?>1
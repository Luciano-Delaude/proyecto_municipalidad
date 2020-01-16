<?php
require_once 'includes/header.php';
/*
require_once 'includes/database.php';

$sql = "SELECT * FROM empleados";
$result = mysqli_query($conn,$sql);
$rowCount = mysqli_num_rows($result);

if($rowCount >0){
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row.['nombre']." ".$row['dni']." ".$row['n_tarjeta']." ".$row['pin_tarjeta']." ".$row['saldo']." ".$row['id_municipalidad']."<br>";
    }
} else {
    echo "No results found";
}
*/
?>
<?php
    if(isset($_SESSION['sessionId'])) {
        echo "Funco";
    } else{
        echo "No funco";
    }
?>


<?php
require_once 'includes/footer.php'
?>
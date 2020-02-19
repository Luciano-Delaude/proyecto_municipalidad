<?php 

class Conexion{

	static public function connect(){

		#PDO("nombre del servidor; nombre de la base de datos", "usuario", "contraseña")

		$conn = new PDO("mysql:host=database-1.cfturtdvoac9.sa-east-1.rds.amazonaws.com;port=3306;dbname=proyecto_muni", 
			            "masterUsername", 
						"mynewpassword");
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


		$conn->exec("set names utf8");

		return $conn;

	}

}

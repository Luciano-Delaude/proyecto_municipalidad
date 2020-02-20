<?php 

class Conexion{

	static public function connect(){

		#PDO("nombre del servidor; nombre de la base de datos", "usuario", "contraseña")

		$conn = new PDO("mysql:host=localhost;dbname=proyecto_muni", 
			            "root", 
						"");
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


		$conn->exec("set names utf8");

		return $conn;

	}

}

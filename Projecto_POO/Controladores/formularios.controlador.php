<?php
class ControladorFormularios{

    //Introducir empleados
    static public function ctrlProveedores(){
        if(isset($_POST['submit'])){

            $tabla = "proveedores";

            $datos = array("nombre"=>$_POST["nombre"],
                            "direccion"=>$_POST['direccion'],
                            "categoria"=>$_POST['categoria'],
                            "id_municipalidad"=>$_POST['id_municipalidad']);
            $result_prov = ModeloFormularios::mdlProveedores($tabla,$datos);
            return $result_prov;
        }
    }

    static public function ctrlEmpleados(){

        if(isset($_POST['submit'])){

            $tabla = "empleados";

            $datos = array("dni"=>$_POST['dni'],
                            "n_tarjeta"=>$_POST['n_tarjeta'],
                            "pin_tarjeta"=>$_POST['pin_tarjeta'],
                            "nombre"=>$_POST["nombre"],
                            "saldo"=>$_POST['saldo'],
                            "id_municipalidad"=>$_POST['id_municipalidad']);
            $result_emp = ModeloFormularios::mdlEmpleados($tabla,$datos);
            return $result_emp;
        }
    }

    static public function ctrlMunicipalidades(){

        if(isset($_POST['submit'])){

            $tabla = "municipalidades";

            $datos = array("id_municipalidad"=>$_POST['id_municipalidad'],
                            "n_provincia"=>$_POST['n_provincia'],
                            "nombre"=>$_POST['nombre'],
                            "n_empleados"=>$_POST['n_empleados']);
            $result_muni = ModeloFormularios::mdlMunicipalidades($tabla,$datos);
            return $result_muni;
        }
    }

    static public function ctrlTransacciones(){

        if(isset($_POST['submit'])){

            $tabla = "transacciones";

            $datos = array("n_tarjeta"=>$_POST['n_tarjeta'],
                            "id_proveedor"=>$_POST['id_proveedor'],
                            "n_transaccion"=>$_POST['n_transaccion'],
                            "monto"=>$_POST['monto']);
            $result_tran = ModeloFormularios::mdlTransacciones($tabla,$datos);
            return $result_tran;
        }
    }

    static public function ctrlSelect($tabla,$item,$valor){

        $result_prove = ModeloFormularios::mdlSelect($tabla,$item,$valor);
        return $result_prove;
    }

    static public function ctrlUpdate($tabla,$data){
        if(isset($_POST["submit"])){
            foreach ($data as $key => $value) {
                $data[$key] = $_POST[$key];
            }
            $actualizacion = ModeloFormularios::mdlUpdate($tabla,$data);
            return $actualizacion;

        }
    }

    public function ctrlDelete($tabla,$parameter,$index){
        if(isset($_POST["eliminarProveedor"]) || isset($_POST["eliminarMunicipalidad"]) ||isset($_POST["eliminarTransaccion"])||isset($_POST["eliminarEmpleado"])){
            $valor = $_POST[$parameter];

            $result = ModeloFormularios::mdlDelete($tabla,$valor,$index);

            if($result == "ok"){
                echo '<script>
                if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                }
                <script>
				setTimeout(function(){           
					window.location = "index.php?pagina='.$tabla.'";
				},1000);
			    </script>
			
			    <script>
				setTimeout(function(){
					window.location = "index.php?pagina='.$tabla.'";
                })
                </script>';

            }
        }
    }
}

?>
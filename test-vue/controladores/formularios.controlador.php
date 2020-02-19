<?php



class ControladorFormularios{

    //Introducir empleados
    static public function ctrlProveedores($tabla,$datos){
        $result_prov = ModeloFormularios::mdlProveedores($tabla,$datos);
        return $result_prov;      
    }

    static public function ctrlEmpleados($tabla,$datos){
        $result_emp = ModeloFormularios::mdlEmpleados($tabla,$datos);
        return $result_emp;
        
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
        /* foreach ($data as $key => $value) {
            $data[$key] = $_POST[$key];
        } */
        $actualizacion = ModeloFormularios::mdlUpdate($tabla,$data);
        return $actualizacion;
    }

    static public function ctrlCalculate($tabla1,$tabla2,$id){
        $calculo = ModeloFormularios::mdlCalculate($tabla1,$tabla2,$id);
        return $calculo;
    }

    public function ctrlDelete($tabla,$valor,$indice){
        $result = ModeloFormularios::mdlDelete($tabla,$valor,$indice);
        return $result;
    }

    static public function ctrAdmin($tabla,$datos){

        $result = ModeloFormularios::mdlAdmin($tabla,$datos);
        return $result;
    }
    static public function ctrlMonto($data){
        $result = ModeloFormularios::rstMonto($data);
        return $result;
    }
}


?>
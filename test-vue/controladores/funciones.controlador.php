<?php

require_once "formularios.controlador.php";
require_once "../modelos/formularios.modelo.php";

$funcion = $_POST['funcion'];
$response = array('error' => false);

if ($funcion == "addPro"){
    $tabla = "proveedores";
    $datos = array("muni" => $_POST['muni'],
                   "nombre" => $_POST['nombre'],
                   "direccion" => $_POST['direccion'],
                   "categoria" => $_POST['categoria']);
    $response['result'] = ControladorFormularios::ctrlProveedores($tabla,$datos);
    if ($response['result'] == "ok"){
        $response['message'] = "Proveedor agregado correctamente";
    }else{
        $response['error'] = true;
        $response['message'] = $response['result'];
    }
    header("Content-type: application/json");
    echo json_encode($response);
}

if($funcion == "addEmp"){
    $tabla = "empleados";
    $datos = array("dni" => $_POST['dni'],
                   "nTarjeta" => $_POST['nTarjeta'],
                   "pinTarjeta" => $_POST['pinTarjeta'],
                   "nombre" => $_POST['nombre'],
                   "muni" => $_POST['muni'],
                   "saldo" => $_POST['saldo']);
    $response['result'] = ControladorFormularios::ctrlEmpleados($tabla,$datos);
    if ($response['result'] == "ok"){
        $response['message'] = "Empleado agregado correctamente";
    }else{
        $response['error'] = true;
        $response['message'] = $response['result'];
    }
    header("Content-type: application/json");
    echo json_encode($response);
}

if($funcion == "getEmp"){
    $tabla = "empleados";
    $item = "id_municipalidad";
    $valor = $_POST['municipio'];
    $users = array();
    $users = ControladorFormularios::ctrlSelect($tabla,$item,$valor);
    $response['users'] = $users;
    header("Content-type: application/json");
    echo json_encode($response);
}

if($funcion == "getProv"){
    $tabla = "proveedores";
    $item = "id_municipalidad";
    $valor = $_POST['municipio'];
    $users = array();
    $users = ControladorFormularios::ctrlSelect($tabla,$item,$valor);
    $response['users'] = $users;
    header("Content-type: application/json");
    echo json_encode($response);
}

if($funcion == "getTran"){
    $tabla = "transacciones";
    $item = "id_municipalidad";
    $valor = $_POST['municipio'];
    $users = array();
    $users = ControladorFormularios::ctrlSelect($tabla,$item,$valor);
    $response['users'] = $users;
    header("Content-type: application/json");
    echo json_encode($response);
}

if($funcion == "borrarEmp"){
    $tabla = "empleados";
    $valor = $_POST['dni'];
    $indice = "dni";
    $response['result'] = ControladorFormularios::ctrlDelete($tabla,$valor,$indice);
    if ($response['result'] == "ok"){
        $response['message'] = "Empleado borrado correctamente";
    }else{
        $response['error'] = true;
        $response['message'] = $response['result'];
    }
    header("Content-type: application/json");
    echo json_encode($response);
}

if($funcion == "borrarProv"){
    $tabla = "proveedores";
    $valor = $_POST['id_proveedor'];
    $indice = "id_proveedor";
    $response['result'] = ControladorFormularios::ctrlDelete($tabla,$valor,$indice);
    if ($response['result'] == "ok"){
        $response['message'] = "Proveedor borrado correctamente";
    }else{
        $response['error'] <= true;
        if($response['result'] != null){
            $response['message'] = $response['result'];
        }else{
            $response['message'] = "El proveedor no se puede eliminar porque aun tiene transacciones vigentes";
        }
        
    }
    header("Content-type: application/json");
    echo json_encode($response);
}

if($funcion == "editEmp" || $funcion == "editPro"){
    if ($funcion == "editEmp"){
        $tabla = "empleados";
        $datos = array("dni" => $_POST['dni'],
                        "n_tarjeta" => $_POST['n_tarjeta'],
                        "pin_tarjeta" => $_POST['pin_tarjeta'],
                        "nombre" => $_POST['nombre'],
                        "id_municipalidad" => $_POST['id_municipalidad'],
                        "saldo" => $_POST['saldo']);
    }
    if ($funcion == "editPro"){
        $tabla = "proveedores";
        $datos = array("id_proveedor" => $_POST['id_proveedor'],
                        "id_municipalidad" => $_POST['id_municipalidad'],
                        "nombre" => $_POST['nombre'],
                        "direccion" => $_POST['direccion'],
                        "categoria" => $_POST['categoria']);
    }
    $response['result'] = ControladorFormularios::ctrlUpdate($tabla,$datos);
    if ($response['result'] == "ok"){
        if ($funcion == "editEmp") $response['message'] = "Empleado editado correctamente";
        if ($funcion == "editPro") $response['message'] = "Proveedor editado correctamente";
    }else{
        $response['error'] = true;
        $response['message'] = $response['result'];
    }
    header("Content-type: application/json");
    echo json_encode($response);
}

if ($funcion == "calcular"){
    $tabla1 = "proveedores";
    $tabla2 = "transacciones";
    $id = $_POST['id_proveedor'];
    $response['result'] = ControladorFormularios::ctrlCalculate($tabla1,$tabla2,$id);
    header("Content-type: application/json");
    echo json_encode($response);
}

if ($funcion == "login"){
    $tabla = "administradores";
    $data = array("usuario" => $_POST['user'],
                  "password" => $_POST['pass']);
    $response['admin'] = ControladorFormularios::ctrAdmin($tabla, $data);
    header("Content-type: application/json");
    echo json_encode($response);
}

if ($funcion == "getMuni"){
    $tabla = "municipalidades";
    $users = array();
    $users = ControladorFormularios::ctrlSelect($tabla,null,null);
    $response['users'] = $users;
    header("Content-type: application/json");
    echo json_encode($response);
}

if ($funcion == "getSaldo"){
    $tabla = "empleados";
    $items = array();
    $items['nTarjeta'] = "n_tarjeta";
    $items['pinTarjeta'] = "pin_tarjeta";
    $valores = array();
    $valores = array();
    $valores['nTarjeta'] = $_POST['nTarjeta'];
    $valores['pin'] = $_POST['pinTarjeta'];
    $users = array();
    $users = ControladorFormularios::ctrlSaldo($tabla,$items,$valores);
    $response['users'] = $users;
    header("Content-type: application/json");
    echo json_encode($response);
}

if ($funcion == "getTranEmpleado"){
    $tabla = "transacciones";
    $items = array();
    $items['nTarjeta'] = "n_tarjeta";
    $items['pinTarjeta'] = "pin_tarjeta";
    $valores = array();
    $valores = array();
    $valores['nTarjeta'] = $_POST['nTarjeta'];
    $valores['pin'] = $_POST['pinTarjeta'];
    $users = array();
    $users = ControladorFormularios::ctrlTranEmpleado($tabla,$items,$valores);
    $response['users'] = $users;
    header("Content-type: application/json");
    echo json_encode($response);
}

if ($funcion == "getTranProveedores"){
    $tabla = "transacciones";
    $items = array();
    $items['idProveedor'] = "id_proveedor";
    $valores = array();
    $valores['idProveedor'] = $_POST['id_proveedor'];
    $users = array();
    $users = ControladorFormularios::ctrlTranEmpleado($tabla,$items,$valores);
    $response['users'] = $users;
    header("Content-type: application/json");
    echo json_encode($response);
}
if ($funcion == "compra"){
    $datos = array("n_tarjeta" => $_POST['nTarjeta'],
                   "id_proveedor" => $_POST['idProveedor'],
                   "monto" => $_POST['monto'],
                    "n_transaccion" => $_POST['nTransaccion']);
    $response['result'] = ControladorFormularios::ctrlMonto($datos);
    header("Content-type: application/json");
    echo json_encode($response);
}



?>
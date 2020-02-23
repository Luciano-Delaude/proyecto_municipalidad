<?php

require_once "conexion.php";


class ModeloFormularios{
    /*===================================================
    INSERTAR PROVEEDORES
    ===================================================*/ 
    static public function mdlProveedores($tabla,$datos){
        $stmt = Conexion::connect() -> prepare("INSERT INTO $tabla(nombre,direccion,categoria,id_municipalidad) 
                                                     VALUES (:nombre,:direccion,:categoria,:id_municipalidad)");
        $stmt ->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt ->bindParam(":direccion",$datos["direccion"],PDO::PARAM_STR);
        $stmt ->bindParam(":categoria",$datos["categoria"],PDO::PARAM_INT);
        $stmt ->bindParam(":id_municipalidad",$datos["muni"],PDO::PARAM_INT);      
            if($stmt->execute()){
                return "ok";
                echo '<script>
                if(window.history.replaceState){
    
                    window.history.replaceState(null,null,window.location.href);
                }			
                </script>';                
            }else {
                return Conexion::connect()->errorInfo();
            }
        $stmt = null;
    }

    /*===================================================
    INSERTAR EMPLEADOS
    ===================================================*/ 
    static public function mdlEmpleados($tabla,$datos){
        $stmt = Conexion::connect() -> prepare("INSERT INTO $tabla(dni,n_tarjeta,pin_tarjeta,nombre,saldo,id_municipalidad) 
                                                     VALUES (:dni,:n_tarjeta,:pin_tarjeta,:nombre,:saldo,:id_municipalidad)");
        $stmt ->bindParam(":dni",$datos["dni"],PDO::PARAM_STR);
        $stmt ->bindParam(":n_tarjeta",$datos["nTarjeta"],PDO::PARAM_STR);
        $stmt ->bindParam(":pin_tarjeta",$datos["pinTarjeta"],PDO::PARAM_INT);
        $stmt ->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt ->bindParam(":saldo",$datos["saldo"],PDO::PARAM_INT);
        $stmt ->bindParam(":id_municipalidad",$datos["muni"],PDO::PARAM_INT);

        
            if($stmt->execute()){
                return "ok";
                echo '<script>
                if(window.history.replaceState){
    
                    window.history.replaceState(null,null,window.location.href);
                }			
                </script>';
            }else {
                return Conexion::connect()->errorInfo();
            }
        $stmt = null;
    }
    /*===================================================
    INSERTAR MUNICIPALIDADES
    ===================================================*/    
    static public function mdlMunicipalidades($tabla,$datos){
        $stmt = Conexion::connect() -> prepare("INSERT INTO $tabla(id_municipalidad,n_provincia,nombre,n_empleados) 
                                                     VALUES (:id_municipalidad,:n_provincia,:nombre,:n_empleados)");
        $stmt ->bindParam(":id_municipalidad",$datos["id_municipalidad"],PDO::PARAM_INT);
        $stmt ->bindParam(":n_provincia",$datos["n_provincia"],PDO::PARAM_INT);
        $stmt ->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
        $stmt ->bindParam(":n_empleados",$datos["n_empleados"],PDO::PARAM_INT);

        
            if($stmt->execute()){
                return "ok";
                echo '<script>
                if(window.history.replaceState){
    
                    window.history.replaceState(null,null,window.location.href);
                }			
                </script>';
                echo '<div class="alert alert-success">La municipalidad fue registrada correctamente</div>';
            }else {
                echo "El error es: <br>";
                print_r(Conexion::connect()->errorInfo());
                print_r(Conexion::connect()->errorCode());
            }
        $stmt = null;
    }
    /*===================================================
    INSERTAR TRANSACCIONES
    ===================================================*/

    static public function mdlTransacciones($tabla,$datos){
        $stmt = Conexion::connect() -> prepare("INSERT INTO $tabla(n_tarjeta,id_proveedor,n_transaccion,monto) 
                                                     VALUES (:n_tarjeta,:id_proveedor,:n_transaccion,:monto)");
        $stmt ->bindParam(":n_tarjeta",$datos["n_tarjeta"],PDO::PARAM_STR);
        $stmt ->bindParam(":id_proveedor",$datos["id_proveedor"],PDO::PARAM_INT);
        $stmt ->bindParam(":n_transaccion",$datos["n_transaccion"],PDO::PARAM_INT);
        $stmt ->bindParam(":monto",$datos["monto"],PDO::PARAM_INT);
        

        
            if($stmt->execute()){
                return "ok";                
            }else {
                echo "El error es: <br>";
                print_r(Conexion::connect()->errorInfo());
                print_r(Conexion::connect()->errorCode());
            }
        $stmt = null;
    }
    /*===================================================
    SELECCIONAR TABLAS
    ===================================================*/

    static public function mdlSelect($tabla,$item,$valor){
        
        if($tabla == "empleados" || $tabla == "proveedores"){
            $stmt = Conexion::connect()->prepare("SELECT * FROM $tabla WHERE $item=$valor ORDER BY $tabla.`nombre` ASC");
            $stmt->execute();
            return $stmt->fetchAll(); 
        }
        if($tabla == "transacciones"){
            $stmt = Conexion::connect()->prepare("SELECT $tabla.`n_transaccion`,
                                                        $tabla.`fecha`,
                                                        $tabla.`monto`,
                                                        $tabla.`n_tarjeta`,
                                                        $tabla.`id_proveedor`,
                                                        `proveedores`.`nombre`
                                                        FROM $tabla INNER JOIN `proveedores`
                                                        ON $tabla.`id_proveedor`=`proveedores`.`id_proveedor`
                                                        WHERE `proveedores`.`id_municipalidad` = $valor ORDER BY $tabla.`fecha`");
            $stmt->execute();
            return $stmt->fetchAll(); 
        }else{
            $stmt = Conexion::connect()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll(); 
        }
        
        /* $stmt = Conexion::connect() ->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $item DESC");
        
        $stmt -> bindParam(":".$item,$valor,PDO::PARAM_STR);
        $stmt ->execute();

        return $stmt->fetch();  */

        $stmt = null;
    
    }

    static public function mdlSaldo($tabla,$items,$valores){
        $dni = $items['nTarjeta'];
        $pin = $items['pinTarjeta'];
        $stmt = Conexion::connect()->prepare("SELECT * FROM $tabla WHERE $dni=:valor1 AND $pin=:valor2");
        $stmt -> bindParam(":valor1",$valores['nTarjeta'],PDO::PARAM_STR);
        $stmt -> bindParam(":valor2",$valores['pin'],PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(); 
        $stmt = null;
    
    }

    static public function mdlTranEmpleado($tabla,$items,$valores){
        $nTarjeta = $items['nTarjeta'];
        $pin = $items['pinTarjeta'];
        $stmt = Conexion::connect()->prepare("SELECT $tabla.`n_tarjeta`,
                                                     `proveedores`.`nombre`,
                                                     $tabla.`n_transaccion`,
                                                     $tabla.`monto`,
                                                     $tabla.`fecha`
                                                     FROM $tabla INNER JOIN `proveedores` 
                                                     ON $tabla.`id_proveedor`=`proveedores`.`id_proveedor` 
                                                     WHERE n_tarjeta = :valor 
                                                     ORDER BY $tabla.`fecha` DESC ");
        $stmt -> bindParam(":valor",$valores['nTarjeta'],PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(); 
        $stmt = null;
    }

    static public function mdlTranProveedor($tabla,$valor){
        $stmt = Conexion::connect()->prepare("SELECT $tabla.`n_tarjeta`,
                                                     $tabla.`n_transaccion`,
                                                     $tabla.`monto`,
                                                     $tabla.`fecha`
                                                     FROM $tabla WHERE id_proveedor = :valor 
                                                     ORDER BY $tabla.`fecha` DESC ");
        $stmt -> bindParam(":valor",$valor,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(); 
        $stmt = null;
    }

    static public function mdlUpdate($tabla,$datos){

        $query_array = array();
        foreach ($datos as $key => $value){
            if ($value != null){
                $query_array[] = $key.'=:'.$key;
            }            
        }
        $stmt = Conexion::connect()->prepare("UPDATE $tabla SET ".implode(',', $query_array)." WHERE ".(array_keys($datos)[0])."=:".(array_keys($datos)[0]));
        // echo '<script>';
        // echo 'console.log('. json_encode( $stmt ) .')';
        // echo '</script>';
        foreach ($datos as $key => $value) {
            if ($value != null) {
                if(is_int($value))        { $param = PDO::PARAM_INT; }
                elseif(is_bool($value))   { $param = PDO::PARAM_BOOL; }
                elseif(is_null($value))   { $param = PDO::PARAM_NULL; }
                elseif(is_string($value)) { $param = PDO::PARAM_STR; }
                else { $param = FALSE;}
                if($param) $stmt ->bindValue(":$key",$value,$param);
            }
        }
        // $stmt = Conexion::connect() -> prepare("UPDATE $tabla 
        // SET $parameter2 =:$parameter2,$parameter3 =:$parameter3,$parameter4=:$parameter4,$parameter5=:$parameter5 
        // WHERE $parameter1=:$parameter1");
        // $stmt ->bindParam(":$parameter1",$datos["$parameter1"],PDO::PARAM_INT);
        // $stmt ->bindParam(":$parameter2",$datos["$parameter2"],PDO::PARAM_STR);
        // $stmt ->bindParam(":$parameter3",$datos["$parameter3"],PDO::PARAM_STR);
        // $stmt ->bindParam(":$parameter4",$datos["$parameter4"],PDO::PARAM_INT);
        // $stmt ->bindParam(":$parameter5",$datos["$parameter5"],PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
            echo '<script>
                if(window.history.replaceState){
    
                    window.history.replaceState(null,null,window.location.href);
                }			
                </script>';
        }else {
            return Conexion::connect()->errorInfo();
        }
        $stmt=null;

    }

    /*===================================================
    ELIMINAR TABLAS Y/O PARAMETROS
    ===================================================*/

    static public function mdlDelete($tabla,$valor,$index){
        $stmt = Conexion::connect() ->prepare("DELETE FROM $tabla WHERE $index = :$index");
        $stmt -> bindParam(":$index",$valor,PDO::PARAM_INT);

        if($stmt->execute()){
            $stmt = null;
            return "ok";
            /* echo '<script>
                if(window.history.replaceState){
    
                    window.history.replaceState(null,null,window.location.href);
                }			
                </script>'; */
        }
        else{
            $stmt = null;
            return Conexion::connect()->errorInfo();
        }

        $stmt = null;
    }

    static public function mdlCalculate($tabla1,$tabla2,$id){
        $stmt = Conexion::connect() ->prepare("SELECT SUM($tabla2.`monto`) AS `total` FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.`id_proveedor`=$tabla2.`id_proveedor` WHERE $tabla1.`id_proveedor`=:$id");
        $stmt -> bindParam(":$id",$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function mdlAdmin($tabla,$datos){
        $user = $datos['usuario'];
        $pass = $datos['password'];
        $stmt = Conexion::connect() ->prepare("SELECT `id_municipio` FROM `administradores` 
                                               WHERE `usuario`=:user AND `password`=:pass");
        $stmt ->bindParam(":user",$user,PDO::PARAM_STR);
        $stmt ->bindParam(":pass",$pass,PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function rstMonto($data){
        $enun = Conexion::connect() ->prepare("SELECT n_transaccion FROM transacciones WHERE n_transaccion = :n_transaccion");
        $enun ->bindParam(":n_transaccion",$data["n_transaccion"],PDO::PARAM_INT);
        $enun ->execute();
        if($enun->rowCount()>0){
            return "ntransaccioninvalido";
        }
        else{
            $n_tarjeta = $data['n_tarjeta'];
            $monto = $data['monto'];
            $stmt = Conexion::connect() -> prepare("UPDATE empleados SET saldo = saldo - $monto 
                                                    WHERE n_tarjeta = :n_tarjeta AND saldo >= $monto");
            $stmt ->bindParam(":n_tarjeta",$n_tarjeta,PDO::PARAM_STR);
              $stmt->execute();
    
            if($stmt->rowCount()>0){
    
                $result = ModeloFormularios::mdlTransacciones("transacciones",$data);
                $stmt = null;
                return $result;
            }
            else{
                $stmt = null;
                return "saldoinsuficiente";
            }
        }

    }

}


?>
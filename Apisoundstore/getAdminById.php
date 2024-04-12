<?php 
    include "Conexion.php";

    if(!empty($_POST["id_usuario"])  || !empty($_GET["id_usuario"])){
        $id_usuario = (!empty($_POST["id_usuario"])) ? $_POST["id_usuario"] : $_GET["id_usuario"] ;

        $consulta = $base_de_datos->prepare("SELECT nombre,apellido,email,direccion,contrasena,tipo,estado FROM usuarios
        WHERE id_usuario = :id");
        $consulta->bindParam(":id", $id_usuario);
        $consulta->execute();

        $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $datos = mb_convert_encoding($datos, "UTF-8", "iso-8859-1");
   
        if($datos){
            $respuesta = [ 
                        "status" => true,
                        "message" => "USERS##FOUNT",
                        "usuarios" =>$datos,

                    ];
            echo json_encode($respuesta);

            }else{
                $respuesta = [ 
                            "status" => false,
                            "message" => "USERS#NOT#FOUNT",

                        ];
                echo json_encode($respuesta);
            }

    }else{
        $respuesta = [
                        "status" => 403,
                        "message" => "ERROR#DATA"
                    ];
        echo json_encode($respuesta);
    }
?>


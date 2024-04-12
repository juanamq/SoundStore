<?php 
    include "Conexion.php";

    if(!empty($_POST["id_usuario"])  || !empty($_GET["id_usuario"])){
        $id_usuario = (!empty($_POST["id_usuario"])) ? $_POST["id_usuario"] : $_GET["id_usuario"] ;

        $consulta = $base_de_datos->prepare("SELECT tipo_instrumento,marca, modelo, tiempo,fecha,estado FROM mantenimiento
        WHERE id_usuario = :id");
        $consulta->bindParam(":id", $id_usuario);
        // Ejecutar consulta
        $consulta->execute();

        // Traer los datos
        $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);
        // Sirve para que acepte los textos con tilde.
        $datos = mb_convert_encoding($datos, "UTF-8", "iso-8859-1");
   
        if($datos){
            $respuesta = [ 
                        "status" => true,
                        "message" => "MAINTENANCE##FOUNT",
                        "mantenimiento" =>$datos
                    ];
            echo json_encode($respuesta);

            }else{
                $respuesta = [ 
                            "status" => false,
                            "message" => "MAINTENANCE#NOT#FOUNT",

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


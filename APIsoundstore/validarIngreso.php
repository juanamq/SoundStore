<?php 
    include "Conexion.php";

    if((!empty($_POST["email"]) && !empty($_POST["contrasena"])) || (!empty($_GET["email"]) && !empty($_GET["contrasena"]))){
        $email = (!empty($_POST["email"])) ? $_POST["email"] : $_GET["email"] ;
        $contrasena = (!empty($_POST["contrasena"])) ? md5($_POST["contrasena"])  : md5($_GET["contrasena"]) ;


        $consulta = $base_de_datos->prepare("SELECT id_usuario,nombre,apellido FROM usuarios WHERE email = :cor AND contrasena = :pas");
        $consulta->bindParam(":cor", $email);
        $consulta->bindParam(":pas", $contrasena);
        // Ejecutar consulta
        $consulta->execute();

        // Traer los datos
        $datos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        // Sirve para que acepte los textos con tilde.
        $datos = mb_convert_encoding($datos, "UTF-8", "iso-8859-1");
        
        if($datos){
            $respuesta = [ 
                        "status" => true,
                        "message" => "USER##FOUNT",
                        "usuario" =>$datos[0]

                    ];
            echo json_encode($respuesta);

        }else{
            $respuesta = [ 
                        "status" => false,
                        "message" => "USER#NOT#FOUNT",

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
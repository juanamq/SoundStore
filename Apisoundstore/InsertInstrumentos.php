<?php 
    
    include 'Conexion.php';

    if (!empty($_POST['id_instrumento']) and !empty($_POST['tipo_animal']) and !empty($_POST['peso']) ) {

        $identificacion = $_POST['id_instrumento'];
        $tipo_animal = $_POST['tipo_animal'];
        $peso = $_POST['peso'];
        $edad = $_POST['edad'];
        $fecha_ingreso = $_POST['fecha_ingreso'];
        $foto = $_POST['foto'];
        $ubicacion_actual = $_POST['ubicacion_actual'];
        $raza = $_POST['raza'];
        $valor = $_POST['valor'];
        $estado = $_POST['estado'];

        try {
            $consulta = $base_de_datos->prepare("INSERT INTO animales (id_instrumento, tipo_animal, peso, edad, fecha_ingreso,foto,ubicacion_actual,raza,valor,estado)
            VALUES(:ide, :tpa, :pes, :eda, :fci, :img ,:ubi, :raz, :val,:est) ");

            $consulta->bindParam(':ide', $identificacion);
            $consulta->bindParam(':tpa', $tipo_animal);
            $consulta->bindParam(':pes', $peso);
            $consulta->bindParam(':eda', $edad);
            $consulta->bindParam(':fci', $fecha_ingreso);
            $consulta->bindParam(':img', $foto);
            $consulta->bindParam(':ubi', $ubicacion_actual);
            $consulta->bindParam(':raz', $raza);
            $consulta->bindParam(':val', $valor);
            $consulta->bindParam(':est', $estado);

            $proceso = $consulta->execute();

            if( $proceso ){
                $respuesta = [
                                'status' => true,
                                'mesagge' => "OK##CLIENT##INSERT"
                              ];
                echo json_encode($respuesta);
            }else{
                $respuesta = [
                                'status' => false,
                                'mesagge' => "ERROR##CLIENT##INSERT"
                              ];
                echo json_encode($respuesta);
            }
        } catch (Exception $e) {
            $respuesta = [
                            'status' => false,
                            'mesagge' => "ERROR##SQL",
                            'exception' => $e
                          ];
            echo json_encode($respuesta);
        }
    }else{
        $respuesta = [
                        'status' => false,
                        'mesagge' => "ERROR##DATOS##POST",
                        '$_GET' => $_GET,
                        '$_POST' => $_POST
                      ];
        echo json_encode($respuesta);
    }
?>

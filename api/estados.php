<?php
    //Declaramos que este archivo va a retornar un contenido tipo json
    header("Content-Type: application/json");
    //Recibir peticiones del estado y dispositivo
    switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
            //Se requiere añadir un json a la petición
            $_POST = json_decode(file_get_contents('php://input'), true);
            //Devolvemos los datos necesarios en formato json
            $resultado["mensaje"] = "Guardar dispositivo, informacion: " . json_encode($_POST);
            echo json_encode($resultado);
            break;
        case 'GET' :
            //Sólo necesita mandar un parametro en la url
            //Obtener estado del dispositivo
            if((isset($_GET['id'])) && (isset($_GET['estado']))){
                //Devolvemos los datos necesarios en formato json
                $resultado["mensaje"] = "Retornar el estado del dispositivo : ". $_GET['id'] .", estado: " . $_GET['estado'];
                echo json_encode($resultado);
            }
            //Obtener solo el dispositivo
            else if(isset($_GET['id'])){
                //Devolvemos los datos necesarios en formato json
                $resultado["mensaje"] = "Retornar el dispositivo con el id: " . $_GET['id'];
                echo json_encode($resultado);
            }
            //Obtener solo el estado
            else if(isset($_GET['estado'])){
                //Devolvemos los datos necesarios en formato json
                $resultado["mensaje"] = "Retornar el estado: " . $_GET['estado'];
                echo json_encode($resultado);
            }
            //Obtener todos los dispositivos
            else{
                //Devolvemos los datos necesarios en formato json
                $resultado["mensaje"] = "Retornar todos los dispositivos";
                echo json_encode($resultado);
            }
            break;
        case 'PUT':
            //Se necesitan mandar ambos, tanto los parametros en la url como la petición json
            $_PUT = json_decode(file_get_contents('php://input'), true);
            //Devolvemos los datos necesarios en formato json 
            $resultado["accion"] = "Actualizar dispositivo con el id: ". $_GET['id'];
            $resultado["mensaje"] = "Informacion a actualizar " . json_encode($_PUT);
            echo json_encode($resultado);
            break;
        case 'DELETE':
            //Sólo se necesita mandar el parametro en la url
            //Devolvemos los datos necesarios en formato json
            $resultado["mensaje"] = "Eliminar dispositivo con el id: " . $_GET['id'];
            echo json_encode($resultado);
            break;

    }

?>

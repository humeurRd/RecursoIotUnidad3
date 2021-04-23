<?php

    //Declaramos que este archivo va a retornar un contenido tipo json
    header("Content-Type: application/json");
    //Recibir peticiones de la fecha
    
    //Se especifican los espacios
    $datum = mktime(date('H') + 0, date('i'), date('s'), date('m'), date('d'), date('y'));

    //Se da formato a la hora
    $uploadDate = date('Y/m/d H:i:s', $datum);

    $respuesta["fecha"] = $uploadDate;
    
    //Se imprime la hora
    echo json_encode($respuesta);

?>
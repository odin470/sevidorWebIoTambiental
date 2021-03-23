<?php

/*
  Software escrito por Hernan Yañez 
  Para mas informacio visita mi pagina web www.ocorpchile.com
  +56988233370
  busco donde desarrollar software
*/

$servername = "localhost";

// REEMPLAZAR con el nombre de tu base de datos
$dbname = "nombre_de_tu_base_de_datos";
// REEMPLAZAR con el usuario de la base de datos
$username = "usuario_de_la_base_de_datos";
// REEMPLAZAR con la contraseña de usuario de la base de datos
$password = "contraseña_de_usuario";

// Mantenga este valor de clave de API para que sea compatible con el código de la ESP32 del proyecto.
// Si cambia este valor, tambiar debe cambiarlo en el codigo de la ESP32 para que coincida
$api_key_value = "87R60fHf92aJa8TO2X";

$api_key= $sensor = $ubicacion = $v1Temperatura = $v2Humedad = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $sensor = test_input($_POST["sensor"]);
        $ubicacion = test_input($_POST["ubicacion"]);
        $v1Temperatura = test_input($_POST["v1Temperatura"]);
        $v2Humedad = test_input($_POST["v2Humedad"]);
                
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("La conexión falló: " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO SensorData (sensor, ubicacion, v1Temperatura, v2Humedad)
        VALUES ('" . $sensor . "', '" . $ubicacion . "', '" . $v1Temperatura . "', '" . $v2Humedad . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Nuevo registro creado con éxito";
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Se proporcionó una clave de API incorrecta.";
    }

}
else {
    echo "No se han publicado datos con HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

<!DOCTYPE html>
<html><body>
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

// Crear conneccion
$conn = new mysqli($servername, $username, $password, $dbname);
// revisar conneccion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, sensor, ubicacion, v1Temperatura, v2Humedad, fecha_lectura FROM SensorData ORDER BY id DESC";

echo '<table cellspacing="5" cellpadding="5">
      <tr> 
        <td>ID</td> 
        <td>Sensor</td> 
        <td>Ubicacion</td> 
        <td>Temperatura</td> 
        <td>Humedad</td>
        <td>Fecha Lectura</td> 
      </tr>';
 
if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $row_id = $row["id"];
        $row_sensor = $row["sensor"];
        $row_ubicacion = $row["ubicacion"];
        $row_v1Temperatura = $row["v1Temperatura"];
        $row_v2Humedad = $row["v2Humedad"]; 
        $row_fecha_lectura = $row["fecha_lectura"];
        // Descomente para establecer la zona horaria en - 1 hora (puede cambiar 1 a cualquier número)
        //$row_fecha_lectura = date("Y-m-d H:i:s", strtotime("$row_fecha_lectura - 1 hours"));
      
        // Descomente para establecer la zona horaria en + 4 horas (puede cambiar 4 a cualquier número)
        //$row_fecha_lectura = date("Y-m-d H:i:s", strtotime("$row_fecha_lectura + 4 hours"));
      
        echo '<tr> 
                <td>' . $row_id . '</td> 
                <td>' . $row_sensor . '</td> 
                <td>' . $row_ubicacion . '</td> 
                <td>' . $row_v1Temperatura . '</td> 
                <td>' . $row_v2Humedad . '</td>
                <td>' . $row_fecha_lectura . '</td> 
              </tr>';
    }
    $result->free();
}

$conn->close();
?> 
</table>
</body>
</html>

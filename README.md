# SevidorWeb-IoT-Ambiental
Les envío un gran abrazo a todos desde mi cuarentena en La Serena, Chile #SerenaconValley Hoy para no perder la costumbre les compartiré un mini proyecto sencillo donde tomas datos desde un sensor ambiental DHT11 (temperatura y humedad) y crearemos un cliente en una ESP32 para insertar estos datos en una base de datos MySQL en tu hosting. También tendrá una página web donde podrás ver los datos entregados por el sensor desde cualquier parte del mundo.  Un gran abrazo para todos y atento el costo del proyecto en hardware no supera los 20 mil pesos Chilenos.  Saludos que tenga una buena semana y espero se entretengan en cuarentena con estos proyectos sencillos, rápidos y baratos de hacer para darle IoT a tu vida.  Recuerda que busco donde desarrollar tecnología para ti o tus clientes:  https://cv.ocorpchile.com
## Gracias a KAUEL por apoyarnos con el hardware para estos proyectos www.kauel.com 

Para este proyecto utilizaremos:

- Tarjeta de Desarrollo ESP32 con Wifi Bluetooth Dual Core https://altronics.cl/tarjeta-esp32-microusb?search=esp32
- Sensor de Humedad y Temperatura DHT11 https://altronics.cl/sensor-dht11?search=dht11
- Cable Micro USB de 80cm https://altronics.cl/cable-usb-a-macho-microusb-b-macho-100cm-negro
- Cables Jumper 40 Pcs x 10 cms Macho a Macho https://altronics.cl/jumper-macho-macho-10m-40pcs
- Protoboard Breadboard de 400 puntos https://altronics.cl/protoboard-400ptos

En chile compro todo en un ecommerce llamado Altronic los cuales envian a todo chile de forma muy rapida y el hardware es muy barato.

## Primero hablaremos del alojamiento de la aplicacion PHP y Base de Datos MySQL

Lo ideal es tener un hosting con su propio nombre de dominio como ejemplo https://cv.ocorpchile.com y espacio para almacenar las lecturas del sensor DHT11 del ESP32, la idea es que puedas visualizar los datos desde cualquier parte del mundo y dispositivo accediendo al tu dominio (ejemplo: https://cv.ocorpchile.com). 

Acá tienes un diagrama de lo que lograremos con estas líneas de código:

![Diagrama del proyecto](https://raw.githubusercontent.com/odin470/sevidorWebIoTambiental/main/ESP32DHT11.png "Diagrama del proyecto")

Te recomiendo usar un hosting como www.Bluehosting.cl el cual es muy económico y te recomiendo el plan full el cual regala un dominio gratis por un año, además tiene CPanel lo que hace las cosas más fáciles.

## Segundo prepararemos nuestra base de datos MySQL:

En nuestro hosting con cpanel buscaremos el asistente para crear base de datos MySQL donde crearemos una base de datos y un usuario con todos los permisos a la base de datos, luego anotaremos el nombre de la base de datos con su prefijo, el usuario asociado a la base de datos y su clave ya que la utilizaremos más adelante.

### Crear tabla en nuestra base de datos

No profundizare en la creación de tablas de datos pero le dejare una consulta para que creen su tabla de una manera rápida 

>CREATE TABLE SensorData (
>    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,    
>    sensor VARCHAR(30) NOT NULL,    
>    ubicacion VARCHAR(30) NOT NULL,    
>    v1Temperatura VARCHAR(10),    
>    v2Humedad VARCHAR(10),    
>    fecha_lectura TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    
>) 

## Tercero crearemos el ScriptPHP HTTP POST: insertar datos en la base de datos MySQL

Ahora hablaremos del ScriptPHP el cual escuchas las consultas entrantes desde la placa ESP32 y luego inserta los datos en nuestra base de datos MySQL, el archivo llamado publica-datos.php ubicado en la carpeta servidor de este proyecto lo debes copiar en la raíz de tu hosting asociado a este proyecto.

https://github.com/odin470/sevidorWebIoTambiental/blob/main/servidor/publica-datos.php

## Cuarto ScriptPHP: muestra el contenido de la base de datos

Crearemos otro archivo PHP en el directorio raiz que mostrará todo el contenido de la base de datos en una página web. Nombra tu nuevo archivo: ver-data.php ubicado en la carpeta servidor de este proyecto lo debes copiar en la raíz de tu hosting asociado a este proyecto.

https://github.com/odin470/sevidorWebIoTambiental/blob/main/servidor/ver-datos.php

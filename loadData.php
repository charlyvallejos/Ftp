<?php
require 'config/config.php';

$pedidos = '';
// $a = action
// $t = table

$ftp_server='files.000webhost.com';
$ftp_user_name='charlyvallejos';
$ftp_user_pass='pentium3';
$conn_id = ftp_connect($ftp_server);

// Loguearse con usuario y contraseña
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

if(!empty(isset($_GET))){
    $file = $_GET['archivo'];
    $local_file = './descargas/'.$file;
    $server_file = 'public_html/descargas/'.$file; //Nombre archivo en FTP
    if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
        echo "Se descargado el archivo con éxito";
        echo "<br><a href='.'><-- Volver</a>";
    } else {
        echo "Ha ocurrido un error";       
    }
            
}

// Cerrar la conexión
ftp_close($conn_id);


?>



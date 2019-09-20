<?php
require 'config/config.php';

$pedidos = '';
// $a = action
// $t = table

if(!empty(isset($_GET))){
    if(!empty(isset($_GET['archivo']))){
        $ftp_server='files.000webhost.com';
        $ftp_user_name='charlyvallejos';
        $ftp_user_pass='pentium3';
        $conn_id = ftp_connect($ftp_server);

        // Loguearse con usuario y contraseña
        $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
        
        $file = $_GET['archivo'];
        $local_file = 'descargas/'.$file;
        $server_file = 'public_html/descargas/'.$file; //Nombre archivo en FTP
        if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
            echo "Se descargado el archivo con éxito";
            echo "<br><a href='.'><-- Volver</a>";
        } else {
            echo "Ha ocurrido un error";       
        }
        
        // Cerrar la conexión
        ftp_close($conn_id);        
    }
    else
        if (isset($_GET['login'])){
            $usuario = new Usuario();
            echo $usuario->login();
        }
    else
        if(isset($_GET['logout']))
        {
            $usuario = new Usuario();
            $usuario->logout();
        }
            
}

//            $usuario = new Usuario();
//            echo $usuario->login();
            //echo json_encode(array("ok" => true));



?>



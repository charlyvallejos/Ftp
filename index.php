<?php
    require 'config/config.php';
    $usuario = new Usuario();
    if($usuario->autenticar())
    {
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $local_file = './descargas/archivo.txt'; //Nombre archivo en nuestro PC
            $server_file = 'public_html/prueba.txt'; //Nombre archivo en FTP

            // Establecer la conexión
            $ftp_server='files.000webhost.com';
            $ftp_user_name='charlyvallejos';
            $ftp_user_pass='pentium3';
            $conn_id = ftp_connect($ftp_server);

            // Loguearse con usuario y contraseña
            $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

            // Descarga el $server_file y lo guarda en $local_file
//            if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
//            echo "Se descargado el archivo con éxito\n";
//            } else {
//            echo "Ha ocurrido un error\n";
//            }
            
            //Creamos Nuestra Función
//            function listFiles($directorio){ //La función recibira como parametro un directorio
//                if (is_dir($directorio)) 
//                { //Comprobamos que sea un directorio Valido
//                    if ($dir = opendir($directorio)) {//Abrimos el directorio
//                        echo '<ul>'; //Abrimos una lista HTML para mostrar los archivos
//                        while (($archivo = readdir($dir)) !== false){ //Comenzamos a leer archivo por archivo
//                            if ($archivo != '.' && $archivo != '..'){//Omitimos los archivos del sistema . y ..
//                                $nuevaRuta = $directorio.$archivo.'/';//Creamos unaruta con la ruta anterior y el nombre del archivo actual 
//                                echo '<li>'; //Abrimos un elemento de lista 
//                                if (is_dir($nuevaRuta)) { //Si la ruta que creamos es un directorio entonces:
//                                    echo '<b>'.$nuevaRuta.'</b>'; //Imprimimos la ruta completa resaltandola en negrita
//                                    listFiles($nuevaRuta);//Volvemos a llamar a este metodo para que explore ese directorio.
//                                } 
//                                else 
//                                { //si no es un directorio: 
//                                    //echo 'Archivo: '.$archivo; //simplemente imprimimos el nombre del archivo actual
//                                    $ruta_archivo = $directorio.$archivo."";
//                                    echo "<a href='$ruta_archivo' target='_blank'>Archivo: $archivo</a>";
//                                }
//                                '</li>'; //Cerramos el item actual y se inicia la llamada al siguiente archivo
//                            }
//                        }//finaliza While
//                        echo '</ul>';//Se cierra la lista 
//                        closedir($dir);//Se cierra el archivo
//                    }
//                }
//                else
//                {//Finaliza el If de la linea 12, si no es un directorio valido, muestra el siguiente mensaje
//                    echo 'No Existe el directorio';
//                }
//            }//Fin de la Función	 
//            //Llamamos a la función y le pasamos el nombre de nuestro directorio.
//            listFiles("/");
            
            $file_list = ftp_nlist($conn_id, "public_html/");
            foreach ($file_list as $file)
            {
                if($file != '.' && $file != '..'){
                    $ruta_archivo = "public_html/".$file;
                    echo "<br><a href=''>Archivo: $file</a>";
                }
            }

            // Cerrar la conexión
            ftp_close($conn_id);
        ?>
        <script>
            
        
        
        
        </script>
    </body>
</html>
<?php } else { include 'vistas/formLogin.php'; } ?>
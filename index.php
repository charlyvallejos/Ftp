<?php
    require 'config/config.php';
    $usuario = new Usuario();
    if($usuario->autenticar())
    {
?>
<html ng-app="appLogin">
    <head>
        <meta charset="UTF-8">
        <title>Facturas</title>
        <link rel="stylesheet" type="text/css" href="css/estilos.css"/>
        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="js/jquery-ui.js"></script>  
        <script src="js/angular.min.js"></script>
        <script src="js/login.js"></script> 
        <script src="https://code.angularjs.org/1.3.0-rc.2/angular-messages.js"></script>
        <script>
            var codUsuario = "<?php echo $_SESSION['Codigo_Vendedor'] ?>";
            console.log(codUsuario);
        </script>    
    </head>
    <body ng-controller="loginController">
        <div>
            <a href="" ng-click="logout()" class="cerrarS">Cerrar Sesión</a>
        </div>
        <?php
            $codUsuario = $_SESSION['Codigo_Vendedor'];
            $local_file = './descargas/archivo.txt'; //Nombre archivo en nuestro PC
            

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
            
            $file_list = ftp_nlist($conn_id, "public_html/descargas");
            foreach ($file_list as $file)
            {
                $fileSubtr = substr($file,0,1);
                if($fileSubtr != '.'){
                    $array = explode("_", $file);   
                    $mesNum = $array[1];
                    
                    switch($mesNum){
                        case 1: $mesNom = 'Enero';
                            break;
                        case 2: $menNom = 'Febrero';
                            break;
                        case 3: $mesNom = 'Marzo';
                            break;
                        case 4: $mesNom = 'Abril';
                            break;
                        case 5: $mesNom = 'Mayo';
                            break;
                        case 6: $mesNom = 'Junio';
                            break;
                        case 7: $mesNom = 'Julio';
                            break;                        
                    }
                    if($array[0] == $codUsuario){
                        $ruta_archivo = "loadData.php?archivo=".$file;
                        echo "<br><h3>$mesNom:</h3>&nbsp;<a href='descargas/$file' download='$file' file='$file' class='descargas'> $file</a>";
                    }
                }
            }

            // Cerrar la conexión
            ftp_close($conn_id);
        ?>
        <script>
            $(document).ready(function(){
                $('a').on('click', function(e){
//                    var file = $(this).attr('file');
//                    e.preventDefault();
//                    console.log(file);
                    <?php
//                        $files = "document.writeln(file);";
//                        $prueba = $files;
//                        $server_file = 'public_html/'.$files; //Nombre archivo en FTP
//                        if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
//                            ?>//alert("Se descargado el archivo con éxito");<?php
//                        } else {
//                            ?>//alert("Ha ocurrido un error");<?php
//                        }                                                
                    ?>
        
                });
            });
        
        
        
        </script>
    </body>
</html>
<?php } else { include 'vistas/formLogin.php'; } ?>
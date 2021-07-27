<?php
    require 'config/config.php';
    $usuario = new Usuario();
    //$usuario->agregarUsuario();
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
        
    </body>
</html>
<?php } else { include 'vistas/formLogin.php'; } ?>
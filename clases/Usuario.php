<?php

class Usuario
{
    private $Id_Usuario;
    private $Nombre_Vendedor;
    private $Codigo_Vendedor;
    private $Usuario_Login;
    private $Clave;

    public function login(){
        $sql = "SELECT Nombre_Vendedor, Codigo_Vendedor FROM usuarios WHERE Usuario_Login = :Usuario_Login AND Clave = :Clave";
        $conexion = Conexion::conectar();
        $query = $conexion->prepare($sql);
        $ok = array("ok" => 'false');
        if(isset($_POST))
        {
            $usuLogin = $_POST['Usuario_Login'];
            $usuClave = $_POST['Clave'];

            $usuClave = base64_encode($usuClave);
            $usuClave = sha1($usuClave);

            $query->bindParam(':Usuario_Login',$usuLogin,PDO::PARAM_STR);
            $query->bindParam(':Clave',$usuClave,PDO::PARAM_STR);

            $query->execute();
            if($query->rowCount() > 0)
            { 
                $resultado = $query->fetch(PDO::FETCH_ASSOC);
                $_SESSION['logueado'] = 1;
                $_SESSION['Nombre_Vendedor'] = $resultado['Nombre_Vendedor'];
                $_SESSION['Codigo_Vendedor'] = $resultado['Codigo_Vendedor'];
                $ok = array("ok" => true);
            }

            return json_encode($ok);
        }
        else
            return json_encode($ok);
    }
    public function autenticar(){
        if(isset($_SESSION['logueado']))
            return false;
        else
            return true;
    }

    public function logout(){
        session_unset();
        session_destroy();
    }
    public function Igual_User(){
        $sql = "SELECT Nombre_Vendedor, Codigo_Vendedor FROM usuarios WHERE Usuario_Login = :Usuario_Login AND Clave = :Clave";
        $conexion = Conexion::conectar();
        $query = $conexion->prepare($sql);
        $ok = array('logueado' => 'false');
        if(isset($_POST)) {

            $usuLogin = $_POST['Usuario_Login'];
            $usuClave = $_POST['Clave'];

            $usuClave = base64_encode($usuClave);
            $usuClave = sha1($usuClave);

            $query->bindParam(':Usuario_Login',$usuLogin,PDO::PARAM_STR);
            $query->bindParam(':Clave',$usuClave,PDO::PARAM_STR);

            $query->execute();
            if($query->rowCount() > 0)
                return true;
            else
                return false;
        }
        else
            return false;
    }
    public function modificarClave(){
        if(isset($_POST)) {

            $usuLogin = $_POST['Usuario_Login'];
            $usuClave = $_POST['Clave'];

            $usuClave = base64_encode($usuClave);
            $usuClave = sha1($usuClave);

            $sql = "UPDATE usuarios SET Clave = :Clave WHERE Usuario_Login = :Usuario_Login";
            $conexion = Conexion::conectar();
            $query = $conexion->prepare($sql);

            $query->bindParam(':Usuario_Login',$usuLogin,PDO::PARAM_STR);
            $query->bindParam(':Clave',$usuClave,PDO::PARAM_STR);

            return $query->execute() > 0 ? true : false;
        }
        else
            return false;
    }
}
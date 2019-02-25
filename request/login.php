<?php

    require_once "../utility/ConexionBD.php";
    require_once "../models/loginModel.php";
    require_once "../controllers/loginController.php";

    /**
    * clase encargada de recibir, procesar y dar respuesta a los datos enviado por la aplicación en la tabla login
    */

    class login 
    {
        public function __construct() {

        }

        /**
        * Metodo encargado de procesar la petición por post y ejecutar un metodo asociado a la petición
        * @param peticion
        */
        public static function post($peticion) 
        {
            //procesa función post
            if ($peticion == 'login')
                return self::login();
            else
                return json_encode(["estado" => 0, "mensaje" => "Url mal formada"]);
        }

        /**
        * Metodo encargado de validar el usuario
        */
        public static function login()
        {
            $loginModel = new loginModel();

            $loginModel->correo = $_POST["correo"];
            $loginModel->password = $_POST["password"];
            $loginModel->perfil = $_POST["perfil"];

            $resultado = loginController::login($loginModel);

            if ($resultado != null) {

                //if (password_verify($loginModel->password, $resultado["password"])) {
                    session_start();
                    
                    $_SESSION['log_user'] = $resultado[0]["id"];
                    $_SESSION['nombre'] = $resultado[0]["nombre"];
                    $_SESSION['correo'] = $_POST["correo"];
                    $_SESSION['perfil'] = $_POST["perfil"];

                    return json_encode(["estado" => 1]);
                /*} else {
                    return json_encode(["estado" => 0, "mensaje" => "Error al iniciar sesión, por favor verifique su login o contraseña"]);    
                }*/
            } else 
                return json_encode(["estado" => 0, "mensaje" => "Error al iniciar sesión, por favor verifique su login o contraseña"]);
        }
    }

    //Llammado de clase

    $login = new login();
    $action = $_POST['action'];
    
    echo $login::post($action);
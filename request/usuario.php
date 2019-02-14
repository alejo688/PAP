<?php

    require_once "../utility/ConexionBD.php";
    require_once "../models/usuarioModel.php";
    require_once "../controllers/usuarioController.php";

    /**
    * clase encargada de recibir, procesar y dar respuesta a los datos enviado por la aplicación en la tabla usuario
    */

    class usuario 
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
            if ($peticion == 'create')
                return self::create();
            else if ($peticion == 'update')
                return self::update();
            else if ($peticion == 'read')
                return self::read();
            else if ($peticion == 'getById')
                return self::getById();
            else if ($peticion == 'delete')
                return self::delete();
            else if ($peticion == 'login')
                return self::login();
            else
                return json_encode(["estado" => 0, "mensaje" => "Url mal formada"]);
        }

        /**
        * Metodo encargado de crear un registro en la tabla reg_inservible
        */
        public static function create() {
            $usuario = new usuario();
            $usuarioController = new usuarioController();    
            
            $usuario->nombre = (isset($_POST["nombre"])) ? $_POST["nombre"] : null;
            $usuario->username = (isset($_POST["username"])) ? $_POST["username"] : null;
            $usuario->password = (isset($_POST["password"])) ? password_hash($_POST["password"], PASSWORD_DEFAULT) : null;

            try {

                $usuario->pk_usuario_id = $usuarioController::create($usuario);
                return json_encode(["estado" => 1, "mensaje" => "Sincronización exitosa", "resultado" => $usuario]);

            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al sincronizar datos", "error" => $ex->getMessage()]);
            }
        }

        /**
        * Metodo encargado de actualizar un registro en la tabla reg_inservible
        */
        public static function update() {

            $usuario = new usuarioModel();
            $usuarioController = new usuarioController();
                    
            $usuario->id_usuarios = $_POST["id_usuarios"];
            $usuario->nombre = (isset($_POST["nombre"])) ? $_POST["nombre"] : null;
            $usuario->username = (isset($_POST["username"])) ? $_POST["username"] : null;
            $usuario->password = (isset($_POST["password"])) ? password_hash($_POST["password"], PASSWORD_DEFAULT) : null;
            $usuario->estado = (isset($_POST["estado"])) ? $_POST["estado"] : null;

            try {

                $usuarioController::update($usuario);
                return json_encode(["estado" => 1, "mensaje" => "Sincronización exitosa", "resultado" => $usuario]);

            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al sincronizar datos", "error" => $ex->getMessage()]);
			}
        }

        /**
        * Metodo encargado de consultar todos los registros en la tabla reg_inservible
        */
        public static function read() {

            $id = $_POST["id"];

            $usuarioController = new usuarioController();

            try {
                return json_encode(["estado" => 1, "resultado" => $usuarioController::read($id)]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}

        }

        /**
        * Metodo encargado de consultar un registro en la tabla reg_inservible a partir del id de un registro
        */
        public static function getById() {

            $id = $_POST["id"];

            $usuarioController = new usuarioController();

            try {
                return json_encode(["estado" => 1, "resultado" => $usuarioController::getById($id)]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}
        }

        /**
        * Metodo encargado de eliminar un registro en la tabla reg_inservible
        */
        public static function delete() {

            $id = $_POST["id"];

            $usuarioController = new usuarioController();

            try {

                $usuarioController::delete($id);

                return json_encode(["estado" => 1, "mensaje" => "Registro eliminado exitosamente"]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}
        }

        /**
        * Metodo encargado de validar el usuario y contraseña de un usuario
        */
        public static function login()
        {
            //$registrausuarioController = new registrausuarioController();
            $usuarioModel = new usuarioModel();

            $usuarioModel->username = $_POST["username"];
            $usuarioModel->password = $_POST["password"];

            $resultado = usuarioController::login($usuarioModel);

            if ($resultado != null) {

                //if (password_verify($usuarioModel->password, $resultado["password"])) {
                    session_start();
                    
                    $_SESSION['log_user'] = $resultado[0]["id_usuarios"];
                    $_SESSION['nombre'] = $resultado[0]["nombre"];
                    $_SESSION['username'] = $resultado[0]["username"];

                    return json_encode(["estado" => 1]);
                /*} else {
                    return json_encode(["estado" => 0, "mensaje" => "Error al iniciar sesión, por favor verifique su usuario o contraseña"]);    
                }*/
            } else 
                return json_encode(["estado" => 0, "mensaje" => "Error al iniciar sesión, por favor verifique su usuario o contraseña"]);
        }
    }

    //Llammado de clase

    $usuario = new usuario();
    $action = $_POST['action'];
    
    echo $usuario::post($action);
<?php

require_once '../utility/ConexionBD.php';
require_once "../models/filialModel.php";
require_once "../controllers/filialController.php";

/**
* clase encargada de recibir, procesar y dar respuesta a los datos enviado por la aplicación en la tabla filial
*/

class filial 
{
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
            else if ($peticion == 'readActive')
            return self::readActive();
        else if ($peticion == 'getById')
            return self::getById();
        else if ($peticion == 'delete')
            return self::delete();
        else
            return json_encode(["estado" => 0, "mensaje" => "Url mal formada"]);
    }

    /**
        * Metodo encargado de crear un registro en la tabla filial
        */
        public static function create() {
            
            $filial = new filial();
            $filialController = new filialController();    
            
            $filial->fk_ciudad_id = (isset($_POST['fk_ciudad_id'])) ? $_POST['fk_ciudad_id'] : null;
            $filial->nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
            $filial->direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : null;
            $filial->telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : null;

            try {

                $filial->pk_filial_id = $filialController::create($filial);
                return json_encode(["estado" => 1, "mensaje" => "Sincronización exitosa", "resultado" => $filial]);

            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al sincronizar datos", "error" => $ex->getMessage()]);
            }
        }

        /**
        * Metodo encargado de actualizar un registro en la tabla filial
        */
        public static function update() {

            $filial = new filialModel();
            $filialController = new filialController();
                    
            $filial->pk_filial_id = $_POST['pk_filial_id'];
            $filial->fk_ciudad_id = (isset($_POST['fk_ciudad_id'])) ? $_POST['fk_ciudad_id'] : null;
            $filial->nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
            $filial->direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : null;
            $filial->telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : null;
            $filial->estado = (isset($_POST['estado'])) ? $_POST['estado'] : null;

            try {

                $filialController::update($filial);
                return json_encode(["estado" => 1, "mensaje" => "Sincronización exitosa", "resultado" => $filial]);

            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al sincronizar datos", "error" => $ex->getMessage(), "resultado" => $filial]);
			}
        }

        /**
        * Metodo encargado de consultar todos los registros en la tabla filial
        */
        public static function read() {

            $filialController = new filialController();

            try {
                return json_encode(["estado" => 1, "resultado" => $filialController::read()]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}

        }

        /**
        * Metodo encargado de consultar todos los registros en la tabla filial
        */
        public static function readActive() {

            $filialController = new filialController();

            try {
                return json_encode(["estado" => 1, "resultado" => $filialController::readActive()]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}

        }

        /**
        * Metodo encargado de consultar un registro en la tabla filial a partir del id de un registro
        */
        public static function getById() {

            $id = $_POST['id'];

            $filialController = new filialController();

            try {
                return json_encode(["estado" => 1, "resultado" => $filialController::getById($id)]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}
        }

        /**
        * Metodo encargado de eliminar un registro en la tabla filial
        */
        public static function delete() {

            $id = $_POST['id'];

            $filialController = new filialController();

            try {

                $filialController::delete($id);

                return json_encode(["estado" => 1, "mensaje" => "Registro eliminado exitosamente"]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}
        }
}

//Llammado de clase

$filial = new filial();
$action = (isset($_POST['action']))? $_POST['action'] : $_GET['action'];

echo $filial::post($action);
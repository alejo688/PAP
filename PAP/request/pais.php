<?php

require_once '../utility/ConexionBD.php';
require_once "../models/paisModel.php";
require_once "../controllers/paisController.php";

/**
* clase encargada de recibir, procesar y dar respuesta a los datos enviado por la aplicación en la tabla pais
*/

class pais 
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
        * Metodo encargado de crear un registro en la tabla pais
        */
        public static function create() {
            
            $pais = new pais();
            $paisController = new paisController();    
            
            $pais->codigo = (isset($_POST['codigo'])) ? $_POST['codigo'] : null;
            $pais->nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;

            try {

                $pais->pk_pais_id = $paisController::create($pais);
                return json_encode(["estado" => 1, "mensaje" => "Sincronización exitosa", "resultado" => $pais]);

            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al sincronizar datos", "error" => $ex->getMessage()]);
            }
        }

        /**
        * Metodo encargado de actualizar un registro en la tabla pais
        */
        public static function update() {

            $pais = new paisModel();
            $paisController = new paisController();
                    
            $pais->pk_pais_id = $_POST['pk_pais_id'];
            $pais->codigo = (isset($_POST['codigo'])) ? $_POST['codigo'] : null;
            $pais->nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
            $pais->estado = (isset($_POST['estado'])) ? $_POST['estado'] : null;

            try {

                $paisController::update($pais);
                return json_encode(["estado" => 1, "mensaje" => "Sincronización exitosa", "resultado" => $pais]);

            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al sincronizar datos", "error" => $ex->getMessage()]);
			}
        }

        /**
        * Metodo encargado de consultar todos los registros en la tabla pais
        */
        public static function read() {

            $paisController = new paisController();

            try {
                return json_encode(["estado" => 1, "resultado" => $paisController::read()]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}

        }

        /**
        * Metodo encargado de consultar todos los registros en la tabla pais
        */
        public static function readActive() {

            $paisController = new paisController();

            try {
                return json_encode(["estado" => 1, "resultado" => $paisController::readActive()]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}

        }

        /**
        * Metodo encargado de consultar un registro en la tabla pais a partir del id de un registro
        */
        public static function getById() {

            $id = $_POST['id'];

            $paisController = new paisController();

            try {
                return json_encode(["estado" => 1, "resultado" => $paisController::getById($id)]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}
        }

        /**
        * Metodo encargado de eliminar un registro en la tabla pais
        */
        public static function delete() {

            $id = $_POST['id'];

            $paisController = new paisController();

            try {

                $paisController::delete($id);

                return json_encode(["estado" => 1, "mensaje" => "Registro eliminado exitosamente"]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}
        }
}

//Llammado de clase

$pais = new pais();
$action = (isset($_POST['action']))? $_POST['action'] : $_GET['action'];

echo $pais::post($action);
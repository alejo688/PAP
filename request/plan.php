<?php

require_once '../utility/ConexionBD.php';
require_once "../models/planModel.php";
require_once "../controllers/planController.php";

/**
* clase encargada de recibir, procesar y dar respuesta a los datos enviado por la aplicación en la tabla plan
*/

class plan 
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
        * Metodo encargado de crear un registro en la tabla plan
        */
        public static function create() {
            
            $planModel = new planModel ();
            $planController = new planController();    
            
            $planModel->nombre = $_POST['nombre'];
            $planModel->tipo = $_POST['tipo'];
            $planModel->inicial = $_POST['inicial'];
            $planModel->valor_total = $_POST['valor_total'];
            $planModel->saldo = (isset($_POST['saldo'])) ? $_POST['saldo'] : null;
            $planModel->cuotas = (isset($_POST['cuotas'])) ? $_POST['cuotas'] : null;
            $planModel->cuota_mensual = (isset($_POST['cuota_mensual'])) ? $_POST['cuota_mensual'] : null;

            try {

                $planController::create($planModel);
                return json_encode(["estado" => 1, "mensaje" => "Sincronización exitosa"]);

            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al sincronizar datos", "error" => $ex->getMessage()]);
            }
        }

        /**
        * Metodo encargado de actualizar un registro en la tabla plan
        */
        public static function update() {

            $planModel = new planModel();
            $planController = new planController();
                    
            $planModel->pk_plan_id = $_POST['pk_plan_id'];
            $planModel->nombre = $_POST['nombre'];
            $planModel->tipo = $_POST['tipo'];
            $planModel->inicial = $_POST['inicial'];
            $planModel->valor_total = $_POST['valor_total'];
            $planModel->saldo = (isset($_POST['saldo'])) ? $_POST['saldo'] : null;
            $planModel->cuotas = (isset($_POST['cuotas'])) ? $_POST['cuotas'] : null;
            $planModel->cuota_mensual = (isset($_POST['cuota_mensual'])) ? $_POST['cuota_mensual'] : null;
            $planModel->estado = $_POST['estado'];

            try {

                $planController::update($planModel);
                return json_encode(["estado" => 1, "mensaje" => "Sincronización exitosa"]);

            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al sincronizar datos", "error" => $ex->getMessage()]);
			}
        }

        /**
        * Metodo encargado de consultar todos los registros en la tabla plan
        */
        public static function read() {

            $planController = new planController();

            try {
                return json_encode(["estado" => 1, "resultado" => $planController::read()]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}

        }

        /**
        * Metodo encargado de consultar todos los registros en la tabla plan
        */
        public static function readActive() {

            $planController = new planController();

            try {
                return json_encode(["estado" => 1, "resultado" => $planController::readActive()]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}

        }

        /**
        * Metodo encargado de consultar un registro en la tabla plan a partir del id de un registro
        */
        public static function getById() {

            $id = $_POST['id'];

            $planController = new planController();

            try {
                return json_encode(["estado" => 1, "resultado" => $planController::getById($id)]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}
        }

        /**
        * Metodo encargado de eliminar un registro en la tabla plan
        */
        public static function delete() {

            $id = $_POST['id'];

            $planController = new planController();

            try {

                $planController::delete($id);

                return json_encode(["estado" => 1, "mensaje" => "Registro eliminado exitosamente"]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}
        }
}

//Llammado de clase

$plan = new plan();
$action = (isset($_POST['action']))? $_POST['action'] : $_GET['action'];

echo $plan::post($action);
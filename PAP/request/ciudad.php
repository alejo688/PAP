<?php

require_once '../utility/ConexionBD.php';
require_once "../models/ciudadModel.php";
require_once "../controllers/ciudadController.php";

/**
* clase encargada de recibir, procesar y dar respuesta a los datos enviado por la aplicación en la tabla ciudad
*/

class ciudad 
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
        else if ($peticion == 'getById')
            return self::getById();
        else if ($peticion == 'getByDepartamentoId')
            return self::getByDepartamentoId();
        else if ($peticion == 'delete')
            return self::delete();
        else
            return json_encode(["estado" => 0, "mensaje" => "Url mal formada"]);
    }

    /**
        * Metodo encargado de crear un registro en la tabla ciudad
        */
        public static function create() {
            
            $ciudad = new ciudad();
            $ciudadController = new ciudadController();    
            
            $ciudad->fk_departamento_id = (isset($_POST['fk_departamento_id'])) ? $_POST['fk_departamento_id'] : null;
            $ciudad->codigo = (isset($_POST['codigo'])) ? $_POST['codigo'] : null;
            $ciudad->nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;

            try {

                $ciudad->pk_ciudad_id = $ciudadController::create($ciudad);
                return json_encode(["estado" => 1, "mensaje" => "Sincronización exitosa", "resultado" => $ciudad]);

            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al sincronizar datos", "error" => $ex->getMessage()]);
            }
        }

        /**
        * Metodo encargado de actualizar un registro en la tabla ciudad
        */
        public static function update() {

            $ciudad = new ciudadModel();
            $ciudadController = new ciudadController();
                    
            $ciudad->pk_ciudad_id = $_POST['pk_ciudad_id'];
            $ciudad->fk_departamento_id = (isset($_POST['fk_departamento_id'])) ? $_POST['fk_departamento_id'] : null;
            $ciudad->codigo = (isset($_POST['codigo'])) ? $_POST['codigo'] : null;
            $ciudad->nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
            $ciudad->estado = (isset($_POST['estado'])) ? $_POST['estado'] : null;

            try {

                $ciudadController::update($ciudad);
                return json_encode(["estado" => 1, "mensaje" => "Sincronización exitosa", "resultado" => $ciudad]);

            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al sincronizar datos", "error" => $ex->getMessage()]);
			}
        }

        /**
        * Metodo encargado de consultar todos los registros en la tabla ciudad
        */
        public static function read() {

            $ciudadController = new ciudadController();

            try {
                return json_encode(["estado" => 1, "resultado" => $ciudadController::read()]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}

        }

        /**
        * Metodo encargado de consultar un registro en la tabla ciudad a partir del id de un registro
        */
        public static function getById() {
            $id = $_POST['id'];

            $ciudadController = new ciudadController();

            try {
                return json_encode(["estado" => 1, "resultado" => $ciudadController::getById($id)]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}
        }

        /**
        * Metodo encargado de consultar un registro en la tabla departamento a partir del fk_departamento_id de un registro
        */
        public static function getByDepartamentoId() {
            $id = $_POST['id'];

            $ciudadController = new ciudadController();

            try {
                return json_encode(["estado" => 1, "resultado" => $ciudadController::getByDepartamentoId($id)]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}
        }

        /**
        * Metodo encargado de eliminar un registro en la tabla ciudad
        */
        public static function delete() {
            $id = $_POST['id'];

            $ciudadController = new ciudadController();

            try {

                $ciudadController::delete($id);

                return json_encode(["estado" => 1, "mensaje" => "Registro eliminado exitosamente"]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}
        }
}

//Llammado de clase

$ciudad = new ciudad();
$action = (isset($_POST['action']))? $_POST['action'] : $_GET['action'];

echo $ciudad::post($action);
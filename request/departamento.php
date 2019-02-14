<?php

require_once '../utility/ConexionBD.php';
require_once "../models/departamentoModel.php";
require_once "../controllers/departamentoController.php";

/**
* clase encargada de recibir, procesar y dar respuesta a los datos enviado por la aplicación en la tabla departamento
*/

class departamento 
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
        else if ($peticion == 'getByPaisId')
            return self::getByPaisId();
        else if ($peticion == 'delete')
            return self::delete();
        else
            return json_encode(["estado" => 0, "mensaje" => "Url mal formada"]);
    }

    /**
        * Metodo encargado de crear un registro en la tabla departamento
        */
        public static function create() {
            
            $departamento = new departamento();
            $departamentoController = new departamentoController();    
            
            $departamento->fk_pais_id = (isset($_POST['fk_pais_id'])) ? $_POST['fk_pais_id'] : null;
            $departamento->codigo = (isset($_POST['codigo'])) ? $_POST['codigo'] : null;
            $departamento->nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;

            try {

                $departamento->pk_departamento_id = $departamentoController::create($departamento);
                return json_encode(["estado" => 1, "mensaje" => "Sincronización exitosa", "resultado" => $departamento]);

            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al sincronizar datos", "error" => $ex->getMessage()]);
            }
        }

        /**
        * Metodo encargado de actualizar un registro en la tabla departamento
        */
        public static function update() {

            $departamento = new departamentoModel();
            $departamentoController = new departamentoController();
                    
            $departamento->pk_departamento_id = $_POST['pk_departamento_id'];
            $departamento->fk_pais_id = (isset($_POST['fk_pais_id'])) ? $_POST['fk_pais_id'] : null;
            $departamento->codigo = (isset($_POST['codigo'])) ? $_POST['codigo'] : null;
            $departamento->nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : null;
            $departamento->estado = (isset($_POST['estado'])) ? $_POST['estado'] : null;

            try {

                $departamentoController::update($departamento);
                return json_encode(["estado" => 1, "mensaje" => "Sincronización exitosa", "resultado" => $departamento]);

            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al sincronizar datos", "error" => $ex->getMessage()]);
			}
        }

        /**
        * Metodo encargado de consultar todos los registros en la tabla departamento
        */
        public static function read() {
            $departamentoController = new departamentoController();

            try {
                return json_encode(["estado" => 1, "resultado" => $departamentoController::read()]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}

        }

        /**
        * Metodo encargado de consultar un registro en la tabla departamento a partir del id de un registro
        */
        public static function getById() {
            $id = $_POST['id'];

            $departamentoController = new departamentoController();

            try {
                return json_encode(["estado" => 1, "resultado" => $departamentoController::getById($id)]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage(), "id" => $id]);
			}
        }

        /**
        * Metodo encargado de consultar un registro en la tabla departamento a partir del fk_pais_id de un registro
        */
        public static function getByPaisId() {
            $id = $_POST['id'];

            $departamentoController = new departamentoController();

            try {
                return json_encode(["estado" => 1, "resultado" => $departamentoController::getByPaisId($id)]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}
        }

        /**
        * Metodo encargado de eliminar un registro en la tabla departamento
        */
        public static function delete() {
            $id = $_POST['id'];

            $departamentoController = new departamentoController();

            try {
                $departamentoController::delete($id);

                return json_encode(["estado" => 1, "mensaje" => "Registro eliminado exitosamente"]);
            } catch (Exception $ex) {
                return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
			}
        }
}

//Llammado de clase

$departamento = new departamento();
$action = (isset($_POST['action']))? $_POST['action'] : $_GET['action'];

echo $departamento::post($action);
<?php

require_once '../utility/ConexionBD.php';
require_once "../models/titularModel.php";
require_once "../models/estudianteModel.php";
require_once "../controllers/titularController.php";
require_once "../controllers/estudianteController.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../utility/PHPMailer/src/Exception.php';
require '../utility/PHPMailer/src/PHPMailer.php';
require '../utility/PHPMailer/src/SMTP.php';

/**
* clase encargada de recibir, procesar y dar respuesta a los datos enviado por la aplicación en la tabla titular
*/

class titular 
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
        else if ($peticion == 'readEstudiante')
            return self::readEstudiante();
        else if ($peticion == 'getById')
            return self::getById();
        else if ($peticion == 'delete')
            return self::delete();
        else
            return json_encode(["estado" => 0, "mensaje" => "Url mal formada"]);
    }

    /**
    * Metodo encargado de crear un registro en la tabla titular
    */
    public static function create() {
        
        $titularModel = new titularModel();
        $titularController = new titularController();    
        
        $titularModel->fk_ciudad_id = $_POST['fk_ciudad_id'];
        $titularModel->fk_filial_id = $_POST['fk_filial_id'];
        $titularModel->nombre = $_POST['nombre'];
        $titularModel->tipo_documento = $_POST['tipo_documento'];
        $titularModel->documento = $_POST['documento'];
        $titularModel->numero_matricula = $_POST['numero_matricula'];
        $titularModel->fecha_matricula = $_POST['fecha_matricula'];
        $titularModel->direccion_casa = $_POST['direccion_casa'];
        $titularModel->direccion_trabajo = $_POST['direccion_trabajo'];
        $titularModel->telefono_fijo1 = $_POST['telefono_fijo1'];
        $titularModel->telefono_fijo2 = (isset($_POST['telefono_fijo2'])) ? $_POST['telefono_fijo2'] : null;
        $titularModel->celular1 = $_POST['celular1'];
        $titularModel->celular2 = (isset($_POST['celular2'])) ? $_POST['celular2'] : null;
        $titularModel->correo_electronico = $_POST['correo_electronico'];
        $titularModel->ciclos = $_POST['ciclos'];
        $titularModel->ciclos_obsequio = $_POST['ciclos_obsequio'];
        $titularModel->cobranza = $_POST['cobranza'];
        $titularModel->descuento = $_POST['descuento'];
        $titularModel->razondesc = (isset($_POST['razondesc'])) ? $_POST['razondesc'] : null;
        $titularModel->fecha_pago_inicial = $_POST['fecha_pago_inicial'];
        $titularModel->saldo = $_POST['saldo'];
        $titularModel->numero_mensualidades = $_POST['numero_mensualidades'];
        $titularModel->valor = $_POST['valor'];
        $titularModel->fuente_matricula = $_POST['fuente_matricula'];
        $titularModel->jornada = $_POST['jornada'];
        $titularModel->genero = $_POST['genero'];
        $titularModel->otro_genero = (isset($_POST['otro_genero'])) ? $_POST['otro_genero'] : null;
        $titularModel->estado_civil = $_POST['estado_civil'];
        $titularModel->fecha_nacimiento = $_POST['fecha_nacimiento'];
        $titularModel->fk_ciudad_origen_id = $_POST['fk_ciudad_origen_id'];
        $titularModel->estudiante = $_POST['estudiante'];

        try {

            $result = $titularController::create($titularModel);

            if ($_POST['estudiante'] == true && $result["id_repuesta"] == 1) {

                $titularModel->pk_titular_id = $result["pk_titular_id"];

                $estudianteModel = new estudianteModel();
                $estudianteController = new estudianteController();
                
                $estudianteModel->nombre = $_POST['nombre'];
                $estudianteModel->tipo_documento = $_POST['tipo_documento'];
                $estudianteModel->documento = $_POST['documento'];
                $estudianteModel->direccion_casa = $_POST['direccion_casa'];
                $estudianteModel->direccion_trabajo = $_POST['direccion_trabajo'];
                $estudianteModel->telefono_fijo1 = $_POST['telefono_fijo1'];
                $estudianteModel->telefono_fijo2 = (isset($_POST['telefono_fijo2'])) ? $_POST['telefono_fijo2'] : null;
                $estudianteModel->celular1 = $_POST['celular1'];
                $estudianteModel->celular2 = (isset($_POST['celular2'])) ? $_POST['celular2'] : null;
                $estudianteModel->correo_electronico = $_POST['correo_electronico'];
                $estudianteModel->password = $_POST['documento'];
                $estudianteModel->fk_ciudad_id = $_POST['fk_ciudad_id'];
                $estudianteModel->fk_filial_id = $_POST['fk_filial_id'];
                $estudianteModel->fk_titular_id = $titularModel->pk_titular_id;

                try {

                    $resultEst = $estudianteController::create($estudianteModel);

                    /*$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                    try {
                        //Server settings
                        $mail = new PHPMailer(); // create a new object
                        $mail->IsSMTP(); // enable SMTP
                        //$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                        $mail->SMTPAuth = true; // authentication enabled
                        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
                        $mail->Host = "smtp.gmail.com";
                        $mail->Port = 465; // or 587
                        $mail->IsHTML(true);
                        $mail->Username = "contactenos.fibra.flex@gmail.com";
                        $mail->Password = "Fibra#2019";                               // TCP port to connect to

                        //Recipients
                        $mail->setFrom('contactenos.fibra.flex@gmail.com');
                        $mail->addAddress($_POST['correo_electronico'], $_POST['nombre']);     // Add a recipient

                        //Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = 'Bienvenido a passport';
                        $mail->Body    = 'Bienvenido <b>'. $_POST['nombre'] .'</b> a passport<br/> Tu contraseña de acceso es tu número de documento';

                        $mail->send();
                        $log_mail = 'Message has been sent';
                    } catch (Exception $e) {
                        $log_mail = 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
                    }*/

                    if ($resultEst["id_repuesta"] == 1) {
                        return json_encode(["estado" => 1, "mensaje" => $resultEst["repuesta"]]);
                    } else {
                        return json_encode(["estado" => 0, "mensaje" => $resultEst["repuesta"]]);
                    }
    
                } catch (Exception $ex) {
                    return json_encode(["estado" => 0, "mensaje" => "Error al sincronizar datos", "error" => $ex->getMessage()]);
                }

            } else if ($result["id_repuesta"] == 1) {
                return json_encode(["estado" => 1, "mensaje" => $result["repuesta"]]);
            } else {
                return json_encode(["estado" => 0, "mensaje" => $result["repuesta"]]);
            }

        } catch (Exception $ex) {
            return json_encode(["estado" => 0, "mensaje" => "Error al sincronizar datos", "error" => $ex->getMessage()]);
        }
    }

    /**
    * Metodo encargado de actualizar un registro en la tabla titular
    */
    public static function update() {

        $titularModel = new titularModel();
        $titularController = new titularController();
                
        $titularModel->pk_titular_id = $data->pk_titular_id;
        $titularModel->fk_ciudad_id = $_POST['fk_ciudad_id'];
        $titularModel->fk_filial_id = $_POST['fk_filial_id'];
        $titularModel->nombre = $_POST['nombre'];
        $titularModel->tipo_documento = $_POST['tipo_documento'];
        $titularModel->documento = $_POST['documento'];
        $titularModel->numero_matricula = $_POST['numero_matricula'];
        $titularModel->fecha_matricula = $_POST['fecha_matricula'];
        $titularModel->direccion_casa = $_POST['direccion_casa'];
        $titularModel->direccion_trabajo = $_POST['direccion_trabajo'];
        $titularModel->telefono_fijo1 = $_POST['telefono_fijo1'];
        $titularModel->telefono_fijo2 = (isset($_POST['telefono_fijo2'])) ? $_POST['telefono_fijo2'] : null;
        $titularModel->celular1 = $_POST['celular1'];
        $titularModel->celular2 = (isset($_POST['celular2'])) ? $_POST['celular2'] : null;
        $titularModel->correo_electronico = $_POST['correo_electronico'];
        $titularModel->ciclos = $_POST['ciclos'];
        $titularModel->ciclos_obsequio = $_POST['ciclos_obsequio'];
        $titularModel->cobranza = $_POST['cobranza'];
        $titularModel->descuento = $_POST['descuento'];
        $titularModel->razondesc = (isset($_POST['razondesc'])) ? $_POST['razondesc'] : null;
        $titularModel->fecha_pago_inicial = $_POST['fecha_pago_inicial'];
        $titularModel->saldo = $_POST['saldo'];
        $titularModel->numero_mensualidades = $_POST['numero_mensualidades'];
        $titularModel->valor = $_POST['valor'];
        $titularModel->fuente_matricula = $_POST['fuente_matricula'];
        $titularModel->jornada = $_POST['jornada'];
        $titularModel->genero = $_POST['genero'];
        $titularModel->otro_genero = (isset($_POST['otro_genero'])) ? $_POST['otro_genero'] : null;
        $titularModel->estado_civil = $_POST['estado_civil'];
        $titularModel->fecha_nacimiento = $_POST['fecha_nacimiento'];
        $titularModel->fk_ciudad_origen_id = $_POST['fk_ciudad_origen_id'];
        $titularModel->estudiante = $_POST['estudiante'];

        try {

            $titularController::update($titularModel);
            return json_encode(["estado" => 1, "mensaje" => "Sincronización exitosa"]);

        } catch (Exception $ex) {
            return json_encode(["estado" => 0, "mensaje" => "Error al sincronizar datos", "error" => $ex->getMessage()]);
		}
    }

    /**
    * Metodo encargado de consultar todos los registros en la tabla titular
    */
    public static function readEstudiante() {

        $titularController = new titularController();

        try {
            return json_encode(["estado" => 1, "resultado" => $titularController::readEstudiante()]);
        } catch (Exception $ex) {
            return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
		}

    }

    /**
    * Metodo encargado de consultar todos los registros en la tabla titular
    */
    public static function read() {

        $titularController = new titularController();

        try {
            return json_encode(["estado" => 1, "resultado" => $titularController::read()]);
        } catch (Exception $ex) {
            return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
		}

    }

    /**
    * Metodo encargado de consultar un registro en la tabla titular a partir del id de un registro
    */
    public static function getById() {

        $id = $_POST['id'];

        $titularController = new titularController();

        try {
            return json_encode(["estado" => 1, "resultado" => $titularController::getById($id)]);
        } catch (Exception $ex) {
            return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
		}
    }

    /**
    * Metodo encargado de eliminar un registro en la tabla titular
    */
    public static function delete() {

        $id = $_POST['id'];

        $titularController = new titularController();

        try {

            $titularController::delete($id);

            return json_encode(["estado" => 1, "mensaje" => "Registro eliminado exitosamente"]);
        } catch (Exception $ex) {
            return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
		}
    }
}

//Llammado de clase

    $titular = new titular();
    $action = (isset($_POST['action']))? $_POST['action'] : $_GET['action'];
    
    echo $titular::post($action);
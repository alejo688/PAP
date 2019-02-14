<?php

require_once '../utility/ConexionBD.php';
require_once "../models/estudianteModel.php";
require_once "../controllers/estudianteController.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../utility/PHPMailer/src/Exception.php';
require '../utility/PHPMailer/src/PHPMailer.php';
require '../utility/PHPMailer/src/SMTP.php';

/**
* clase encargada de recibir, procesar y dar respuesta a los datos enviado por la aplicación en la tabla estudiante
*/

class estudiante 
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
        else if ($peticion == 'delete')
            return self::delete();
        else
            return json_encode(["estado" => 0, "mensaje" => "Url mal formada"]);
    }

    /**
    * Metodo encargado de crear un registro en la tabla estudiante
    */
    public static function create() {
        
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
        $estudianteModel->correo_electronico = $_POST['correo_electronico'];
        $estudianteModel->password = $_POST['documento'];
        $estudianteModel->fk_ciudad_id = $_POST['fk_ciudad_id'];
        $estudianteModel->fk_filial_id = $_POST['fk_filial_id'];
        $estudianteModel->fk_titular_id = $_POST['fk_titular_id'];
        $estudianteModel->fk_plan_id = $_POST['fk_plan_id'];

        try {

            $estudianteController::create($estudianteModel);

            $mail = new PHPMailer(true); // Passing `true` enables exceptions
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
                $mail->Password = "Fibra#2019";  // TCP port to connect to

                //Recipients
                $mail->setFrom('contactenos.fibra.flex@gmail.com');
                $mail->addAddress($_POST['correo_electronico'], $_POST['nombre']);  // Add a recipient

                //Content
                $mail->isHTML(true);     // Set email format to HTML
                $mail->Subject = 'Bienvenido a passport';
                $mail->Body    = 'Bienvenido <b>'. $_POST['nombre'] .'</b> a passport<br/> Tu contraseña de acceso es tu número de documento';

                $mail->send();
                $log_mail = 'Message has been sent';
            } catch (Exception $e) {
                $log_mail = 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
            }
                    
            return json_encode(["estado" => 1, "mensaje" => "Sincronización exitosa", "logMail" => $log_mail]);

        } catch (Exception $ex) {
            return json_encode(["estado" => 0, "mensaje" => "Error al sincronizar datos", "error" => $ex->getMessage()]);
        }
    }

    /**
    * Metodo encargado de actualizar un registro en la tabla estudiante
    */
    public static function update() {

        $estudianteModel = new estudianteModel();
        $estudianteController = new estudianteController();
                
        $estudianteModel->pk_estudiante_id = $_POST['pk_estudiante_id'];
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
        $estudianteModel->estado = $_POST['estado'];
        $estudianteModel->fk_ciudad_id = $_POST['fk_ciudad_id'];
        $estudianteModel->fk_filial_id = $_POST['fk_filial_id'];
        $estudianteModel->fk_titular_id = $_POST['fk_titular_id'];
        $estudianteModel->fk_plan_id = $_POST['fk_plan_id'];

        try {

            $estudianteController::update($estudianteModel);
            return json_encode(["estado" => 1, "mensaje" => "Sincronización exitosa"]);

        } catch (Exception $ex) {
            return json_encode(["estado" => 0, "mensaje" => "Error al sincronizar datos", "error" => $ex->getMessage(), "resultado" => $estudiante]);
		}
    }

    /**
    * Metodo encargado de consultar todos los registros en la tabla estudiante
    */
    public static function read() {

        $estudianteController = new estudianteController();

        try {
            return json_encode(["estado" => 1, "resultado" => $estudianteController::read()]);
        } catch (Exception $ex) {
            return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
		}

    }

    /**
    * Metodo encargado de consultar un registro en la tabla estudiante a partir del id de un registro
    */
    public static function getById() {

        $id = $_POST['id'];

        $estudianteController = new estudianteController();

        try {
            return json_encode(["estado" => 1, "resultado" => $estudianteController::getById($id)]);
        } catch (Exception $ex) {
            return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
		}
    }

    /**
    * Metodo encargado de eliminar un registro en la tabla estudiante
    */
    public static function delete() {

        $id = $_POST['id'];

        $estudianteController = new estudianteController();

        try {

            $estudianteController::delete($id);

            return json_encode(["estado" => 1, "mensaje" => "Registro eliminado exitosamente"]);
        } catch (Exception $ex) {
            return json_encode(["estado" => 0, "mensaje" => "Error al enviar datos", "error" => $ex->getMessage()]);
		}
    }
}

//Llammado de clase

$estudiante = new estudiante();
$action = (isset($_POST['action']))? $_POST['action'] : $_GET['action'];

echo $estudiante::post($action);
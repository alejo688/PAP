<?php
    /**
    * clase encargada de manejar los eventos login y logout
    */

    class loginController {

        public function __construct() {
        }

        /**
        * Metodo encargado de la autenticación del login
        * @param login
        */
        public static function login($login) {
            $consulta = 'CALL passport.Login(?, ?, ?);';
		    
            /* Ejecución de la consulta */	
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
		    $comando->execute(
                array(
                    $login->correo,
                    $login->password,
                    $login->perfil
                )
            );

            if ($comando->rowCount() > 0)
                $result = $comando->fetchAll(PDO::FETCH_ASSOC);
            else
                $result = null;

            $comando->closeCursor();

            return $result;
        }

        /**
        * Metodo encargado de la destruir la session
        */
        public static function logout() {
		    session_destroy();
        }
        
    }
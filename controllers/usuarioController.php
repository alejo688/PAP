<?php
    /**
    * clase encargada de manejar los eventos CRUD de la tabla usuario
    */

    class usuarioController {

        public function __construct() {
        }

        /**
        * Metodo encargado de crear un registro en base de datos
        * @param usuario
        */
        public static function create($usuario) {
            /* Consulta SP */
		    $consulta = 'CALL passport.Creacion_Usuario(?, ?, ?)';
            
            /* Ejecución de la consulta */
            $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute(
                array(
                    $usuario->nombre,
                    $usuario->username,
                    $usuario->password
                )
            );

            $comando->closeCursor();
        }

        /**
        * Metodo encargado de actualizar un registro en base de datos
        * @param usuario
        */
        public static function update($usuario) {
            /* Consulta SP */
		    $consulta = 'CALL passport.Modificacion_Usuario(?, ?, ?, ?, ?)';
            
		    /* Ejecución de la consulta */
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
		    $comando->execute(array(
                $usuario->id_usuarios,
                $usuario->nombre,
                $usuario->username,
                $usuario->password,
                $usuario->estado
            ));

            $comando->closeCursor();
        }

        /**
        * Metodo encargado de retorna todos los registros de la tabla
        */
        public static function read() {
            $consulta = 'CALL passport.Listado_Usuario()';

            /* Ejecución de la consulta */	
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
		    $comando->execute();
        
		    if ($comando->rowCount() > 0)
                $result = $comando->fetchAll(PDO::FETCH_ASSOC);
            else
                $result = null;

            $comando->closeCursor();

            return $result;
        }

        /**
        * Metodo encargado de retorna un registro filtrado por el campo id_usuarios
        * @param id
        */
        public static function getById($id) {
            $consulta = 'CALL passport.Usuario_por_id(?);';
		    
            /* Ejecución de la consulta */	
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute(array($id));
        
		    if ($comando->rowCount() > 0)
                $result = $comando->fetchAll(PDO::FETCH_ASSOC);
            else
                $result = null;

            $comando->closeCursor();

            return $result;
        }

        /**
        * Metodo encargado de eliminar un registro filtrado por el campo id_usuarios
        * @param id
        */
        public static function delete($id) {
		    $consulta = 'CALL passport.Eliminacion_Usuario(?);';
		    
            /* Ejecución de la consulta */	
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute(array($id));
            $comando->closeCursor();
        }

        /**
        * Metodo encargado de la autenticación del usuario
        * @param usuario
        */
        public static function login($usuario) {
		    $consulta = 'CALL passport.Login(?, ?);';
		    
            /* Ejecución de la consulta */	
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
		    $comando->execute(
                array(
                    $usuario->username,
                    $usuario->password
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
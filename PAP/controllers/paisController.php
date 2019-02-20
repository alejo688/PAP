<?php
    /**
    * clase encargada de manejar los eventos CRUD de la tabla pais
    */

    class paisController {

        public function __construct() {
        }

        /**
        * Metodo encargado de crear un registro en base de datos
        * @param pais
        */
        public static function create($pais) {
            /* Consulta SP */
		    $consulta = 'CALL passport.Creacion_Pais(?, ?)';
            
            /* Ejecución de la consulta */
            $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute(
                array(
                    $pais->codigo,
                    $pais->nombre
                )
            );

            $comando->closeCursor();
        }

        /**
        * Metodo encargado de actualizar un registro en base de datos
        * @param pais
        */
        public static function update($pais) {
            /* Consulta SP */
		    $consulta = 'CALL passport.Modificacion_Pais(?, ?, ?, ?)';
            
		    /* Ejecución de la consulta */
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
		    $comando->execute(array(
                $pais->pk_pais_id,
                $pais->codigo,
                $pais->nombre,
                $pais->estado
            ));

            $comando->closeCursor();
        }

        /**
        * Metodo encargado de retorna todos los registros de la tabla
        */
        public static function read() {
            $consulta = 'CALL passport.Listado_Pais()';

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
        * Metodo encargado de retorna todos los registros de la tabla que se encuentre en estado activo
        */
        public static function readActive() {
            $consulta = 'CALL passport.Listado_Pais_Activo()';

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
        * Metodo encargado de retorna un registro filtrado por el campo pk_pais_id
        * @param id
        */
        public static function getById($id) {
            //$consulta = 'CALL passport.Pais_por_id(?);';
            $consulta = 'SELECT * FROM pais WHERE pk_pais_id = ?;';
                    
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
        * Metodo encargado de eliminar un registro filtrado por el campo pk_pais_id
        * @param id
        */
        public static function delete($id) {
		    $consulta = 'CALL passport.Eliminacion_Pais(?);';
		    
            /* Ejecución de la consulta */	
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute(array($id));
            $comando->closeCursor();
        }
        
    }
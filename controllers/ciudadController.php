<?php
    /**
    * clase encargada de manejar los eventos CRUD de la tabla ciudad
    */

    class ciudadController {

        public function __construct() {
        }

        /**
        * Metodo encargado de crear un registro en base de datos
        * @param ciudad
        */
        public static function create($ciudad) {
            /* Consulta SP */
		    $consulta = 'CALL passport.Creacion_Ciudad(?, ?, ?)';
            
            /* Ejecución de la consulta */
            $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute(
                array(
                    $ciudad->fk_departamento_id,
                    $ciudad->codigo,
                    $ciudad->nombre
                )
            );
            $comando->closeCursor();
        }

        /**
        * Metodo encargado de actualizar un registro en base de datos
        * @param ciudad
        */
        public static function update($ciudad) {
            /* Consulta SP */
		    $consulta = 'CALL passport.Modificacion_Ciudad(?, ?, ?, ?, ?)';
            
		    /* Ejecución de la consulta */
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
		    $comando->execute(array(
                $ciudad->pk_ciudad_id,
                $ciudad->fk_departamento_id,
                $ciudad->codigo,
                $ciudad->nombre,
                $ciudad->estado
            ));
            $comando->closeCursor();
        }

        /**
        * Metodo encargado de retorna todos los registros de la tabla
        */
        public static function read() {
            $consulta = 'CALL passport.Listado_Ciudad()';

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
        * Metodo encargado de retorna un registro filtrado por el campo pk_ciudad_id
        * @param id
        */
        public static function getById($id) {
            //$consulta = 'CALL passport.Ciudad_por_id(?);';
            $consulta = 'SELECT d.fk_pais_id,
                            c.fk_departamento_id,
                            c.codigo,
                            c.nombre,
                            c.estado
                        FROM ciudad c
                        INNER JOIN departamento d ON c.fk_departamento_id = d.pk_departamento_id
                        AND c.pk_ciudad_id = ?';
		    
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
        * Metodo encargado de retorna todos los registros de la tabla departamento por el campo fk_departamento_id
        * @param id
        */
        public static function getByDepartamentoId($id) {
            $consulta = 'SELECT pk_ciudad_id,
                            codigo,
                            nombre
                        FROM passport.ciudad
                        WHERE estado = 1
                        AND fk_departamento_id = ?';
		    
            /* Ejecución de la consulta */	
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute(array($id));
            $comando->execute();

            if ($comando->rowCount() > 0)
                $result = $comando->fetchAll(PDO::FETCH_ASSOC);
            else
                $result = null;

            $comando->closeCursor();

            return $result;
        }

        /**
        * Metodo encargado de eliminar un registro filtrado por el campo pk_ciudad_id
        * @param id
        */
        public static function delete($id) {
		    $consulta = 'CALL passport.Eliminacion_Ciudad(?);';
		    
            /* Ejecución de la consulta */	
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute(array($id));
            $comando->closeCursor();
        }
        
    }
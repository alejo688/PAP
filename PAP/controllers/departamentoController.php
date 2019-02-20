<?php
    /**
    * clase encargada de manejar los eventos CRUD de la tabla departamento
    */

    class departamentoController {

        public function __construct() {
        }

        /**
        * Metodo encargado de crear un registro en base de datos
        * @param departamento
        */
        public static function create($departamento) {
            /* Consulta SP */
		    $consulta = 'CALL passport.Creacion_Departamento(?, ?, ?)';
            
            /* Ejecución de la consulta */
            $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute(
                array(
                    $departamento->fk_pais_id,
                    $departamento->codigo,
                    $departamento->nombre
                )
            );
            $comando->closeCursor();
        }

        /**
        * Metodo encargado de actualizar un registro en base de datos
        * @param departamento
        */
        public static function update($departamento) {
            /* Consulta SP */
		    $consulta = 'CALL passport.Modificacion_Departamento(?, ?, ?, ?, ?)';
            
		    /* Ejecución de la consulta */
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
		    $comando->execute(array(
                $departamento->pk_departamento_id,
                $departamento->fk_pais_id,
                $departamento->codigo,
                $departamento->nombre,
                $departamento->estado
            ));
            $comando->closeCursor();
        }

        /**
        * Metodo encargado de retorna todos los registros de la tabla departamento
        */
        public static function read() {
            $consulta = 'CALL passport.Listado_Departamento()';

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
        * Metodo encargado de retorna todos los registros de la tabla departamento por el campo fk_pais_id
        * @param id
        */
        public static function getByPaisId($id) {
            $consulta = 'SELECT pk_departamento_id,
                codigo,
                nombre
            FROM departamento
            WHERE estado = 1
            AND fk_pais_id =?';
		    
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
        * Metodo encargado de retorna un registro filtrado por el campo pk_departamento_id
        * @param id
        */
        public static function getById($id) {
            //$consulta = 'CALL passport.Departamento_por_id(?);';
            $consulta = 'SELECT fk_pais_id,
                            codigo,
                            nombre,
                            estado
                        FROM departamento
                        WHERE pk_departamento_id = ?';
		    
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
        * Metodo encargado de eliminar un registro filtrado por el campo pk_departamento_id
        * @param id
        */
        public static function delete($id) {
		    $consulta = 'CALL passport.Eliminacion_Departamento(?);';
		    
            /* Ejecución de la consulta */	
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute(array($id));
            $comando->closeCursor();
        }
        
    }
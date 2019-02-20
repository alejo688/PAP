<?php
    /**
    * clase encargada de manejar los eventos CRUD de la tabla filial
    */

    class filialController {

        public function __construct() {
        }

        /**
        * Metodo encargado de crear un registro en base de datos
        * @param filial
        */
        public static function create($filial) {
            /* Consulta SP */
		    $consulta = 'CALL passport.Creacion_Filiar(?, ?, ?, ?)';
            
            /* Ejecución de la consulta */
            $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute(
                array(
                    $filial->fk_ciudad_id,
                    $filial->nombre,
                    $filial->direccion,
                    $filial->telefono
                )
            );

            $comando->closeCursor();
        }

        /**
        * Metodo encargado de actualizar un registro en base de datos
        * @param filial
        */
        public static function update($filial) {
            /* Consulta SP */
		    $consulta = 'CALL passport.Modificacion_Filiar(?, ?, ?, ?, ?, ?)';
            
		    /* Ejecución de la consulta */
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
		    $comando->execute(array(
                $filial->pk_filial_id,
                $filial->fk_ciudad_id,
                $filial->nombre,
                $filial->direccion,
                $filial->telefono,
                $filial->estado
            ));

            $comando->closeCursor();
        }

        /**
        * Metodo encargado de retorna todos los registros de la tabla
        */
        public static function read() {
            $consulta = 'CALL passport.Listado_Filiar()';

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
        * Metodo encargado de retorna todos los registros de la tabla
        */
        public static function readActive() {
            $consulta = 'CALL passport.Listado_Filiar_Activo();';

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
        * Metodo encargado de retorna un registro filtrado por el campo pk_filial_id
        * @param id
        */
        public static function getById($id) {
            //$consulta = 'CALL passport.Filiar_por_id(?);';
            $consulta = 'SELECT f.pk_filial_id,
                            d.fk_pais_id,
                            c.fk_departamento_id,
                            f.fk_ciudad_id,
                            f.nombre,
                            f.direccion,
                            f.telefono,
                            f.estado
                        FROM filial f
                        INNER JOIN ciudad c ON f.fk_ciudad_id = c.pk_ciudad_id
                        INNER JOIN departamento d ON c.fk_departamento_id = d.pk_departamento_id
                        WHERE f.pk_filial_id = ?;';
		    
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
        * Metodo encargado de eliminar un registro filtrado por el campo pk_filial_id
        * @param id
        */
        public static function delete($id) {
		    $consulta = 'CALL passport.Eliminacion_Filiar(?);';
		    
            /* Ejecución de la consulta */	
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute(array($id));
            
            $comando->closeCursor();
        }
        
    }
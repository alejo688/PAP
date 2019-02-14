<?php
    /**
    * clase encargada de manejar los eventos CRUD de la tabla estudiante
    */

    class estudianteController {

        public function __construct() {
        }

        /**
        * Metodo encargado de crear un registro en base de datos
        * @param estudiante
        */
        public static function create($estudiante) {
            /* Consulta SP */
		    $consulta = 'CALL passport.Creacion_Estudiante(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            
            /* Ejecución de la consulta */
            $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute(
                array(
                    $estudiante->nombre,
                    $estudiante->tipo_documento,
                    $estudiante->documento,
                    $estudiante->direccion_casa,
                    $estudiante->direccion_trabajo,
                    $estudiante->telefono_fijo1,
                    $estudiante->telefono_fijo2,
                    $estudiante->celular1,
                    $estudiante->celular2,
                    $estudiante->correo_electronico,
                    $estudiante->password,
                    $estudiante->fk_ciudad_id,
                    $estudiante->fk_filial_id,
                    $estudiante->fk_titular_id,
                    $estudiante->fk_plan_id
                )
            );

            $comando->closeCursor();
        }

        /**
        * Metodo encargado de actualizar un registro en base de datos
        * @param estudiante
        */
        public static function update($estudiante) {
            /* Consulta SP */
		    $consulta = 'CALL passport.Modificacion_Estudiante(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            
		    /* Ejecución de la consulta */
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
		    $comando->execute(array(
                $estudiante->pk_estudiante_id,
                $estudiante->nombre,
                $estudiante->tipo_documento,
                $estudiante->documento,
                $estudiante->direccion_casa,
                $estudiante->direccion_trabajo,
                $estudiante->telefono_fijo1,
                $estudiante->telefono_fijo2,
                $estudiante->celular1,
                $estudiante->celular2,
                $estudiante->correo_electronico,
                $estudiante->fk_ciudad_id,
                $estudiante->fk_filial_id,
                $estudiante->fk_titular_id,
                $estudiante->fk_plan_id,
                $estudiante->estado
            ));

            $comando->closeCursor();
        }

        /**
        * Metodo encargado de retorna todos los registros de la tabla
        */
        public static function read() {
            $consulta = 'CALL passport.Listado_Estudiante()';

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
        * Metodo encargado de retorna un registro filtrado por el campo id
        * @param id
        */
        public static function getById($id) {
            $consulta = 'SELECT e.nombre,
                e.tipo_documento,
                e.documento,
                e.direccion_casa,
                e.direccion_trabajo,
                e.telefono_fijo1,
                e.telefono_fijo2,
                e.celular1,
                e.celular2,
                e.correo_electronico,
                d.fk_pais_id,
                c.fk_departamento_id,
                e.fk_ciudad_id,
                e.fk_filial_id,
                e.fk_titular_id,
                e.fk_plan_id,
                t.nombre nombre_titular,
                t.documento documento_titular,
                t.estudiante,
                e.estado
            FROM passport.estudiante e
            INNER JOIN titular t ON t.pk_titular_id = e.fk_titular_id
            INNER JOIN ciudad c ON e.fk_ciudad_id = c.pk_ciudad_id
            INNER JOIN departamento d ON c.fk_departamento_id = d.pk_departamento_id
            WHERE e.pk_estudiante_id = ?;'; 
		    
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
        * Metodo encargado de eliminar un registro filtrado por el campo id
        * @param id
        */
        public static function delete($id) {
		    $consulta = 'CALL passport.Eliminacion_Estudiante(?);            ';
		    
            /* Ejecución de la consulta */	
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute(array($id));
            
            $comando->closeCursor();
        }
        
    }
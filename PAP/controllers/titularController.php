<?php
    /**
    * clase encargada de manejar los eventos CRUD de la tabla titular
    */

    class titularController {

        public function __construct() {
        }

        /**
        * Metodo encargado de crear un registro en base de datos
        * @param titular
        */
        public static function create($titular) {
            /* Consulta SP */
            $consulta = 'CALL passport.Creacion_Titular(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            
            /* Ejecución de la consulta */
            $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute(
                array(
                    $titular->fk_ciudad_id,
                    $titular->fk_filial_id,
                    $titular->nombre,
                    $titular->tipo_documento,
                    $titular->documento,
                    $titular->numero_matricula,
                    $titular->fecha_matricula,
                    $titular->direccion_casa,
                    $titular->direccion_trabajo,
                    $titular->telefono_fijo1,
                    $titular->telefono_fijo2,
                    $titular->celular1,
                    $titular->celular2,
                    $titular->correo_electronico,
                    $titular->ciclos,
                    $titular->ciclos_obsequio,
                    $titular->cobranza,
                    $titular->descuento,
                    $titular->razondesc,
                    $titular->fecha_pago_inicial,
                    $titular->saldo,
                    $titular->numero_mensualidades,
                    $titular->valor,
                    $titular->fuente_matricula,
                    $titular->jornada,
                    $titular->genero,
                    $titular->otro_genero,
                    $titular->estado_civil,
                    $titular->fecha_nacimiento,
                    $titular->fk_ciudad_origen_id,
                    $titular->estudiante
                )
            );
            $comando->closeCursor();

            $consulta = 'SELECT LAST_INSERT_ID()';
            $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute();

            if ($comando->rowCount() > 0) {
                $result = $comando->fetchAll(PDO::FETCH_ASSOC);
                $comando->closeCursor();

                return $result[0]["LAST_INSERT_ID()"];
            }
		    else {
                return null;
            }
        }

        /**
        * Metodo encargado de actualizar un registro en base de datos
        * @param titular
        */
        public static function update($titular) {
            /* Consulta SP */
		    $consulta = 'CALL passport.Modificacion_Titular(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            
		    /* Ejecución de la consulta */
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
		    $comando->execute(array(
                $titular->pk_titular_id,
                $titular->fk_ciudad_id,
                $titular->fk_filial_id,
                $titular->nombre,
                $titular->tipo_documento,
                $titular->documento,
                $titular->numero_matricula,
                $titular->fecha_matricula,
                $titular->direccion_casa,
                $titular->direccion_trabajo,
                $titular->telefono_fijo1,
                $titular->telefono_fijo2,
                $titular->celular1,
                $titular->celular2,
                $titular->correo_electronico,
                $titular->ciclos,
                $titular->ciclos_obsequio,
                $titular->cobranza,
                $titular->descuento,
                $titular->razondesc,
                $titular->fecha_pago_inicial,
                $titular->saldo,
                $titular->numero_mensualidades,
                $titular->valor,
                $titular->fuente_matricula,
                $titular->jornada,
                $titular->genero,
                $titular->otro_genero,
                $titular->estado_civil,
                $titular->fecha_nacimiento,
                $titular->fk_ciudad_origen_id,
                $titular->estudiante
            ));

            $comando->closeCursor();
        }

        /**
        * Metodo encargado de retorna todos los registros de la tabla
        */
        public static function read() {
            $consulta = 'CALL passport.Listado_Titular()';

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
        public static function readEstudiante() {
            $consulta = 'SELECT t.pk_titular_id,
                t.documento,
                t.nombre
            FROM titular t
            LEFT JOIN estudiante e ON t.pk_titular_id = e.fk_titular_id
            WHERE e.fk_titular_id IS NULL';

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
        * Metodo encargado de retorna un registro filtrado por el campo pk_titular_id
        * @param id
        */
        public static function getById($id) {
            //$consulta = 'CALL passport.Titular_por_id(?)';
            $consulta = 'SELECT t.pk_titular_id,
                            d.fk_pais_id,
                            c.fk_departamento_id,
                            t.fk_ciudad_id,
                            t.fk_filial_id,
                            t.nombre,
                            t.tipo_documento,
                            t.documento,
                            t.numero_matricula,
                            t.fecha_matricula,
                            t.direccion_casa,
                            t.direccion_trabajo,
                            t.telefono_fijo1,
                            t.telefono_fijo2,
                            t.celular1,
                            t.celular2,
                            t.correo_electronico,
                            t.ciclos,
                            t.ciclos_obsequio,
                            t.cobranza,
                            t.descuento,
                            t.razondesc,
                            t.fecha_pago_inicial,
                            t.saldo,
                            t.numero_mensualidades,
                            t.valor,
                            t.fuente_matricula,
                            t.jornada,
                            t.genero,
                            t.otro_genero,
                            t.estado_civil,
                            t.fecha_nacimiento,
                            do.fk_pais_id fk_pais_origen_id,
                            co.fk_departamento_id fk_departamento_origen_id,
                            t.fk_ciudad_origen_id,
                            t.estudiante
                        FROM titular t
                        INNER JOIN ciudad c ON t.fk_ciudad_id = c.pk_ciudad_id
                        INNER JOIN departamento d ON c.fk_departamento_id = d.pk_departamento_id
                        INNER JOIN ciudad co ON t.fk_ciudad_origen_id = co.pk_ciudad_id
                        INNER JOIN departamento do ON co.fk_departamento_id = do.pk_departamento_id
                        WHERE pk_titular_id = ?;';
		    
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
        * Metodo encargado de eliminar un registro filtrado por el campo pk_titular_id
        * @param id
        */
        public static function delete($id) {
		    $consulta = 'CALL passport.Eliminacion_Titular(?);';
		    
            /* Ejecución de la consulta */	
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute(array($id));
            
            $comando->closeCursor();
        }
        
    }
<?php
    /**
    * clase encargada de manejar los eventos CRUD de la tabla plan
    */

    class planController {

        public function __construct() {
        }

        /**
        * Metodo encargado de crear un registro en base de datos
        * @param plan
        */
        public static function create($plan) {
            /* Consulta SP */
		    $consulta = 'CALL passport.Creacion_plan(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            
            /* Ejecución de la consulta */
            $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute(
                array(
                    $plan->nombre,
                    $plan->tipo,
                    $plan->inicial,
                    $plan->valor_total,
                    $plan->saldo,
                    $plan->cuotas,
                    $plan->cuota_mensual,
                    $plan->hora_academica,
                    $plan->tutorias,
                    $plan->ciclos
                )
            );
            $comando->closeCursor();
        }

        /**
        * Metodo encargado de actualizar un registro en base de datos
        * @param plan
        */
        public static function update($plan) {
            /* Consulta SP */
		    $consulta = 'CALL passport.Modificacion_plan(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
            
		    /* Ejecución de la consulta */
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
		    $comando->execute(array(
                $plan->pk_plan_id,
                $plan->nombre,
                $plan->tipo,
                $plan->inicial,
                $plan->valor_total,
                $plan->saldo,
                $plan->cuotas,
                $plan->cuota_mensual,
                $plan->hora_academica,
                $plan->tutorias,
                $plan->ciclos,
                $plan->estado
            ));
            $comando->closeCursor();
        }

        /**
        * Metodo encargado de retorna todos los registros de la tabla
        */
        public static function read() {
            $consulta = 'CALL passport.Listado_plan()';

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
            $consulta = 'CALL passport.Listado_Plan_Activo()';

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
        * Metodo encargado de retorna un registro filtrado por el campo pk_plan_id
        * @param id
        */
        public static function getById($id) {
            //$consulta = 'CALL passport.plan_por_id(?);';
            $consulta = "SELECT nombre,
                            tipo,
                            inicial,
                            valor_total,
                            saldo,
                            cuotas,
                            cuota_mensual,
                            hora_academica,
                            tutorias,
                            ciclos,
                            estado
                        FROM plan
                        WHERE pk_plan_id = ?";
		    
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
        * Metodo encargado de eliminar un registro filtrado por el campo pk_plan_id
        * @param id
        */
        public static function delete($id) {
		    $consulta = 'CALL passport.Eliminacion_plan(?);';
		    
            /* Ejecución de la consulta */	
		    $comando = ConexionBD::obtenerInstancia()->obtenerBD()->prepare($consulta);
            $comando->execute(array($id));
            $comando->closeCursor();
        }
        
    }
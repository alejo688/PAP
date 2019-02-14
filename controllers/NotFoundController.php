<?php
    /**
    * clase encargada de manejar los eventos CRUD de la tabla ciudad
    */

    class NotFoundController {

        public function __construct() {
        }

        /**
        * Retorna la vista de pagina no encontrada
        */
        public static function view() {
            include 'views/page/404.php';
        }

    }
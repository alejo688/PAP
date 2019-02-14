<?php
    /**
    * modelo de la tabla estudiante
    */
    class estudianteModel {
        public $pk_estudiante_id;
		public $nombre;
		public $tipo_documento;
		public $documento;
		public $direccion_casa;
		public $direccion_trabajo;
		public $telefono_fijo1;
		public $telefono_fijo2;
		public $celular1;
		public $celular2;
		public $correo_electronico;
		public $password;
		public $fk_ciudad_id;
		public $fk_filial_id;
		public $fk_titular_id;
		public $fk_plan_id;
		public $estado;
    }
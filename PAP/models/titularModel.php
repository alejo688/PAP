<?php
    /**
    * modelo de la tabla titular
    */
    class titularModel {
        public $pk_titular_id;
        public $fk_ciudad_id;
		public $fk_filial_id;
		public $nombre;
		public $tipo_documento;
		public $documento;
		public $numero_matricula;
		public $fecha_matricula;
		public $direccion_casa;
		public $direccion_trabajo;
		public $telefono_fijo1;
		public $telefono_fijo2;
		public $celular1;
		public $celular2;
		public $correo_electronico;
		public $ciclos;
		public $ciclos_obsequio;
		public $cobranza;
		public $descuento;
		public $razondesc;
		public $fecha_pago_inicial;
		public $saldo;
		public $numero_mensualidades;
		public $valor;
		public $fuente_matricula;
		public $jornada;
		public $genero;
		public $otro_genero;
		public $estado_civil;
		public $fecha_nacimiento;
		public $fk_ciudad_origen_id;
		public $estudiante;
    }
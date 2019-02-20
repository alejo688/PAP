<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $action = "update";
        $titulo = "Editar Titular";
        $btn = "Editar";
    }
    else
    {
        $id = "";
        $action = "create";
        $titulo = "Nuevo Titular";
        $btn = "Crear";
    }
?>

<form id="form" method="post" class="well bs-component col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
    <h2 class="titulo"><?= $titulo ?></h2>

    <input name="action" type="hidden" value="<?= $action ?>">

    <input  name="pk_titular_id" type="hidden" value="<?= id ?>">

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>País</label>
            <select id="fk_pais_id" class="form-control fk_pais_id" name="fk_pais_id" data-live-search="true" required>
            <option value="">Seleccione una opción</option>
            </select>
            <label for="fk_pais_id" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Departamento</label>
            <select id="fk_departamento_id" class="form-control fk_departamento_id" name="fk_departamento_id" data-live-search="true" disabled required>
            <option value="">Seleccione una opción</option>
            </select>
            <label for="fk_departamento_id" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Ciudad</label>
            <select id="fk_ciudad_id" class="form-control fk_ciudad_id" name="fk_ciudad_id" data-live-search="true" disabled required>
                <option value="">Seleccione una opción</option>
            </select>
            <label for="fk_ciudad_id" generated="true" class="error"></label>
        </div>
    </div>

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Filial</label>
            <select id="fk_filial_id" class="form-control fk_filial_id" name="fk_filial_id" data-live-search="true" required>
                <option value="">Seleccione una opción</option>
            </select>
            <label for="fk_filial_id" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Número de Matricula</label>
            <input name="numero_matricula" type="text" class="form-control numero_matricula" placeholder="Ingrese el número de matricula" required>
            <label for="numero_matricula" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Fecha de Matricula</label>
            <div class='input-group date' id='datetimepicker1'>
                <input name="fecha_matricula" type="text" class="form-control fecha_matricula" placeholder="Ingrese la fecha de matricula" required>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <label for="fecha_matricula" generated="true" class="error"></label>
        </div>
    </div>

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Tipo de documento</label>
            <select id="tipo_documento" class="form-control tipo_documento" name="tipo_documento" data-live-search="true" required>
                <option value="">Seleccione una opción</option>
                <option value="1">C.C.</option>
                <option value="2">T.I.</option>
                <option value="3">C.E.</option>
                <option value="4">R.C.</option>
            </select>
            <label for="tipo_documento" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Número de Documento</label>
            <input name="documento" type="text" class="form-control documento" placeholder="Ingrese el número de documento" required>
            <label for="documento" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-5 col-md-5 col-sm-5 col-xs-12">
            <label>Nombre</label>
            <input name="nombre" type="text" class="form-control nombre" placeholder="Ingrese el nombre del titular" required>
            <label for="nombre" generated="true" class="error"></label>
        </div>
    </div>

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Dirección Casa</label>
            <input name="direccion_casa" type="text" class="form-control direccion_casa" placeholder="Ingrese la dirección de la casa" required>
            <label for="direccion_casa" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Dirección Trabajo</label>
            <input name="direccion_trabajo" type="text" class="form-control direccion_trabajo" placeholder="Ingrese la dirección del trabajo" required>
            <label for="direccion_trabajo" generated="true" class="error"></label>
        </div>
    </div>

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Teléfono Fijo 1</label>
            <input name="telefono_fijo1" type="tel" class="form-control telefono_fijo1" placeholder="Ingrese un número de teléfono fijo" required>
            <label for="telefono_fijo1" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Teléfono Fijo 2</label>
            <input name="telefono_fijo2" type="tel" class="form-control telefono_fijo2" placeholder="Ingrese un número de teléfono fijo">
            <label for="telefono_fijo2" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Celular 1</label>
            <input name="celular1" type="tel" class="form-control celular1" placeholder="Ingrese un número de teléfono celular" required>
            <label for="celular1" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Celular 2</label>
            <input name="celular2" type="tel" class="form-control celular2" placeholder="Ingrese un número de teléfono celular">
            <label for="celular2" generated="true" class="error"></label>
        </div>
    </div>

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Correo Electrónico</label>
            <input name="correo_electronico" type="text" class="form-control correo_electronico" placeholder="Ingrese el correo electrónico" required>
            <label for="correo_electronico" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Ciclos adquiridos</label>
            <input name="ciclos" type="text" class="form-control ciclos" placeholder="Ingrese un número de ciclos adquiridos" required>
            <label for="ciclos" generated="true" class="error"></label>
        </div>
        
        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Ciclos obsequio</label>
            <input name="ciclos_obsequio" type="text" class="form-control ciclos_obsequio" placeholder="Ingrese un número de ciclos obsequiados" required>
            <label for="ciclos_obsequio" generated="true" class="error"></label>
        </div>
    </div>

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Total ciclos</label>
            <input name="total_ciclos" type="text" class="form-control total_ciclos" disabled>
            <label for="total_ciclos" generated="true" class="error"></label>
        </div>
        
        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="checkbox">
                <label>
                    <input id="cobranzaCheck" type="checkbox"> Asignado a cobranzas
                    <input id="cobranza" name="cobranza" type="hidden">
                </label>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 subtitle">
        <h4>Condiciones Económicas</h4>
    </div>

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Descuento</label>
            <input name="descuento" type="text" class="form-control descuento" placeholder="Ingrese el valor del descuento" required>
            <label for="descuento" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <label>Razón Descuento</label>
            <textarea name="razondesc" type="text" class="form-control razondesc" placeholder="Ingrese motivo del descuento" disabled></textarea>
            <label for="razondesc" generated="true" class="error"></label>
        </div>
    </div>

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Fecha de Pago Inicial</label>
            <div class='input-group date' id='datetimepicker2'>
                <input name="fecha_pago_inicial" type="text" class="form-control fecha_pago_inicial" placeholder="Ingrese la fecha de pago inicial" required>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <label for="fecha_pago_inicial" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Saldo a Pagar</label>
            <input name="saldo" type="text" class="form-control saldo" placeholder="Ingrese el saldo a pagar" required>
            <label for="saldo" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Número de Mensualidades</label>
            <input name="numero_mensualidades" type="text" class="form-control numero_mensualidades" placeholder="Ingrese el número de mensualidades" required>
            <label for="numero_mensualidades" generated="true" class="error"></label>
        </div>
    </div>

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Valor de Cuota</label>
            <input name="valor" type="text" class="form-control valor" placeholder="Ingrese el valor de la cuota" required>
            <label for="valor" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Fuente de la Matricula</label>
            <input name="fuente_matricula" type="text" class="form-control fuente_matricula" placeholder="Ingrese la fuente de la matricula" required>
            <label for="fuente_matricula" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Jornada</label>
            <select id="jornada" class="form-control jornada" name="jornada" data-live-search="true" required>
                <option value="">Seleccione una opción</option>
                <option value="1">A.M</option>
                <option value="2">P.M</option>
                <option value="3">Sábados</option>
            </select>
            <label for="jornada" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Género</label>
            <select id="genero" class="form-control genero" name="genero" data-live-search="true" required>
                <option value="">Seleccione una opción</option>
                <option value="1">Masculino</option>
                <option value="2">Femenino</option>
                <option value="3">Otro</option>
            </select>
            <label for="genero" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Otro Género</label>
            <input name="otro_genero" type="text" class="form-control otro_genero" placeholder="Ingrese el género" disabled>
            <label for="otro_genero" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Estado Civil</label>
            <select id="estado_civil" class="form-control estado_civil" name="estado_civil" data-live-search="true" required>
                <option value="">Seleccione una opción</option>
                <option value="1">Casado</option>
                <option value="2">Soltero</option>
                <option value="3">Divorciado</option>
                <option value="4">Viudo</option>
            </select>
            <label for="estado_civil" generated="true" class="error"></label>
        </div>
    </diV>

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Fecha de Nacimiento</label>
            <div class='input-group date' id='datetimepicker3'>
                <input name="fecha_nacimiento" type="text" class="form-control fecha_nacimiento" placeholder="Ingrese la fecha de nacimiento" required>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <label for="fecha_nacimiento" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>País de Origen</label>
            <select id="fk_pais_origen_id" class="form-control fk_pais_origen_id" name="fk_pais_origen_id" data-live-search="true" required>
            <option value="">Seleccione una opción</option>
            </select>
            <label for="fk_pais_origen_id" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Departamento de Origen</label>
            <select id="fk_departamento_origen_id" class="form-control fk_departamento_origen_id" name="fk_departamento_origen_id" data-live-search="true" disabled required>
            <option value="">Seleccione una opción</option>
            </select>
            <label for="fk_departamento_origen_id" generated="true" class="error"></label>
        </div>
    </div>

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Ciudad de Origen</label>
            <select id="fk_ciudad_origen_id" class="form-control fk_ciudad_origen_id" name="fk_ciudad_origen_id" data-live-search="true" disabled required>
                <option value="">Seleccione una opción</option>
            </select>
            <label for="fk_ciudad_origen_id" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="checkbox">
                <label>
                    <input id="checkEstudiante" type="checkbox"> Titular es el mismo estudiante
                    <input id="estudiante" name="estudiante" type="hidden">
                </label>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <button id="btn-submit" class="btn btn-primary btn-form" type="submit"><?= $btn ?></button>
        <button id="btn-discard" class="btn btn-danger btn-form" type="button">Descartar</button>
    </div>
</form>

<script>
    $(document).ready(function() {

        var msgRequired = "Este campo es obligatorio";
        var msgMin = "El valor minimo requerido es 0";
        var msgNumber = "El registro debe ser un número valido";
        var msgDate = "El registro debe tener una fecha valida";
        var msgEmail = "El registro debe ser una dirección de correo electónico valido"

        $.post("request/pais.php", {action: "readActive"}, function (data) {

            var result = jQuery.parseJSON(data);
            var htmlOption = "<option value=\"\">Seleccione una opción</option>";

            $.each(result.resultado, function(idx, obj){
                htmlOption += "<option value=\"" + obj.pk_pais_id + "\">" + obj.codigo + ", " + obj.nombre + "</option>"
            });

            $('#fk_pais_id').html(htmlOption);
            $('#fk_pais_origen_id').html(htmlOption);

            $('#fk_pais_id').selectpicker();
            $('#fk_pais_origen_id').selectpicker();

        });


        $.post("request/filial.php", { action: "readActive" }, function (data) {
            
            var result = jQuery.parseJSON(data);
            var htmlOption = "<option value=\"\">Seleccione una opción</option>";

            $.each(result.resultado, function(idx, obj){
                htmlOption += "<option value=\"" + obj.pk_filial_id + "\">" + obj.nombre + "</option>"
            });

            $('.fk_filial_id').html(htmlOption);
            $('.fk_filial_id').selectpicker();

        });

        $('#fk_departamento_id').selectpicker();
        $('#fk_ciudad_id').selectpicker();
        $('#tipo_documento').selectpicker();
        $('#jornada').selectpicker();
        $('#genero').selectpicker();
        $('#estado_civil').selectpicker();
        $('#fk_departamento_origen_id').selectpicker();
        $('#fk_ciudad_origen_id').selectpicker();

        $('#datetimepicker1').datetimepicker({
            viewMode: 'years',
            format: 'YYYY-MM-DD',
            locale: 'es'
        });

        $('#datetimepicker2').datetimepicker({
            viewMode: 'years',
            format: 'YYYY-MM-DD',
            locale: 'es'
        });

        $('#datetimepicker3').datetimepicker({
            viewMode: 'years',
            format: 'YYYY-MM-DD',
            locale: 'es'
        });

        <?php
            if (isset($_GET["id"])) {
        ?>
        
        $.post("request/titular.php", {action: "getById", id: <?= $id ?>}, function (data) {

            var result = jQuery.parseJSON(data).resultado[0];

            $(".nombre").val(result.nombre);
            $(".documento").val(result.documento);
            $(".numero_matricula").val(result.numero_matricula);
            $(".fecha_matricula").val(result.fecha_matricula);
            $(".direccion_casa").val(result.direccion_casa);
            $(".direccion_trabajo").val(result.direccion_trabajo);
            $(".telefono_fijo1").val(result.telefono_fijo1);
            $(".telefono_fijo2").val(result.telefono_fijo2);
            $(".celular1").val(result.celular1);
            $(".celular2").val(result.celular2);
            $(".ciclos").val(result.ciclos);
            $(".ciclos_obsequio").val(result.ciclos_obsequio);
            $(".descuento").val(result.descuento);
            $(".razondesc").val(result.razondesc);
            $(".fecha_pago_inicial").val(result.fecha_pago_inicial);
            $(".saldo").val(result.saldo);
            $(".numero_mensualidades").val(result.numero_mensualidades);
            $(".valor").val(result.valor);
            $(".fuente_matricula").val(result.fuente_matricula);
            $(".otro_genero").val(result.otro_genero);
            $(".fecha_nacimiento").val(result.fecha_nacimiento);

            $(".descuento").trigger("focusout");
            $(".ciclos").trigger("focusout");

            $("#fk_pais_id").selectpicker('val', result.fk_pais_id);
            $("#fk_filial_id").selectpicker('val', result.fk_filial_id);
            $("#tipo_documento").selectpicker('val', result.tipo_documento);
            $("#jornada").selectpicker('val', result.jornada);
            $("#genero").selectpicker('val', result.genero);
            $("#estado_civil").selectpicker('val', result.estado_civil);
            $("#fk_pais_origen_id").selectpicker('val', result.fk_pais_origen_id);

            if (result.cobranza == 1) {
                $("#cobranzaCheck").attr('checked','checked');
            }

            if (result.estudiante == 1) {
                $("#checkEstudiante").attr('checked','checked');
            }

        });

        <?php
            }
        ?>

        /* acciones */

        $('#fk_pais_id').change(function() {
            
            var pk_pais_id = $(this).selectpicker('val');
            
            if (pk_pais_id != "") {
                $.post("request/departamento.php", {action: "getByPaisId", id: pk_pais_id}, function (data) {

                    var result = jQuery.parseJSON(data);
                    var htmlOption = "<option value=\"\">Seleccione una opción</option>";

                    $.each(result.resultado, function(idx, obj){
                        htmlOption += "<option value=\"" + obj.pk_departamento_id + "\">" + obj.codigo + ", " + obj.nombre + "</option>"
                    });

                    $('select#fk_departamento_id').html(htmlOption);
                    $('#fk_departamento_id').attr("disabled", false);
                    $('#fk_departamento_id').selectpicker('refresh');

                    <?php
                        if (isset($_GET["id"])) {
                    ?>
                    
                    $.post("request/titular.php", {action: "getById", id: <?= $id ?>}, function (data) {

                        var result = jQuery.parseJSON(data).resultado[0];

                        $("#fk_departamento_id").selectpicker('val', result.fk_departamento_id);
                    });
                    <?php
                        }
                    ?>

                });
            } else {
                var htmlOption = "<option value=\"\">Seleccione una opción</option>";
                
                $('select#fk_departamento_id').html(htmlOption);
                $('#fk_departamento_id').attr("disabled", true);
                $('#fk_departamento_id').selectpicker('refresh');
            }
        });

        $('#fk_departamento_id').change(function() {

            var fk_departamento_id = $(this).selectpicker('val');

            if (fk_departamento_id != "") {
                $.post("request/ciudad.php", {action: "getByDepartamentoId", id: fk_departamento_id}, function (data) {
                    
                    var result = jQuery.parseJSON(data);
                    var htmlOption = "<option value=\"\">Seleccione una opción</option>";

                    $.each(result.resultado, function(idx, obj){
                        htmlOption += "<option value=\"" + obj.pk_ciudad_id + "\">" + obj.codigo + ", " + obj.nombre + "</option>"
                    });

                    $('select#fk_ciudad_id').html(htmlOption);
                    $('#fk_ciudad_id').attr("disabled", false);
                    $('#fk_ciudad_id').selectpicker('refresh');

                    <?php
                        if (isset($_GET["id"])) {
                    ?>
                    
                    $.post("request/titular.php", {action: "getById", id: <?= $id ?>}, function (data) {

                        var result = jQuery.parseJSON(data).resultado[0];

                        $("#fk_ciudad_id").selectpicker('val', result.fk_ciudad_id);
                    });
                    <?php
                        }
                    ?>

                });
            } else {
                var htmlOption = "<option value=\"\">Seleccione una opción</option>";
                
                $('select#fk_ciudad_id').html(htmlOption);
                $('#fk_ciudad_id').attr("disabled", true);
                $('#fk_ciudad_id').selectpicker('refresh');
            }
        });

        $('#fk_pais_origen_id').change(function() {
            var pk_pais_id = $(this).selectpicker('val');

            if (pk_pais_id != "") {
                $.post("request/departamento.php", {action: "getByPaisId", id: pk_pais_id}, function (data) {

                    var result = jQuery.parseJSON(data);
                    var htmlOption = "<option value=\"\">Seleccione una opción</option>";

                    $.each(result.resultado, function(idx, obj){
                        htmlOption += "<option value=\"" + obj.pk_departamento_id + "\">" + obj.codigo + ", " + obj.nombre + "</option>"
                    });

                    $('select#fk_departamento_origen_id').html(htmlOption);
                    $('#fk_departamento_origen_id').attr("disabled", false);
                    $('#fk_departamento_origen_id').selectpicker('refresh');

                    <?php
                        if (isset($_GET["id"])) {
                    ?>
                    
                    $.post("request/titular.php", {action: "getById", id: <?= $id ?>}, function (data) {

                        var result = jQuery.parseJSON(data).resultado[0];

                        $("#fk_departamento_origen_id").selectpicker('val', result.fk_departamento_origen_id);
                    });
                    <?php
                        }
                    ?>
                });
            } else {
                var htmlOption = "<option value=\"\">Seleccione una opción</option>";
                
                $('select#fk_departamento_origen_id').html(htmlOption);
                $('#fk_departamento_origen_id').attr("disabled", true);
                $('#fk_departamento_origen_id').selectpicker('refresh');
            }
        });

        $('#fk_departamento_origen_id').change(function() {

            var fk_departamento_id = $(this).selectpicker('val');

            if (fk_departamento_id != "") {
                $.post("request/ciudad.php", {action: "getByDepartamentoId", id: fk_departamento_id}, function (data) {
                    
                    var result = jQuery.parseJSON(data);
                    var htmlOption = "<option value=\"\">Seleccione una opción</option>";

                    $.each(result.resultado, function(idx, obj){
                        htmlOption += "<option value=\"" + obj.pk_ciudad_id + "\">" + obj.codigo + ", " + obj.nombre + "</option>"
                    });

                    $('select#fk_ciudad_origen_id').html(htmlOption);
                    $('#fk_ciudad_origen_id').attr("disabled", false);
                    $('#fk_ciudad_origen_id').selectpicker('refresh');

                    <?php
                        if (isset($_GET["id"])) {
                    ?>
                    
                    $.post("request/titular.php", {action: "getById", id: <?= $id ?>}, function (data) {

                        var result = jQuery.parseJSON(data).resultado[0];

                        $("#fk_ciudad_origen_id").selectpicker('val', result.fk_ciudad_origen_id);
                    });
                    <?php
                        }
                    ?>

                });
            } else {
                var htmlOption = "<option value=\"\">Seleccione una opción</option>";
                
                $('select#fk_ciudad_origen_id').html(htmlOption);
                $('#fk_ciudad_origen_id').attr("disabled", true);
                $('#fk_ciudad_origen_id').selectpicker('refresh');
            }
        });

        $(".ciclos").focusout(function() {
            var count = ($(".ciclos_obsequio").val() == "") ? 0 : parseInt($(".ciclos_obsequio").val());
            var count2 = ($(this).val() == "") ? 0 : parseInt($(this).val());
            var sum = count2 + count;
            $(".total_ciclos").val(sum);
        });

        $(".ciclos_obsequio").focusout(function() {
            var count = ($(".ciclos").val() == "") ? 0 : parseInt($(".ciclos").val());
            var count2 = ($(this).val() == "") ? 0 : parseInt($(this).val());
            var sum = count2 + count;
            $(".total_ciclos").val(sum);
        });

        $(".descuento").focusout(function() {
            var count = ($(this).val() == "") ? 0 : parseInt($(this).val());
            
            if (count > 0) {
                $('.razondesc').attr("disabled", false);
                $('.razondesc').attr("required", true);
            } else {
                $('.razondesc').attr("disabled", true);
                $('.razondesc').attr("required", false);
            }
            
        });

        $('#genero').change(function() {
            var genero = $(this).selectpicker('val');
            
            if (genero == "3") {
                $('.otro_genero').attr("disabled", false);
                $('.otro_genero').attr("required", true);
            } else {
                $('.otro_genero').attr("disabled", true);
                $('.otro_genero').attr("required", false);
            }
        });

        /* validador */

        $("#form").validate({
            rules: {
                fk_pais_id: {
                    required: true
                },
                fk_departamento_id: {
                    required: true
                },
                fk_ciudad_id: {
                    required: true
                },
                nombre: {
                    required: true
                },
                tipo_documento: {
                    required: true
                },
                documento: {
                    required: true
                },
                numero_matricula: {
                    required: true
                },
                fecha_matricula: {
                    required: true,
                    date: true
                },
                direccion_casa: {
                    required: true
                },
                direccion_trabajo: {
                    required: true
                },
                telefono_fijo1: {
                    required: true,
                    number: true
                },
                telefono_fijo2: {
                    number: true
                },
                celular1: {
                    required: true,
                    number: true
                },
                celular2: {
                    number: true
                },
                correo_electronico: {
                    required: true,
                    email: true
                },
                ciclos: {
                    required: true,
                    number: true,
                    min: 0
                },
                ciclos_obsequio: {
                    required: true,
                    number: true,
                    min: 0
                },
                descuento: {
                    required: true,
                    number: true,
                    max: 100,
                    min: 0
                },
                fecha_pago_inicial: {
                    required: true,
                    date: true
                },
                saldo: {
                    required: true,
                    number: true,
                    min: 0
                },
                numero_mensualidades: {
                    required: true,
                    number: true
                },
                valor: {
                    required: true,
                    number: true,
                    min: 0
                },
                fuente_matricula: {
                    required: true,
                },
                jornada: {
                    required: true,
                },
                genero: {
                    required: true,
                },
                estado_civil: {
                    required: true,
                },
                fecha_nacimiento: {
                    required: true,
                    date: true
                },
                fk_pais_origen_id: {
                    required: true
                },
                fk_departamento_origen_id: {
                    required: true
                },
                fk_ciudad_origen_id: {
                    required: true
                }
            },
            messages: {
                fk_pais_id: {
                    required: msgRequired
                },
                fk_departamento_id: {
                    required: msgRequired
                },
                fk_ciudad_id: {
                    required: msgRequired
                },
                fk_filial_id: {
                    required: msgRequired
                },
                nombre: {
                    required: msgRequired
                },
                tipo_documento: {
                    required: msgRequired
                },
                documento: {
                    required: msgRequired
                },
                numero_matricula: {
                    required: msgRequired
                },
                fecha_matricula: {
                    required: msgRequired,
                    date: msgDate
                },
                direccion_casa: {
                    required: msgRequired
                },
                direccion_trabajo: {
                    required: msgRequired
                },
                telefono_fijo1: {
                    required: msgRequired,
                    number: msgNumber
                },
                telefono_fijo2: {
                    number: msgNumber
                },
                celular1: {
                    required: msgRequired,
                    number: msgNumber
                },
                celular2: {
                    number: msgNumber
                },
                correo_electronico: {
                    required: msgRequired,
                    email: msgEmail
                },
                ciclos: {
                    required: msgRequired,
                    number: msgNumber,
                    min: msgMin
                },
                ciclos_obsequio: {
                    required: msgRequired,
                    number: msgNumber,
                    min: msgMin
                },
                descuento: {
                    required: msgRequired,
                    number: msgNumber,
                    min: msgMin
                },
                razondesc: {
                    required: msgRequired,
                },
                fecha_pago_inicial: {
                    required: msgRequired,
                    date: msgDate
                },
                saldo: {
                    required: msgRequired,
                    number: msgNumber,
                    min: msgMin
                },
                numero_mensualidades: {
                    required: msgRequired,
                    number: msgNumber
                },
                valor: {
                    required: msgRequired,
                    number: msgNumber,
                    min: msgMin
                },
                fuente_matricula: {
                    required: msgRequired
                },
                jornada: {
                    required: msgRequired
                },
                genero: {
                    required: msgRequired
                },
                otro_genero: {
                    required: msgRequired
                },
                estado_civil: {
                    required: msgRequired
                },
                fecha_nacimiento: {
                    required: msgRequired,
                    date: msgDate
                },
                fk_pais_origen_id: {
                    required: msgRequired
                },
                fk_departamento_origen_id: {
                    required: msgRequired
                },
                fk_ciudad_origen_id: {
                    required: msgRequired
                }
            }
        });

        $("#form").on('submit', function(e) {
            e.preventDefault();

            var isvalid = $(this).valid();
            
            if (isvalid) {

                if ($(".descuento").val() == 0) {
                    $(".razondesc").val("");
                }

                if ($("·genero").selectpicker('val') != 3) {
                    $(".otro_genero").val("");
                }

                if ($("#cobranzaCheck").is(":checked")) {
                    $("#cobranza").val("1");
                } else {
                    $("#cobranza").val("0");
                }

                if ($("#checkEstudiante").is(":checked")) {
                    $("#estudiante").val("1");
                } else {
                    $("#estudiante").val("0");
                }

                formAction("request/titular.php", $(this).serialize(), "?op=list_titular");
            }
        });

        $("#btn-discard").click(function(e){
            e.preventDefault();
            discardAction("?op=list_titular");
        });

    });
</script>
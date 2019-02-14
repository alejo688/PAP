<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $action = "update";
        $titulo = "Editar Estudiante";
        $btn = "Editar";
    }
    else
    {
        $id = "";
        $action = "create";
        $titulo = "Nuevo Estudiante";
        $btn = "Crear";
    }
?>

<form id="form" method="post" class="well bs-component col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
    <h2 class="titulo"><?= $titulo ?></h2>

    <input name="action" type="hidden" value="<?= $action ?>">

    <input id="pk_estudiante_id" name="pk_estudiante_id" type="hidden" value="<?= $id ?>">

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Titulares</label>
            <select id="fk_titular_id" class="form-control fk_titular_id" name="fk_titular_id" data-live-search="true" required>
            <option value="">Seleccione una opción</option>
            </select>
            <label for="fk_titular_id" generated="true" class="error"></label>
        </div>

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
    </div>

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Ciudad</label>
            <select id="fk_ciudad_id" class="form-control fk_ciudad_id" name="fk_ciudad_id" data-live-search="true" disabled required>
                <option value="">Seleccione una opción</option>
            </select>
            <label for="fk_ciudad_id" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Filial</label>
            <select id="fk_filial_id" class="form-control fk_filial_id" name="fk_filial_id" data-live-search="true" required>
                <option value="">Seleccione una opción</option>
            </select>
            <label for="fk_filial_id" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Plan</label>
            <select id="fk_plan_id" class="form-control fk_plan_id" name="fk_plan_id" data-live-search="true" required>
                <option value="">Seleccione una opción</option>
            </select>
            <label for="fk_plan_id" generated="true" class="error"></label>
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
            <input name="nombre" type="text" class="form-control nombre" placeholder="Ingrese el nombre del estudiante" required>
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

        <?php
            if (isset($_GET["id"])) {
        ?>
        <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <label>Estado</label>
                <select id="estado" class="form-control estado" name="estado" data-live-search="true" required>
                    <option value="">Seleccione una opción</option>
                    <option value="0">Pendiente</option>
                    <option value="1">Ok</option>
                    <option value="2">Devueltos</option>
                    <option value="3">Rechazos</option>
                    <option value="4">Retracto</option>
                </select>
                <label for="estado" generated="true" class="error"></label>
            </div>
        </div>
        <?php
            }
        ?>
    </div>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <button id="btn-submit" class="btn btn-primary btn-form" type="submit"><?= $btn ?></button>
        <button id="btn-discard" class="btn btn-danger btn-form" type="button">Descartar</button>
    </div>
</form>

<script>
    $(document).ready(function() {

        var msgRequired = "Este campo es obligatorio";
        var msgNumber = "El registro debe ser un número valido";
        var msgEmail = "El registro debe ser una dirección de correo electónico valido"

        $.post("request/titular.php", {action: "readEstudiante"}, function (data) {

            var result = jQuery.parseJSON(data);
            var htmlOption = "<option value=\"\">Seleccione una opción</option>";

            if (result.resultado) {
                $.each(result.resultado, function(idx, obj){
                    htmlOption += "<option value=\"" + obj.pk_titular_id + "\">" + obj.documento + ", " + obj.nombre + "</option>"
                });
            }

            <?php
                if (isset($_GET["id"])) {
            ?>

            $.post("request/estudiante.php", {action: "getById", id: <?= $id ?>}, function (data) {

                var result = jQuery.parseJSON(data).resultado[0];

                htmlOption += "<option selected value=\"" + result.fk_titular_id + "\">" + result.documento_titular + ", " + result.nombre_titular + "</option>"

                $('#fk_titular_id').html(htmlOption);
                $('#fk_titular_id').selectpicker();

            });

            <?php
                } else {
            ?>
                $('#fk_titular_id').html(htmlOption);
                $('#fk_titular_id').selectpicker();
            <?php
                }
            ?>

        });

        $.post("request/pais.php", {action: "readActive"}, function (data) {

            var result = jQuery.parseJSON(data);
            var htmlOption = "<option value=\"\">Seleccione una opción</option>";

            $.each(result.resultado, function(idx, obj){
                htmlOption += "<option value=\"" + obj.pk_pais_id + "\">" + obj.codigo + ", " + obj.nombre + "</option>"
            });

            $('#fk_pais_id').html(htmlOption);
            $('#fk_pais_id').selectpicker();

        });

        $.post("request/filial.php", {action: "readActive"}, function (data) {

            var result = jQuery.parseJSON(data);
            var htmlOption = "<option value=\"\">Seleccione una opción</option>";

            $.each(result.resultado, function(idx, obj){
                htmlOption += "<option value=\"" + obj.pk_filial_id + "\">" + obj.nombre + "</option>"
            });

            $('.fk_filial_id').html(htmlOption);
            $('.fk_filial_id').selectpicker();

        });

        $.post("request/plan.php", {action: "readActive"}, function (data) {

            var result = jQuery.parseJSON(data);
            var htmlOption = "<option value=\"\">Seleccione una opción</option>";

            $.each(result.resultado, function(idx, obj){
                htmlOption += "<option value=\"" + obj.pk_plan_id + "\">" + obj.tipo + " - " + obj.nombre + "</option>"
            });

            $('.fk_plan_id').html(htmlOption);
            $('.fk_plan_id').selectpicker();

        });

        $('#fk_departamento_id').selectpicker();
        $('#fk_ciudad_id').selectpicker();
        $('#tipo_documento').selectpicker();

        <?php
            if (isset($_GET["id"])) {
        ?>
        
        $.post("request/estudiante.php", {action: "getById", id: <?= $id ?>}, function (data) {

            var result = jQuery.parseJSON(data).resultado[0];

            $(".nombre").val(result.nombre);
            $(".documento").val(result.documento);
            $(".direccion_casa").val(result.direccion_casa);
            $(".direccion_trabajo").val(result.direccion_trabajo);
            $(".telefono_fijo1").val(result.telefono_fijo1);
            $(".telefono_fijo2").val(result.telefono_fijo2);
            $(".celular1").val(result.celular1);
            $(".celular2").val(result.celular2);
            $(".correo_electronico").val(result.correo_electronico);

            $("#fk_pais_id").selectpicker('val', result.fk_pais_id);
            $("#fk_filial_id").selectpicker('val', result.fk_filial_id);
            $("#fk_plan_id").selectpicker('val', result.fk_plan_id);
            $("#tipo_documento").selectpicker('val', result.tipo_documento);

            $('#estado').selectpicker();
            $("#estado").selectpicker('val', result.estado);

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
                    
                    $.post("request/estudiante.php", {action: "getById", id: <?= $id ?>}, function (data) {

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
                    
                    $.post("request/estudiante.php", {action: "getById", id: <?= $id ?>}, function (data) {

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

        $('#fk_ciudad_id').change(function() {
            var fk_ciudad_id = $(this).selectpicker('val');
            console.log(fk_ciudad_id);
        });

        /* validador */

        $("#form").validate({
            rules: {
                fk_titular_id: {
                    required: true
                },
                fk_pais_id: {
                    required: true
                },
                fk_departamento_id: {
                    required: true
                },
                fk_ciudad_id: {
                    required: true
                },
                fk_filial_id: {
                    required: true
                },
                fk_plan_id: {
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
                }
            },
            messages: {
                fk_titular_id: {
                    required: msgRequired
                },
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
                fk_plan_id: {
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
                }
            }
        });

        $("#form").on('submit', function(e) {
            e.preventDefault();

            var isvalid = $(this).valid();

            if (isvalid) 
                formAction("request/estudiante.php", $(this).serialize(), "?op=list_estudiante");
        });

        $("#btn-discard").click(function(e){
            e.preventDefault();
            discardAction("?op=list_estudiante");
        });

    });
</script>
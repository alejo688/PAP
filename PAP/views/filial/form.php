<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $action = "update";
        $titulo = "Editar Filial";
        $btn = "Editar";
    }
    else
    {
        $id = "";
        $action = "create";
        $titulo = "Nueva Filial";
        $btn = "Crear";
    }
?>

<form id="form" method="post" class="well bs-component col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
    <h2 class="titulo"><?= $titulo ?></h2>

    <input name="action" type="hidden" value="<?= $action ?>">

    <input id="pk_filial_id" name="pk_filial_id" type="hidden" value="<?= $id ?>">

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
        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Nombre</label>
            <input name="nombre" type="text" class="form-control nombre" placeholder="Ingrese el nombre de la filial" required>
            <label for="nombre" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <label>Dirección</label>
            <input name="direccion" type="text" class="form-control direccion" placeholder="Ingrese la dirección de la filial" required>
            <label for="direccion" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <label>Teléfono</label>
            <input name="telefono" type="tel" class="form-control telefono" placeholder="Ingrese un número de teléfono de la filial" required>
            <label for="telefono" generated="true" class="error"></label>
        </div>
    </div>

    <?php
        if (isset($_GET["id"])) {
    ?>
    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Estado</label>
            <select id="estado" class="form-control estado" name="estado" data-live-search="true" required>
                <option value="">Seleccione una opción</option>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
            <label for="estado" generated="true" class="error"></label>
        </div>
    </div>
    <?php
        }
    ?>

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <button id="btn-submit" class="btn btn-primary btn-form" type="submit"><?= $btn ?></button>
        <button id="btn-discard" class="btn btn-danger btn-form" type="button">Descartar</button>
    </div>
</form>

<script>
    $(document).ready(function() {

        var msgRequired = "Este campo es obligatorio";
        var msgNumber = "El registro debe ser un número valido";

        $.post("request/pais.php", {action: "readActive"}, function (data) {

            var result = jQuery.parseJSON(data);
            var htmlOption = "<option value=\"\">Seleccione una opción</option>";

            $.each(result.resultado, function(idx, obj){
            htmlOption += "<option value=\"" + obj.pk_pais_id + "\">" + obj.codigo + ", " + obj.nombre + "</option>"
            });

            $('#fk_pais_id').html(htmlOption);
            $('#fk_pais_id').selectpicker();

        });

        $('#fk_departamento_id').selectpicker();
        $('#fk_ciudad_id').selectpicker();

        <?php
            if (isset($_GET["id"])) {
        ?>
        
        $.post("request/filial.php", {action: "getById", id: <?= $id ?>}, function (data) {

            var result = jQuery.parseJSON(data).resultado[0];

            $(".nombre").val(result.nombre);
            $(".direccion").val(result.direccion);
            $(".telefono").val(result.telefono);

            $("#fk_pais_id").selectpicker('val', result.fk_pais_id);

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
                    
                    $.post("request/filial.php", {action: "getById", id: <?= $id ?>}, function (data) {

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
                    
                    $.post("request/filial.php", {action: "getById", id: <?= $id ?>}, function (data) {

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
                direccion: {
                    required: true
                },
                telefono: {
                    required: true,
                    number: true
                }
                <?php
                    if (isset($_GET["id"])) {
                ?>
                ,estado: {
                    required: true
                }
                <?php
                    }
                ?>
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
                nombre: {
                    required: msgRequired
                },
                direccion: {
                    required: msgRequired
                },
                telefono: {
                    required: msgRequired,
                    number: msgNumber
                }
                <?php
                    if (isset($_GET["id"])) {
                ?>
                ,estado: {
                    required: msgRequired
                }
                <?php
                    }
                ?>
            }
        });

        $("#form").on('submit', function(e) {
            e.preventDefault();

            var isvalid = $(this).valid();

            if (isvalid) 
                formAction("request/filial.php", $(this).serialize(), "?op=list_filial");
        });

        $("#btn-discard").click(function(e){
            e.preventDefault();
            discardAction("?op=list_filial");
        });
    });
</script>
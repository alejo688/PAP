<?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $action = "update";
        $titulo = "Editar Ciudad";
        $btn = "Editar";
    }
    else
    {
        $id = "";
        $action = "create";
        $titulo = "Nueva Ciudad";
        $btn = "Crear";
    }
?>

<form id="form" method="post" class="well bs-component col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
    <h2 class="titulo"><?= $titulo ?></h2>

    <input name="action" type="hidden" value="<?= $action ?>">

    <input id="pk_ciudad_id" name="pk_ciudad_id" type="hidden" value="<?= $id ?>">

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
            <label>Codigo</label>
            <input name="codigo" type="text" class="form-control codigo" placeholder="Ingrese el codigo del país" required>
            <label for="codigo" generated="true" class="error"></label>
        </div>
    </div>

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Nombre</label>
            <input name="nombre" type="text" class="form-control nombre" placeholder="Ingrese el nombre del país" required>
            <label for="nombre" generated="true" class="error"></label>
        </div>

        <?php
            if (isset($_GET["id"])) {
        ?>
        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Estado</label>
            <select id="estado" class="form-control estado" name="estado" data-live-search="true" required>
                <option value="">Seleccione una opción</option>
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
            <label for="estado" generated="true" class="error"></label>
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

        <?php
            if (isset($_GET["id"])) {
        ?>
        
        $.post("request/ciudad.php", {action: "getById", id: <?= $id ?>}, function (data) {
            
            var result = jQuery.parseJSON(data).resultado[0];

            $(".codigo").val(result.codigo);
            $(".nombre").val(result.nombre);

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
                    
                    $.post("request/ciudad.php", {action: "getById", id: <?= $id ?>}, function (data) {

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

        /* validador */

        $("#form").validate({
            rules: {
                fk_pais_id: {
                    required: true
                },
                fk_departamento_id: {
                    required: true
                },
                codigo: {
                    required: true
                },
                nombre: {
                    required: true
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
                codigo: {
                    required: msgRequired
                },
                nombre: {
                    required: msgRequired
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
                formAction("request/ciudad.php", $(this).serialize(), "?op=list_ciudad");
        });

        $("#btn-discard").click(function(e){
            e.preventDefault();
            discardAction("?op=list_ciudad");
        });
    });
</script>
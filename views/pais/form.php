<?php

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $action = "update";
        $titulo = "Editar País";
        $btn = "Editar";
    }
    else
    {
        $id = "";
        $action = "create";
        $titulo = "Nuevo País";
        $btn = "Crear";
    }
?>


<form id="form" method="post" class="well bs-component col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
    <h2 class="titulo"><?= $titulo ?></h2>

    <input name="action" type="hidden" value="<?= $action ?>">

    <input id="pk_pais_id" name="pk_pais_id" type="hidden" value="<?= $id ?>">

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Codigo</label>
            <input name="codigo" type="text" class="form-control codigo" placeholder="Ingrese el codigo del país" required>
            <label for="codigo" generated="true" class="error"></label>
        </div>

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

        <?php
            if (isset($_GET["id"])) {
        ?>
        
        $.post("request/pais.php", {action: "getById", id: <?= $id ?>}, function (data) {

            var result = jQuery.parseJSON(data).resultado[0];

            $(".codigo").val(result.codigo);
            $(".nombre").val(result.nombre);

            $('#estado').selectpicker();
            $("#estado").selectpicker('val', result.estado);

        });

        <?php
            }
        ?>

        /* validador */

        $("#form").validate({
            rules: {
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
                formAction("request/pais.php", $(this).serialize(), "?op=list_pais");
        });

        $("#btn-discard").click(function(e){
            e.preventDefault();
            discardAction("?op=list_pais");
        });
    });
</script>
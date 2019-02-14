<?php

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $action = "update";
        $titulo = "Editar Plan";
        $btn = "Editar";
    }
    else
    {
        $id = "";
        $action = "create";
        $titulo = "Nuevo Plan";
        $btn = "Crear";
    }
?>

<form id="form" method="post" class="well bs-component col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
    <h2 class="titulo"><?= $titulo ?></h2>

    <input name="action" type="hidden" value="<?= $action ?>">

    <input id="pk_plan_id" name="pk_plan_id" type="hidden" value="<?= $id ?>">

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Nombre</label>
            <input name="nombre" type="text" class="form-control nombre" placeholder="Ingrese el nombre del plan" required>
            <label for="nombre" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Tipo</label>
            <select id="tipo" class="form-control tipo" name="tipo" data-live-search="true" required>
                <option value="">Seleccione una opción</option>
                <option value="1">Unimodular</option>
                <option value="2">Bimodular</option>
                <option value="3">Trimodular</option>
                <option value="4">Integral</option>
            </select>
            <label for="tipo" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Valor Inicial</label>
            <input name="inicial" type="text" class="form-control inicial" placeholder="Ingrese el valor inicial" required>
            <label for="inicial" generated="true" class="error"></label>
        </div>
    </div>

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Valor Total</label>
            <input name="valor_total" type="text" class="form-control valor_total" placeholder="Ingrese el valor total" required>
            <label for="valor_total" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Saldo</label>
            <input name="saldo" type="text" class="form-control saldo" placeholder="Ingrese el saldo">
            <label for="saldo" generated="true" class="error"></label>
        </div>

        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Cuotas</label>
            <input name="cuotas" type="text" class="form-control cuotas" placeholder="Ingrese el numero de cuotas">
            <label for="cuotas" generated="true" class="error"></label>
        </div>
    </div>

    <div class="box-form col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <label>Cuota Mensual</label>
            <input name="cuota_mensual" type="text" class="form-control cuota_mensual" placeholder="Ingrese el valor de la cuota mensual">
            <label for="cuota_mensual" generated="true" class="error"></label>
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
        var msgMin = "El valor minimo requerido es 0";
        var msgNumber = "El registro debe ser un número valido";

        $('#tipo').selectpicker();

        <?php
            if (isset($_GET["id"])) {
        ?>
        
        $.post("request/plan.php", {action: "getById", id: <?= $id ?>}, function (data) {

            var result = jQuery.parseJSON(data).resultado[0];

            $(".nombre").val(result.nombre);
            $(".inicial").val(result.inicial);
            $(".valor_total").val(result.valor_total);
            $(".saldo").val(result.saldo);
            $(".cuotas").val(result.cuotas);
            $(".cuota_mensual").val(result.cuota_mensual);

            $("#tipo").selectpicker('val', result.tipo);

            $('#estado').selectpicker();
            $("#estado").selectpicker('val', result.estado);

        });

        <?php
            }
        ?>

        /* validador */

        $("#form").validate({
            rules: {
                nombre: {
                    required: true
                },
                tipo: {
                    required: true
                },
                inicial: {
                    required: true,
                    number: true,
                    min: 0
                },
                valor_total: {
                    required: true,
                    number: true,
                    min: 0
                },
                saldo: {
                    number: true,
                    min: 0
                },
                cuotas: {
                    number: true,
                    min: 0
                },
                cuota_mensual: {
                    number: true,
                    min: 0
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
                nombre: {
                    required: msgRequired
                },
                tipo: {
                    required: msgRequired
                },
                inicial: {
                    required: msgRequired,
                    number: msgNumber,
                    min: msgMin
                },
                valor_total: {
                    required: msgRequired,
                    number: msgNumber,
                    min: msgMin
                },
                saldo: {
                    number: msgNumber,
                    min: msgMin
                },
                cuotas: {
                    number: msgNumber,
                    min: msgMin
                },
                cuota_mensual: {
                    number: msgNumber,
                    min: msgMin
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
                formAction("request/plan.php", $(this).serialize(), "?op=list_plan");
        });

        $("#btn-discard").click(function(e){
            e.preventDefault();
            discardAction("?op=list_plan");
        });

    });
</script>
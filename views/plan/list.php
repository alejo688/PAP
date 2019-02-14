<div id="header-list" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h1>Planes</h1>
</div>

<div id="box-list" class="well bs-component col-lg-10 col-lg-offset-1 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
    <a href="?op=new_plan" id="btn-add" class="btn btn-success btn-fab">
        <i class="mdi-content-add"></i>
    </a>

    <table id="grid-data" class="table table-condensed table-hover table-striped" style="width: 100%">
        <thead>
            <tr>
                <th data-column-id="pk_plan_id" data-type="numeric">ID</th>
                <th data-column-id="nombre">Nombre</th>
                <th data-column-id="tipo">Tipo</th>
                <th data-column-id="inicial">Inicial</th>
                <th data-column-id="valor_total">Valor Total</th>
                <th data-column-id="estado">Estado</th>
                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Opciones</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script>

    $(document).ready(function(){
        $.post("request/plan.php", {action: "read"}, function (data) {
            var result = jQuery.parseJSON(data);
            var tableId = 'grid-data';
            
            if (result.estado = 1 && result.resultado != null) {
                $.each(result.resultado, function (key, obj) {
                    $("#" + tableId + ' tbody').append('<tr>' +
                        '<td>' + obj.pk_plan_id + '</td>' +
                        '<td>' + obj.nombre + '</td>' +
                        '<td>' + obj.tipo + '</td>' +
                        '<td>' + obj.inicial + '</td>' +
                        '<td>' + obj.valor_total + '</td>' +
                        '<td>' + obj.estado + '</td>' +
                        '<td>' +
                        '<button type="button" class="btn btn-xs btn-default" command="edit" data-row-id="' + obj.pk_plan_id + '"><span class="glyphicon glyphicon-pencil"></span></button>' +
                        '<button type="button" class="btn btn-xs btn-default" command="delete" data-row-id="' + obj.pk_plan_id + '"><span class="glyphicon glyphicon-trash"></span></button>' +
                        '</td>' +
                        '</tr>');
                });
            }

            DataTable(tableId);

            $('#' + tableId + ' tbody').on('click', 'button', function () {
                var action = $(this).attr("command");
                var id = $(this).attr("data-row-id");

                DataTableActions(action, id, "edit_plan", "request/plan.php");
            });
        });
    });
</script>
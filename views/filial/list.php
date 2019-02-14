<div id="header-list" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h1>Filial</h1>
</div>

<div id="box-list" class="well bs-component col-lg-10 col-lg-offset-1 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">

    <a href="?op=new_filial" id="btn-add" class="btn btn-success btn-fab">
        <i class="mdi-content-add"></i>
    </a>

    <table id="grid-data" class="table table-condensed table-hover table-striped" style="width:100%">
        <thead>
            <tr>
                <th data-column-id="pk_filial_id" data-type="numeric">ID</th>
                <th data-column-id="pais">País</th>
                <th data-column-id="departamento">Departamento</th>
                <th data-column-id="ciudad">Ciudad</th>
                <th data-column-id="nombre">Nombre</th>
                <th data-column-id="direccion">Dirección</th>
                <th data-column-id="telefono">Teléfono</th>
                <th data-column-id="estado">Estado</th>
                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Opciones</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script>

    $(document).ready(function(){
        $.post("request/filial.php", {action: "read"}, function (data) {
            var result = jQuery.parseJSON(data);
            var tableId = 'grid-data';
            
            if (result.estado = 1 && result.resultado != null) {
                $.each(result.resultado, function (key, obj) {
                    $("#" + tableId + ' tbody').append('<tr>' +
                        '<td>' + obj.pk_filial_id + '</td>' +
                        '<td>' + obj.pais + '</td>' +
                        '<td>' + obj.departamento + '</td>' +
                        '<td>' + obj.ciudad + '</td>' +
                        '<td>' + obj.nombre + '</td>' +
                        '<td>' + obj.direccion + '</td>' +
                        '<td>' + obj.telefono + '</td>' +
                        '<td>' + obj.estado + '</td>' +
                        '<td>' +
                        '<button type="button" class="btn btn-xs btn-default" command="edit" data-row-id="' + obj.pk_filial_id + '"><span class="glyphicon glyphicon-pencil"></span></button>' +
                        '<button type="button" class="btn btn-xs btn-default" command="delete" data-row-id="' + obj.pk_filial_id + '"><span class="glyphicon glyphicon-trash"></span></button>' +
                        '</td>' +
                        '</tr>');
                });
            }

            DataTable(tableId);

            $('#' + tableId + ' tbody').on('click', 'button', function () {
                var action = $(this).attr("command");
                var id = $(this).attr("data-row-id");

                DataTableActions(action, id, "edit_filial", "request/filial.php");
            });

        });
    });
</script>
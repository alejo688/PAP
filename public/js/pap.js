/*(function ($) {
    $.fn.serializeFormJSON = function () {

        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
})(jQuery);*/


function DataTable(table) {
    $('#' + table).DataTable({
        /*columnDefs: [
            {
            orderable: false,
            className: 'select-checkbox',
            targets: 0
        },
        {
            "targets": [4],
            "visible": false,
            "searchable": false
        }
        ],
        select: {
            style: 'multi',
            selector: 'td:first-child'
        },*/
        select: false,
        scrollX: true,
        scrollY: true,
        pageLength: 10,
        order: [[0, "desc"]],
        dom: 'Bfrtip',
       /* buttons: [
            'selectAll',
            'selectNone',
            {
                extend: 'excelHtml5',
                text: 'Exportar Items',
                className: 'excelButton',
                customize: function (xlsx) {
                    var sheet = xlsx.xl.worksheets['ItemList.xml'];
                    $('row c[r^="C"]', sheet).attr('s', '2');
                }
            }
        ],*/
        language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sUrl: "",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
                sFirst: "Primero",
                sLast: "Último",
                sNext: "Siguiente",
                sPrevious: "Anterior"
            },
            oAria: {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }/*,
            buttons: {
                selectAll: "Selec.. Todo",
                selectNone: "Quitar Selec.."
            }*/
        }
    });
}

function DataTableActions(action, id, editAction, route) {
    if (action == "edit") {
        location.href = "?op=" + editAction + "&id=" + id;
    } else if (action == "delete") {
        bootbox.confirm("Esta seguro que desea eliminar este registro?", function (result) {
            if (result == true) {
                $.post(route, { action: "delete", id: id }, function (data) {
                    var result = jQuery.parseJSON(data);
                    bootbox.hideAll();
                    bootbox.alert(result.mensaje, function () {
                        location.reload();
                    });
                });
            }
        });
    }
}

function formAction(route, formData, routeExit) {
    $.post(route, formData, function(data) {
        var result = jQuery.parseJSON(data);

        if (result.estado == 0){
            bootbox.alert(result.mensaje);
            console.log(result.error);
        } else {
            bootbox.alert(result.mensaje, function() {
                //location.href = routeExit;
                console.log(result.resultado);
            });
        }
    });
}

function discardAction(route) {
    bootbox.confirm({
        message: "¿Esta seguro que desea salir de este formulario?",
        buttons: {
            confirm: {
                label: 'Sí',
                className: 'btn-success'
            },
            cancel: {
                label: 'No',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result){
                location.href = route;
            }
        }
    });
}
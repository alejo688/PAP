<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12" style="margin-top:5%; margin-bottom:5%;">
    <form id="login" class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Iniciar sesión</h3>
        </div>
        <div class="panel-body">
            <input name="action" type="hidden" value="login">
            <div class="form-group">
                <label>Usuario</label>
                <input name="username" type="email" class="form-control" placeholder="Ingrese su usuario" required>
            </div>
            <div class="form-group">
                <label>Contraseña</label>
                <input name="password" type="password" class="form-control" placeholder="Ingrese su contraseña" required>
            </div>
        </div>
        <div class="panel-footer text-center">
            <button class="btn btn-primary" type="submit">Ingresar</button>
        </div>
    </form>
</div>

<script>
    $(document).ready(function() {
        $("#login").validate({
            rules: {
                user: {
                    required: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                user: {
                    required: "El campo usuario es obligatorio"
                },
                password: {
                    required: "El campo contraseña es obligatorio"
                }
            }
        }); 

        $("#login").on('submit', function(e) {
            var isvalid = $(this).valid();
            if (isvalid) {
                e.preventDefault();
                $.post("request/usuario.php", $(this).serialize(), function(data) {
                    
                    var result = jQuery.parseJSON(data);

                    if (result.estado == 0){
                        bootbox.alert(result.mensaje);
                    } else {
                        location.reload();
                    }
                })
            }
        });
    });
</script>
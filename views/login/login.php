<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12" style="margin-top:5%; margin-bottom:5%;">
    <form id="login" class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Iniciar sesión</h3>
        </div>
        <div class="panel-body">
            <input name="action" type="hidden" value="login">
            <div class="form-group">
                <label>Correo</label>
                <input name="correo" type="email" class="form-control" placeholder="Ingrese su correo" required>
            </div>

            <div class="form-group">
                <label>Perfil</label>
                <select id="perfil" class="form-control perfil" name="perfil" data-live-search="true" required>
                    <option value="">Seleccione una opción</option>
                    <option value="1">Coordinador</option>
                    <option value="2">Docente</option>
                    <option value="3">Estudiante</option>
                    <option value="4">Gerente</option>
                    <option value="5">Registro y control</option>
                    <option value="6">Servicio al cliente</option>
                    <option value="7">Visualizador</option>
                </select>
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
                correo: {
                    required: true
                },
                tipo: {
                    required: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                correo: {
                    required: "El campo usuario es obligatorio"
                },
                tipo: {
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
                $.post("request/login.php", $(this).serialize(), function(data) {
                    
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
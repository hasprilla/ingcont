

    <div class="container ">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                          <h1 class="h4 text-gray-900 mb-4">Iniciar sesión</h1>
                                    </div>
                                    <form class="user" id="sesionb">
                                      <div style="display: none" class="alert alert-danger fade show notificacion-danger display-none" role="alert"> </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                name="usuario" id="usuario"
                                                placeholder="Correo electrónico *" data-validation="required" >
                                                  <span id="error_usuario" class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                  name="clave" id="clave" placeholder="Contraseña *" data-validation="required">
                                                    <span id="error_clave" class="text-danger"></span>
                                        </div>

                                        <button id="sesion" type="button" class="btn btn-primary btn-user btn-block" name="button">Iniciar sesión</button>

                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Has olvidado tu contraseña?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <script type="text/javascript">
    $(document).ready(function(){
      $flag=1;
        $("#usuario").keyup(function(){
          if($(this).val()==''){
              $(this).css("border-color", "#FF0000");
                 $("#error_usuario").text("* Este campo es obligatorio.");
            }
            else
            {
              $(this).css("border-color", "#2eb82e");
              $("#error_usuario").text("");

            }
         });
          $("#clave").keyup(function(){
          if($(this).val()==''){
              $(this).css("border-color", "#FF0000");
                $("#error_clave").text("* Este campo es obligatorio.");
            }
            else
            {
              $(this).css("border-color", "#2eb82e");
              $("#error_clave").text("");
            }
         });

        $( "#sesion" ).click(function() {
          if($("#usuario" ).val()=='')
          {
              $("#usuario").css("border-color", "#FF0000");
                 $("#error_usuario").text("* Este campo es obligatorio.");
            }
            if($("#clave" ).val()=='')
            {
              $("#clave").css("border-color", "#FF0000");
                 $("#error_clave").text("* Este campo es obligatorio.");
            }
            if($("#usuario" ).val()!='' && $("#usuario" ).val()!='')
            {
              iniciarSesion();
            }
        });

    });
    </script>

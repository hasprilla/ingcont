<style>
   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 0px !important;

}
   </style>
<div class="d-grid gap-2 d-md-flex">
  <button type="button" class="btn btn-sm btn-success mr-1 " data-toggle="modal" data-target="#formulario"  onclick="hideproceso('1')">
     Nuevo
  </button>
</div>
<hr>


<div class="table-responsive">

  <table id="dataTables_examplebienes" class="table table-striped table-bordered dt-responsive dataTables_examplebienes" style="width:100%">
     <thead>
       <tr>
         <th>ID</th>
         <th>TIPO DOCUMENTO</th>
         <th>NUMERO DE DOCUMENTO</th>
         <th>RAZÓN SOCIAL</th>
         <th>CORREO ELECTRÓNICO</th>
         <th>TELÉFONO</th>
         <th>ACCIÓN</th>
       </tr>
     </thead>
  </table>
</div>

<div class="modal fade modal-fullscreen" id="formulario" tabindex="-1" role="dialog" aria-labelledby="formularioLabel" aria-hidden="true">
   <div class="modal-dialog ">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="formularioLabel">Clientes
            </h5>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button type="button" class="pull-right btn btn-sm btnprocesar" style="margin-right: 4px;" onclick="procesar('newclients', 'datatabledriu/')"> </button>
              <button type="button" class="pull-right btn btn-sm btn-danger mr-1" data-dismiss="modal">Cerrar</button>
            </div>
         </div>
         <div class="modal-body">

           <form class="row g-3 newclients" id="newclients">

           <input id="id" name="id" class="form-control" type="hidden" readonly="readonly">
              <input id="idtt" name="idtt" class="form-control" value="1" type="hidden" readonly="readonly">
              <input id="procesar" name="procesar" class="form-control" value="" type="hidden" readonly="readonly">
              <input id="procesarr" name="procesarr" class="form-control" value="personas" type="hidden" readonly="readonly">

           <div class="col-md-6 my-1 input-group">
             <div class="input-group-append">
                 <button class="btn btn-secondary" type="button">
                     <i class="fa fa-list"></i>
                 </button>
             </div>
             <select class="selectpicker form-control" name="tipoide" id="tipoide">
             </select>
           </div>

             <div class="col-md-6 my-1 input-group">
               <div class="input-group-append">
                   <button class="btn btn-secondary" type="button">
                       <i class="fa fa-list-alt"></i>
                   </button>
               </div>
               <input id="nombre1" name="nombre1" class="form-control" required="true" value="" type="text" placeholder="Razón social">
             </div>

             <div class="col-md-6 my-1 input-group">
               <div class="input-group-append">
                   <button class="btn btn-secondary" type="button">
                       <i class="fa fa-hashtag"></i>
                   </button>
               </div>
               <input id="identifica" name="identifica" class="form-control" required="true" value="" type="text" placeholder="Numero de documento">
             </div>

             <div class="col-md-6 my-1 input-group">
               <div class="input-group-append">
                   <button class="btn btn-secondary" type="button">
                       <i class="fa fa-map-marker"></i>
                   </button>
               </div>
               <input id="direccion" name="direccion" class="form-control" required="true" value="" type="text" placeholder="Dirección">
             </div>

             <div class="col-md-6 my-1 input-group">
               <div class="input-group-append">
                   <button class="btn btn-secondary" type="button">
                       <i class="fa fa-list"></i>
                   </button>
               </div>
               <select class="selectpicker form-control" name="tipocontri" id="tipocontri">
               </select>
             </div>

             <div class="col-md-6 my-1 input-group">
               <div class="input-group-append">
                   <button class="btn btn-secondary" type="button">
                       <i class="fa fa-list"></i>
                   </button>
               </div>
               <select class="selectpicker form-control" name="pais" id="pais">
               </select>
             </div>

             <div class="col-md-6 my-1 input-group">
               <div class="input-group-append">
                   <button class="btn btn-secondary" type="button">
                       <i class="fa fa-list"></i>
                   </button>
               </div>
               <select class="selectpicker form-control" name="regimencontable" id="regimencontable">
               </select>
             </div>

             <div class="col-md-6 my-1 input-group">
               <div class="input-group-append">
                   <button class="btn btn-secondary" type="button">
                       <i class="fa fa-list"></i>
                   </button>
               </div>
               <select class="selectpicker form-control" name="coddepto" id="coddepto">
               </select>
             </div>

             <div class="col-md-6 my-1 input-group">
               <div class="input-group-append">
                   <button class="btn btn-secondary" type="button">
                       <i class="fa fa-list"></i>
                   </button>
               </div>
               <select class="selectpicker form-control" name="tipotresponsa" id="tipotresponsa">
               </select>
             </div>

             <div class="col-md-6 my-1 input-group">
               <div class="input-group-append">
                   <button class="btn btn-secondary" type="button">
                       <i class="fa fa-list"></i>
                   </button>
               </div>
               <select class="selectpicker form-control" name="mupio" id="mupio">
               </select>
             </div>

             <div class="col-md-6 my-1 input-group">
               <div class="input-group-append">
                   <button class="btn btn-secondary" type="button">
                       <i class="fa fa-list-alt"></i>
                   </button>
               </div>
               <input id="nombrecomer" name="nombrecomer" class="form-control" required="true" value="" type="text" placeholder="Nombre comercial">
             </div>

             <div class="col-md-6 my-1 input-group">
               <div class="input-group-append">
                   <button class="btn btn-secondary" type="button">
                       <i class="fa fa-at"></i>
                   </button>
               </div>
              <input id="correo" name="correo" class="form-control" required="true" value="" type="text" placeholder="Correo electronico">
             </div>

             <div class="col-md-6 my-1 input-group">
               <div class="input-group-append">
                   <button class="btn btn-secondary" type="button">
                       <i class="fa fa-list"></i>
                   </button>
               </div>
               <select class="selectpicker form-control" name="responsabilidadtributaria" id="responsabilidadtributaria">
               </select>
             </div>

             <div class="col-md-6 my-1 input-group">
               <div class="input-group-append">
                   <button class="btn btn-secondary" type="button">
                       <i class="fa fa-phone-alt"></i>
                   </button>
               </div>
              <input id="telefono" name="telefono" class="form-control" required="true" value="" type="text" placeholder="Telefono">
             </div>

        </form>
        
         </div>
      </div>
   </div>
</div>


<script type="text/javascript" class="init">
var table;
  $(document).ready(function() {

      datatablelist();

      $("#dataTables_examplebienes").on('hidden.bs.modal', function () {
           table.ajax.reload(function () {
              $(".paginate_button > a").on("focus", function () {
                 $(this).blur();
              });
           }, false);
        });

        $('#dataTables_examplebienes tbody').on('click', 'tr', function () {
           table.$('tr.selected').removeClass('selected');
           $(this).addClass('selected');
           mostrarf("personas",table.row('.selected').data()[0],"newclients", "datatabledriu/");
        });

        $("#dataTables_examplebienes").on('hidden.bs.modal', function () {
           table.ajax.reload(function () {
              $(".paginate_button > a").on("focus", function () {
                 $(this).blur();
              });
           }, false);
        });

  });

function datatablelist() {

          cargarCombo(urlBase+"combox/", "newclients", "tipoide", true, "Tipo de documento");
          cargarCombo(urlBase+"combox/", "newclients", "tipocontri", true, "Tipo de contribuyente");
          cargarCombo(urlBase+"combox/", "newclients", "regimencontable", true, "Regimen contable");
          cargarCombo(urlBase+"combox/", "newclients", "tipotresponsa", true, "Tipo de reponsabilidad");
          cargarCombo(urlBase+"combox/", "newclients", "responsabilidadtributaria", true, "Responsabilidad tributaria");
          cargarCombo(urlBase+"combox/", "newclients", "pais", true, "Pais");

          $(document).on('change', '#pais', function (event) {
            cargarCombo(urlBase+"combox/", "newclients", "coddepto", true, "Departamento", $("#pais").val());
          });

          $(document).on('change', '#coddepto', function (event) {
            cargarCombo(urlBase+"combox/", "newclients", "mupio", true, "Ciudad", $("#coddepto").val());
          });

         table = $('#dataTables_examplebienes').DataTable({
          "bDestroy": true,
          stateSave: true,
           "language": {
              "decimal": "",
              "emptyTable": "No hay información",
              "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
              "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
              "infoFiltered": "(Filtrado de _MAX_ total entradas)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Entradas",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscar:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                 "first": "Primero",
                 "last": "Ultimo",
                 "next": "Siguiente",
                 "previous": "Anterior"
              }
           },
           "ajax": {
               "url": urlBase+"datatable/",
               "type": "POST",
               "data": {"listar": 'per'}
           },
           "columns": [
               { "data": "id" },
               { "data": "tipoide" },
               { "data": "identifica" },
               { "data": "nombre1" },
               { "data": "correo" },
               { "data": "telefono" },
               {
                    data: null,
                    className: "center",
                    defaultContent: '<button type="button" class="btn btn-warning btnmodificarr" data-toggle="modal" data-target="#formulario" id="btnmodificarr" onclick="hideproceso(2)"><i class="fa fa-edit"></i> </button>'
                    // defaultContent: '<button type="button" class="btn btn-warning btnmodificarr" data-toggle="modal" data-target="#myFormTable" id="btnmodificarr" onclick="bmodificar();"><span class="glyphicon glyphicon-edit"></span> </button> <button type="button" class="btn btn-danger btneliminarr" data-toggle="modal" data-target="#myFormTable" id="btneliminarr" onclick="beliminar();"><span class="glyphicon glyphicon-trash"></span> </button>'
                }
           ],
           "order": [[0, "desc"]],
           select: true,
              responsive: true,
                 buttons: [

                 ]
     });
}
</script>

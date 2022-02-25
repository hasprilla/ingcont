<style>
   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 0px !important;

}
   </style>
<div class="d-grid gap-2 d-md-flex">
  <button type="button" class="btn btn-sm btn-success mr-1" data-toggle="modal" data-target="#menu" onclick="hideproceso('1')">
     Nuevo
  </button>
</div>
<hr>


<div class="table-responsive">


  <table id="dataTables_men" class="table table-striped table-bordered dt-responsive dataTables_men" style="width:100%">
     <thead>
       <tr>
         <th>ID</th>
         <th>CÓDIGO</th>
         <th>PADRE</th>
         <th>NOMBRE</th>
         <th>RUTA</th>
         <th>ORDEN</th>
         <th>ESTADO</th>
         <!-- <th>TIPO DE ARCHIVO</th>
         <th>ICONO</th>
         <th>NOMBRE DE LA TABLA</th>
         <th>CONSULTA SQL</th> -->
         <th></th>
       </tr>
     </thead>
  </table>

</div>


<div class="modal fade modal-fullscreen" id="menu" tabindex="-1" role="dialog" aria-labelledby="menuLabel" aria-hidden="true">
   <div class="modal-dialog ">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="menuLabel">Menu
            </h5>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button type="button" class="pull-right btn btn-sm btnprocesar" style="margin-right: 4px;" onclick="procesar('formulario', 'datatabledriu/')"> </button>
              <button type="button" class="pull-right btn btn-sm btn-danger mr-1" data-dismiss="modal">Cerrar</button>
            </div>
         </div>
         <div class="modal-body">

          <form class="row g-3 formulario" id="formulario">
          <input id="id" name="id" class="form-control" type="hidden" readonly="readonly">
          <input id="idt" name="idt" class="form-control" value="men" type="hidden" readonly="readonly">
          <input id="procesar" name="procesar" class="form-control" value="" type="hidden" readonly="readonly">
               <div class="col-md-6 my-1 input-group">
                   <div class="input-group-append">
                       <button class="btn btn-secondary" type="button">
                           <i class="fa fa-list-alt"></i>
                       </button>
                   </div>
                   <input id="codigo" name="codigo" class="form-control" required="true" value="" type="text" readonly="readonly" placeholder="Codigo">
                 </div>

               <div class="col-md-6 my-1 input-group">
                 <div class="input-group-append">
                     <button class="btn btn-secondary" type="button">
                         <i class="fa fa-list"></i>
                     </button>
                 </div>
                 <select class="form-control padre" name="padre" id="padre">
                 </select>
               </div>

                 <div class="col-md-6 my-1 input-group">
                   <div class="input-group-append">
                       <button class="btn btn-secondary" type="button">
                           <i class="fa fa-list-alt"></i>
                       </button>
                   </div>
                   <input id="nombre" name="nombre" class="form-control" required="true" value="" type="text" placeholder="Nombre">
                 </div>

                 <div class="col-md-6 my-1 input-group">
                   <div class="input-group-append">
                       <button class="btn btn-secondary" type="button">
                           <i class="fa fa-hashtag"></i>
                       </button>
                   </div>
                   <input id="ruta" name="ruta" class="form-control" required="true" value="" type="text" placeholder="Ruta">
                 </div>

                 <div class="col-md-6 my-1 input-group">
                   <div class="input-group-append">
                       <button class="btn btn-secondary" type="button">
                           <i class="fa fa-map-marker"></i>
                       </button>
                   </div>
                   <input id="orden" name="orden" class="form-control" required="true" value="" type="text" placeholder="Orden">
                 </div>

                 <div class="col-md-6 my-1 input-group">
                   <div class="input-group-append">
                       <button class="btn btn-secondary" type="button">
                           <i class="fa fa-list"></i>
                       </button>
                   </div>
                   <select class="selectpicker form-control" name="estado" id="estado">
                   </select>
                 </div>

                 <div class="col-md-6 my-1 input-group">
                   <div class="input-group-append">
                       <button class="btn btn-secondary" type="button">
                           <i class="fa fa-list"></i>
                       </button>
                   </div>
                   <select class="selectpicker form-control" name="visibilidad" id="visibilidad">
                   </select>
                 </div>

                 <div class="col-md-6 my-1 input-group">
                   <div class="input-group-append">
                       <button class="btn btn-secondary" type="button">
                           <i class="fa fa-list"></i>
                       </button>
                   </div>
                   <select class="selectpicker form-control" name="sistema" id="sistema">
                   </select>
                 </div>

                 <div class="col-md-6 my-1 input-group">
                   <div class="input-group-append">
                       <button class="btn btn-secondary" type="button">
                           <i class="fa fa-list-alt"></i>
                       </button>
                   </div>
                   <input id="icono" name="icono" class="form-control" required="true" value="" type="text" placeholder="Icono">
                 </div>

                 <div class="col-md-6 my-1 input-group">
                   <div class="input-group-append">
                       <button class="btn btn-secondary" type="button">
                           <i class="fa fa-at"></i>
                       </button>
                   </div>
                  <input id="tablas" name="tablas" class="form-control" required="true" value="" type="text" placeholder="Nombre de tabla">
                 </div>

                 <div class="col-md-12 my-1 input-group">
                   <div class="input-group-append">
                       <button class="btn btn-secondary" type="button">
                           <i class="fa fa-phone-alt"></i>
                       </button>
                   </div>
                   <textarea name="consulta" id="consulta" class="form-control" cols="10" rows="2" placeholder="Consulta sql"></textarea>
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

      $("#dataTables_men").on('hidden.bs.modal', function () {
           table.ajax.reload(function () {
              $(".paginate_button > a").on("focus", function () {
                 $(this).blur();
              });
           }, false);
        });

        $('#btnmodificarr, #dataTables_men tbody').on('click', 'tr', function () {
          table.$('tr.selected').removeClass('selected');
          $(this).addClass('selected');
          mostrarf("admin_menu",table.row('.selected').data()[0],"formulario", "datatabledriu/");
        });

        $("#dataTables_men").on('hidden.bs.modal', function () {
           table.ajax.reload(function () {
              $(".paginate_button > a").on("focus", function () {
                 $(this).blur();
              });
           }, false);
        });

        reloadCombox();
    

       

  });

function datatablelist() {
        cargarCombo(urlBase+"combox/", "formulario", "padre", true, "Seleccione el padre");
        cargarCombo(urlBase+"combox/", "formulario", "estado", true, "Seleccione el estado");
        cargarCombo(urlBase+"combox/", "formulario", "visibilidad", true, "Seleccione la visibilidad");
        cargarCombo(urlBase+"combox/", "formulario", "sistema", true, "Seleccione el sistema");
         table = $('#dataTables_men').DataTable({
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
               "data": {"listar": 'men'}
           },
           "columns": [
               { "data": "id" },
               { "data": "codigo" },
               { "data": "padre" },
               { "data": "nombre" },
               { "data": "ruta" },
               { "data": "orden" },
               { "data": "estado" },
              //  { "data": "descripcion" },
              //  { "data": "cod_tipobien" },
              //  { "data": "cod_impuesto" },
              //  { "data": "cod_impuesto" },
               {
                    data: null,
                    className: "center",
                    defaultContent: '<button type="button" class="btn btn-warning btnmodificarr" data-toggle="modal" data-target="#menu" id="btnmodificarr" onclick="hideproceso(2)"><i class="fa fa-edit"></i> </button>'
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

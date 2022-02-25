<style>
   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 0px !important;

}
   </style>
<div class="d-grid gap-2 d-md-flex">
  <button type="button" class="btn btn-sm btn-success mr-1 " data-toggle="modal" data-target="#formulario">
     Nuevo
  </button>
</div>
<hr>


<div class="table-responsive">


  <table id="dataTables_examplebienes" class="table table-striped table-bordered dt-responsive dataTables_examplebienes" style="width:100%">
     <thead>
       <tr>
         <th>ID</th>
         <th>CÓDIGO</th>
         <th>DESCRIPCIÓN</th>
         <!-- <th>PRECIO</th> -->
         <th>TIPO DE BIEN</th>
         <th>AFECTACIÓN</th>
       </tr>
     </thead>
  </table>

</div>

<div class="modal fade modal-fullscreen" id="formulario" tabindex="-1" role="dialog" aria-labelledby="formularioLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="formularioLabel">Nuevo bien y/o servicio

            </h5>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button type="button" class="pull-right btn btn-sm btn-success mr-1" onclick="formulario()">Guardar</button>
              <button type="button" class="pull-right btn btn-sm btn-danger " data-dismiss="modal">Cerrar</button>
            </div>
         </div>
         <div class="modal-body">
            <form class="row g-3 newbienser" id="newbienser">
              <input id="idtb" name="idtb" type="hidden" value="3">
               <div class="col-md-6 my-1 input-group">
                 <div class="input-group-append">
                     <button class="btn btn-secondary" type="button">
                         <i class="fa fa-barcode"></i>
                     </button>
                 </div>
                  <input id="codigo" name="codigo" class="form-control" required="true" value="" type="text" placeholder="Código">
               </div>

               <div class="col-md-6 my-1 input-group">
                 <div class="input-group-append">
                     <button class="btn btn-secondary" type="button">
                         <i class="fas fa-dollar-sign"></i>
                     </button>
                 </div>
                 <input id="precioventaconigv" name="precioventaconigv" class="form-control" required="true" value="" type="text" placeholder="Precio unitario de venta">
               </div>

               <div class="col-md-6 my-1 input-group">
                 <div class="input-group-append">
                     <button class="btn btn-secondary" type="button">
                         <i class="fa fa-list-alt"></i>
                     </button>
                 </div>
                 <input id="nombre" name="nombre" class="form-control" required="true" value="" type="text" placeholder="Descripción">
               </div>

               <div class="col-md-6 my-1 input-group">
                 <div class="input-group-append">
                     <button class="btn btn-secondary" type="button">
                         <i class="fas fa-dollar-sign"></i>
                     </button>
                 </div>
                 <input id="preciocompraconigv" name="preciocompraconigv" class="form-control" required="true" value="" type="text" placeholder="Precio unitario inventario">
               </div>

               <div class="col-md-6 my-1 input-group">
                 <div class="input-group-append">
                     <button class="btn btn-secondary" type="button">
                         <i class="fa fa-list"></i>
                     </button>
                 </div>
                 <select class="selectpicker form-control" name="cod_tipobien" id="cod_tipobien">
                 </select>

               </div>


               <div class="col-md-6 my-1 input-group">
                 <div class="input-group-append">
                     <button class="btn btn-secondary" type="button">
                         <i class="fas fa-dollar-sign"></i>
                     </button>
                 </div>
                 <input id="preciocomprasinigv" name="preciocomprasinigv" class="form-control" required="true" value="" type="text" placeholder="Precio refetencial gratuito">
               </div>

               <div class="col-md-6 my-1 input-group">
                 <div class="input-group-append">
                     <button class="btn btn-secondary" type="button">
                         <i class="fa fa-list"></i>
                     </button>
                 </div>
                 <select class="selectpicker form-control" name="cod_unidadme" id="cod_unidadme">
                 </select>

               </div>

               <div class="col-md-6 my-1 input-group">
                 <div class="input-group-append">
                     <button class="btn btn-secondary" type="button">
                         <i class="fa fa-list"></i>
                     </button>
                 </div>
                 <select class="selectpicker form-control" name="cod_iva" id="cod_iva">
                 </select>

               </div>

               <div class="col-md-6 my-1 input-group">
                 <div class="input-group-append">
                     <button class="btn btn-secondary" type="button">
                         <i class="fa fa-list"></i>
                     </button>
                 </div>
                 <select class="selectpicker form-control" name="cod_marca" id="cod_marca">
                 </select>

               </div>

               <div class="col-md-6 my-1 input-group">
                 <div class="input-group-append">
                     <button class="btn btn-secondary" type="button">
                         <i class="fa fa-list"></i>
                     </button>
                 </div>
                 <select class="selectpicker form-control" name="cod_impuesto" id="cod_impuesto">
                 </select>

               </div>

               <div class="col-md-6 my-1 input-group">
                 <div class="input-group-append">
                     <button class="btn btn-secondary" type="button">
                         <i class="fa fa-list"></i>
                     </button>
                 </div>
                 <select class="selectpicker form-control" name="cod_modelo" id="cod_modelo">
                 </select>

               </div>

            </form>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript" class="init">
var table;
  $(document).ready(function() {

      cargarCombo(urlBase+"combox/", "newbienser", "cod_tipobien", true, "Tipos");
      cargarCombo(urlBase+"combox/", "newbienser", "cod_unidadme", true, "Unidad de medida");
      cargarCombo(urlBase+"combox/", "newbienser", "cod_iva", true, "Impuesto");
      cargarCombo(urlBase+"combox/", "newbienser", "cod_marca", true, "Marca");
      cargarCombo(urlBase+"combox/", "newbienser", "cod_impuesto", true, "Retención");
      cargarCombo(urlBase+"combox/", "newbienser", "cod_modelo", true, "Modelo");

      detailsproduct();

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
        });

        $("#dataTables_examplebienes").on('hidden.bs.modal', function () {
           table.ajax.reload(function () {
              $(".paginate_button > a").on("focus", function () {
                 $(this).blur();
              });
           }, false);
        });

  });

function detailsproduct() {
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
               "data": {"listar": 'bien'}
           },
           "columns": [
               { "data": "id" },
               { "data": "codigo" },
               { "data": "descripcion" },
               { "data": "cod_tipobien" },
               { "data": "cod_impuesto" }
           ],
           "order": [[0, "desc"]],
           select: true,
              responsive: true,
                 buttons: [

                 ]
     });
}
</script>

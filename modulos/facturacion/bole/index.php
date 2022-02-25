<style>
   .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 0px !important;

}
   </style>
<form class="row g-3" id="facturacion">

<input id="idtb" name="idtb" type="hidden" value="1">
  <div class="col-md-4 my-1 input-group">
    <div class="input-group-append">
        <button class="btn btn-secondary" type="button">
            <i class="fa fa-user"></i>
        </button>
    </div>
      <input type="text" class="form-control identifica" id="identifica" placeholder="Identificación del cliente">
      <div class="input-group-append">
          <button class="btn btn-success" type="button" data-toggle="modal" data-target="#addclient">
              <i class="fa fa-plus"></i>
          </button>
      </div>
  </div>
  <div class="form-group input-group" style="display:none;">
     <input type="text" class="form-control idc" name="idc" id="idc" placeholder="id">
  </div>
  <div class="col-md-4 my-1 input-group">
       <input type='text' class="form-control" name="fechavemision" id="fechavemision" value="<?php echo date('Y-m-j'); ?>" placeholder="Fecha de emisión" readonly />
       <div class="input-group-append">
           <button class="btn btn-secondary" type="button">
               <i class="fa fa-calendar"></i>
           </button>
       </div>
  </div>

  <div class="col-md-4 my-1 input-group">
    <div class="input-group-append">
        <button class="btn btn-secondary" type="button">
            <i class="fa fa-list"></i>
        </button>
    </div>
    <select class="form-control" name="tipo_doc" id="tipo_doc">
    </select>
  </div>

  <div class="col-md-4 my-1 input-group">
    <div class="input-group-append">
        <button class="btn btn-secondary" type="button">
            <i class="fa fa-user"></i>
        </button>
    </div>
    <input type="text" class="form-control nombre" id="nombre" placeholder="Razon social" readonly>
  </div>

  <div class="col-md-4 my-1 input-group">
    <input type='text' class="form-control fechavencimiento" name="fechavencimiento" id="fechavencimiento" placeholder="Fecha de vencimiento" />
    <div class="input-group-append">
        <button class="btn btn-secondary" type="button">
            <i class="fa fa-calendar"></i>
        </button>
    </div>
  </div>

  <div class="col-md-4 my-1 input-group">
    <div class="input-group-append">
        <button class="btn btn-secondary" type="button">
            <i class="fa fa-asterisk"></i>
        </button>
    </div>
    <input type="text" class="form-control" name="prefijo" id="prefijo" value="<?php echo $empresa['prefijo']; ?>" placeholder="Prefijo" readonly>
  </div>

  <div class="col-md-4 my-1 input-group">
    <div class="input-group-append">
        <button class="btn btn-secondary" type="button">
            <i class="fa fa-at"></i>
        </button>
    </div>
    <input type="text" class="form-control correo" id="correo" placeholder="Correo electrónico" readonly>
  </div>

  <div class="col-md-4 my-1 input-group">
    <div class="input-group-append">
        <button class="btn btn-secondary" type="button">
            <i class="fa fa-list"></i>
        </button>
    </div>
    <select class="form-control" name="tipo_moneda" id="tipo_moneda">
    </select>
  </div>

  <div class="col-md-4 my-1 input-group">
    <div class="input-group-append">
        <button class="btn btn-secondary" type="button">
            <i class="fa fa-asterisk"></i>
        </button>
    </div>
    <input type="text" class="form-control" name="num_fac" id="num_fac" placeholder="Numero de factura" value="" readonly>
  </div>

  <div class="col-md-4 my-1 input-group">
    <div class="input-group-append">
        <button class="btn btn-secondary" type="button">
            <i class="fas fa-phone-alt"></i>
        </button>
    </div>
    <input type="text" class="form-control telefono" id="telefono" placeholder="Telefono" readonly>
  </div>



  <div class="col-md-4 my-1 input-group">
    <div class="input-group-append">
        <button class="btn btn-secondary" type="button">
            <i class="fa fa-list"></i>
        </button>
    </div>
    <select class="form-control" name="tipo_operacion" id="tipo_operacion">
    </select>
  </div>

  <div class="col-md-4 my-1 input-group">
    <div class="input-group-append">
        <button class="btn btn-secondary" type="button">
            <i class="fa fa-list"></i>
        </button>
    </div>
    <select class="form-control" name="forma_pago" id="forma_pago">
    </select>
  </div>




  <div class="col-md-4 my-1 input-group">
    <div class="input-group-append">
        <button class="btn btn-secondary" type="button">
            <i class="fa fa-map-marker"></i>
        </button>
    </div>
    <input type="text" class="form-control direccion" id="direccion" placeholder="Dirección cliente" readonly>
  </div>


  <div class="col-md-8 my-1 input-group">
    <div class="input-group-append">
        <button class="btn btn-secondary" type="button">
            <i class="fa fa-edit"></i>
        </button>
    </div>
    <input type="text" class="form-control observacion" name="observacion" id="observacion" rows="3" placeholder="Ingrese la observación">
  </div>

  <div class="col-md-4 my-1 input-group">
    <div class="input-group-append">
        <button class="btn btn-secondary" type="button">
            <i class="fa fa-list"></i>
        </button>
    </div>
    <select class="form-control retefuente" name="retefuente" id="retefuente">
    </select>
  </div>

  <div class="col-md-4 my-1 input-group">
    <div class="input-group-append">
        <button class="btn btn-secondary" type="button">
            <i class="fa fa-list"></i>
        </button>
    </div>
    <select class="form-control ipoconsumo" name="ipoconsumo" id="ipoconsumo">
    </select>
  </div>

  <div class="col-md-4 my-1 input-group">
    <div class="input-group-append">
        <button class="btn btn-secondary" type="button">
            <i class="fa fa-list"></i>
        </button>
    </div>
    <select class="form-control reteiva" name="reteiva" id="reteiva">
    </select>
  </div>

</form>
<hr>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <button type="button" class="btn btn-sm btn-warning mr-1" data-toggle="modal"
     data-target="#addproducts">
     Nuevo producto
  </button>
  <button type="button" class="btn btn-sm btn-primary mr-1" data-toggle="modal"
     data-target="#additemfact" id="additemfactid" onclick="detailsproduct()" >
     Agregar item
  </button>
  <button type="button" class="btn btn-sm btn-danger mr-1 " data-toggle="modal" data-target="#facturaelectronica">
     Factura electronica
  </button>
  <button id="print" class="btn btn-sm btn-success mr-1" onclick="imprimir();">Imprimir</button>
</div>
<hr>
<div class="table-responsive">
<form id="detallesfacturaa">
  <div class="row clearfix">
     <div class="col-md-12">
   <table class="table table-bordered table-hover" id="tab_logic">
      <thead>
         <tr>
            <th style="display:none"> </th>
            <th style="display:none"> </th>
            <th class="text-center"> Descripción </th>
            <th class="text-center"> U.M </th>
            <th class="text-center"> Cantidad. </th>
            <th class="text-center"> Valor Unitario. </th>
            <th class="text-center"> Dscto % </th>
            <th class="text-center"> IVA </th>
            <th class="text-center"> Total </th>
            <th class="text-center"> Eliminar </th>
         </tr>
      </thead>
      <tbody id="detallesfactura">

      </tbody>
   </table>
 </div>
 </div>
</form>

<div class="row clearfix">
   <div class="col-md-12">
      <table class="table table-bordered table-hover" id="tab_logic_total">
         <tbody>
            <tr>
               <th class="text-center">TOTAL BRUTO</th>
               <th class="text-center">DESCUENTO</th>
               <th class="text-center">IMPOCONSUMO</th>
               <th class="text-center">IVA</th>
               <th class="text-center">RET.FTE.</th>
               <th class="text-center">RET.IVA</th>
               <th class="text-center">TOTAL A PAGAR</th>
            </tr>
            <tr>
               <td class="text-center"><input type="text" name='total_bruto' placeholder='0.00'
                     class="form-control" id="total_bruto" readonly /></td>
               <td class="text-center"><input type="text" name='total_descuento' id="total_descuento"
                     placeholder='0.00' class="form-control" readonly /></td>
               <td class="text-center"><input type="text" name='total_ipoconsumo' id="total_ipoconsumo"
                     placeholder='0.00' class="form-control" readonly /></td>
               <td class="text-center"><input type="text" name='total_iva' id="total_iva" placeholder='0.00'
                     class="form-control" readonly /></td>
               <td class="text-center"><input type="text" name='total_retefuente' id="total_retefuente"
                     placeholder='0.00' class="form-control" readonly /></td>
               <td class="text-center"><input type="text" name='total_reteiva' id="total_reteiva"
                     placeholder='0.00' class="form-control" readonly /></td>
               <td class="text-center"><input type="text" name='total_pagar' id="total_pagar" placeholder='0.00'
                     class="form-control" readonly /></td>
            </tr>
         </tbody>
      </table>
   </div>
</div>

</div>

<div class="modal fade  modal-fullscreen" id="additemfact" tabindex="-1" role="dialog" aria-labelledby="additemfactLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="additemfactLabel">Bienes y servicios

         </h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span> </button>
         </div>
         <div class="modal-body">
            <table id="dataTables_examplebienes"
               class="table table-striped table-bordered dt-responsive dataTables_examplebienes" style="width:100%">
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
      </div>
   </div>
</div>



<div class="modal fade  modal-fullscreen" id="facturaelectronica" tabindex="-1" role="dialog" aria-labelledby="facturaelectronicaLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="facturaelectronicaLabel">Factura electrónica
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span> </button>
         </div>
         <div class="modal-body">
             <table id="dataTables_examplefacturaelectronica"
               class="table table-striped table-bordered dt-responsive dataTables_examplefacturaelectronica" style="width:100%">
               <thead>
                  <tr>
                     <th>PDF</th>
                  </tr>
               </thead>
            </table>
         </div>
      </div>
   </div>
</div>

<div class="modal fade modal-fullscreen" id="addproducts" tabindex="-1" role="dialog" aria-labelledby="addproductsLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addproductsLabel">Nuevo bien y/o servicio

            </h5>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button type="button" class="pull-right btn btn-sm btn-success mr-1" onclick="addproducts()">Guardar</button>
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

<div class="modal fade modal-fullscreen" id="addclient" tabindex="-1" role="dialog" aria-labelledby="addclientLabel" aria-hidden="true">
   <div class="modal-dialog ">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addclientLabel">Nuevo cliente
            </h5>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <button type="button" class="pull-right btn btn-sm btn-success" style="margin-right: 4px;" onclick="addclients()">Guardar</button>
              <button type="button" class="pull-right btn btn-sm btn-danger mr-1" data-dismiss="modal">Cerrar</button>
            </div>
         </div>
         <div class="modal-body">

           <form class="row g-3 newclients" id="newclients">

           <input id="idtb" name="idtb" type="hidden" value="1">

           <div class="col-md-6 my-1 input-group">
             <div class="input-group-append">
                 <button class="btn btn-secondary" type="button">
                     <i class="fa fa-list"></i>
                 </button>
             </div>
             <select class="selectpicker form-control" name="tipoide" id="tipoide">
             </select>
             <input id="idtb" name="idtb" type="hidden" value="2">
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
    consecutivo();
    cargarCombo(urlBase+"combox/", "facturacion", "tipo_doc", true, "Tipos de documento");
    cargarCombo(urlBase+"combox/", "facturacion", "tipo_moneda", true, "Tipos de monedas");
    cargarCombo(urlBase+"combox/", "facturacion", "tipo_operacion", true, "Tipos de operación");
    cargarCombo(urlBase+"combox/", "facturacion", "forma_pago", true, "Formas de pago");
    cargarCombo(urlBase+"combox/", "facturacion", "retefuente", true, "Desea aplicar la retefuente?");
    cargarCombo(urlBase+"combox/", "facturacion", "ipoconsumo", true, "Desea aplicar el impuesto al consumo?");
    cargarCombo(urlBase+"combox/", "facturacion", "reteiva", true, "Desea aplicar el reteiva?");
    cargarCombo(urlBase+"combox/", "newbienser", "cod_tipobien", true, "Tipos");
    cargarCombo(urlBase+"combox/", "newbienser", "cod_unidadme", true, "Unidad de medida");
    cargarCombo(urlBase+"combox/", "newbienser", "cod_iva", true, "Impuesto");
    cargarCombo(urlBase+"combox/", "newbienser", "cod_marca", true, "Marca");
    cargarCombo(urlBase+"combox/", "newbienser", "cod_impuesto", true, "Retención");
    cargarCombo(urlBase+"combox/", "newbienser", "cod_modelo", true, "Modelo");
    cargarCombo(urlBase+"combox/", "newbienser", "tipoide", true, "Tipo de documento");
    cargarCombo(urlBase+"combox/", "newbienser", "tipocontri", true, "Tipo de contribuyente");
    cargarCombo(urlBase+"combox/", "newbienser", "regimencontable", true, "Regimen contable");
    cargarCombo(urlBase+"combox/", "newbienser", "tipotresponsa", true, "Tipo de reponsabilidad");
    cargarCombo(urlBase+"combox/", "newbienser", "responsabilidadtributaria", true, "Responsabilidad tributaria");
    cargarCombo(urlBase+"combox/", "newbienser", "pais", true, "Pais");

    $(document).on('change', '#pais', function (event) {
      cargarCombo(urlBase+"combox/", "newbienser", "coddepto", true, "Departamento", $("#pais").val());
    });

    $(document).on('change', '#coddepto', function (event) {
      cargarCombo(urlBase+"combox/", "newbienser", "mupio", true, "Ciudad", $("#coddepto").val());
    });

    $(document).on('change', '#retefuente, #ipoconsumo, #reteiva', function (event) {
           calc();
        });
    $('.identifica').bind("enterKey", function (e) {
         const data = new URLSearchParams("idp=" + $('.identifica').val());
         fetch(urlBase+"factura/", {
            method: 'POST',
            body: data
         })
            .then(function (response) {
               if (response.ok) {
                  return response.json();
               } else {
                  throw "Error en la llamada Ajax";
               }
            })
            .then(function (response) {
               $('.nombre').val(response.nombre);
               $('.idc').val(response.id);
               $('.correo').val(response.correo);
               $('.telefono').val(response.telefono);
               $('.direccion').val(response.direccion);
            })
            .catch(function (err) {
            });
      });
      $('.identifica').keyup(function (e) {
         $('.nombre').val("");
         $('.idc').val("");
         $('.correo').val("");
         $('.telefono').val("");
         $('.direccion').val("");
         if (e.keyCode == 13) {
            $(this).trigger("enterKey");
         }
      });

      var i = 1;
        $('#tab_logic tbody').on('keyup change', function () {
           calc();
        });
        $('.cantidad, .descuento').on('keyup change', function () {
           calc();
        });
        consecutivo();


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
           // mostrarf(table.row('.selected').data()[0]);
           localStorage.setItem('idpro', table.row('.selected').data()[0]);
           var conta = 0;
           const data = new URLSearchParams({
              idprodu: table.row('.selected').data()[0],
              idfact: $('#num_fac').val()
           });
           fetch(urlBase+"factura/", {
              method: 'POST',
              body: data
           })
              .then(function (response) {
                 if (response.ok) {
                    return response.text();
                 } else {
                    throw "Error en la llamada Ajax";
                 }
              })
              .then(function (response) {
                 listarproductos($('#num_fac').val());
              })
              .catch(function (err) {

              });
        });

        $("#dataTables_examplebienes").on('hidden.bs.modal', function () {
           table.ajax.reload(function () {
              $(".paginate_button > a").on("focus", function () {
                 $(this).blur();
              });
           }, false);
        });

  });


   function consecutivo() {
        var conta = 0;
        const data = new URLSearchParams("num_fac=1");
        fetch(urlBase+"factura/", {
           method: 'POST',
           body: data
        })
           .then(function (response) {
              if (response.ok) {
                 return response.json();
              } else {
                 throw "Error en la llamada Ajax";
              }
           })
           .then(function (response) {
              if (response.factura != null) {
                 conta = parseInt(response.factura) + 1;
                 listarproductos(conta);

              }
              $('#prefijo').val(response.prefijo);
              $('#num_fac').val(conta);
           })
           .catch(function (err) {
              // conta = parseInt() + 1;
              // $('#num_fac').val(conta);
              // listarproductos(conta);
     });
  }


     function listarproductos(id) {
        const data = new URLSearchParams({
           listprodu: id
        });
        fetch(urlBase+"factura/", {
           method: 'POST',
           body: data
        })
           .then(function (response) {
              if (response.ok) {
                 return response.json();
              } else {
                 throw "Error en la llamada Ajax";
              }
           })
           .then(function (response) {
              $("#detallesfactura").empty();
              for (let index = 0; index < response.length; index++) {
                 $html = `
                    <tr id='addr0'>
                       <td style="display:none"><input type="hidden" name='idproducto[]' class="form-control idproducto" value="${response[index].idproducto}" /></td>
                       <td style="display:none"><input type="text" name='impuestos[]' class="form-control impuestos" value="${response[index].impuesto}" /></td>
                       <td>${response[index].nombre}</td>
                       <td>${response[index].cod_unidadme}</td>
                       <td><input type="text" name='cantidad[]'  class="form-control cantidad" value='${response[index].cantidad}' /></td>
                       <td><input type="text" name='precio[]' class="form-control precio" value="${response[index].precio}" readonly/></td>
                       <td><input type="text" name='descuento[]' class="form-control descuento" value="${response[index].descuento}"/></td>
                       <td><input type="text" name='iva[]'  class="form-control iva" value="${response[index].iva}" readonly /></td>
                       <td><input type="text" name='total[]' placeholder='0.00' class="form-control total" value="${response[index].precio * response[index].cantidad}" readonly/></td>
                       <td><button type="button" class="pull-right btn btn-danger" onclick="eliminarpro(${response[index].idproducto})"><i class="fas fa-trash-alt"></i></button></td>
                    </tr>
                  `;
                 $("#detallesfactura").append($html);
              }
              calc();
           })
           .catch(function (err) {
           });
     }


        function calc() {
           var total_descuento = 0;
           var total_iva = 0;
           var retefuente = 0;
           var ipoconsumo = 0;
           var reteiva = 0;
           $('#tab_logic tbody tr').each(function (i, element) {
              var qty = $(this).find('.cantidad').val();
              var price = $(this).find('.precio').val();
              var descu = $(this).find('.descuento').val();
              var iva = $(this).find('.iva').val()
              var impuesto = $(this).find('.impuestos').val();
              var desparcial = price * qty * descu / 100;
              $(this).find('.total').val((qty * price) - desparcial);
              total_descuento += price * qty * descu / 100;
              total_iva += $(this).find('.total').val() * iva / 100;
              if ($("#retefuente").val() == 1) {
                 retefuente += $(this).find('.total').val() * impuesto / 100;
              } else {
                 retefuente = 0;
              }
              const data = new URLSearchParams({
                 idproduup: $(this).find('.idproducto').val(),
                 idfactup: $('#num_fac').val(),
                 cantidadup: $(this).find('.cantidad').val(),
                 descuentoup: $(this).find('.descuento').val()
              });
              fetch(urlBase+"factura/", {
                 method: 'POST',
                 body: data
              })
                 .then(function (response) {
                    if (response.ok) {
                       return response.json();
                    } else {
                       throw "Error en la llamada Ajax";
                    }
                 })
                 .then(function (response) {
                 })
                 .catch(function (err) {
                 });
              total = 0;
              tax_sum = 0;
              $('.total').each(function () {
                 total += parseFloat($(this).val());
              });
              $('#total_bruto').val(total.toFixed(2));
              $('#total_descuento').val(total_descuento.toFixed(2));
              ipconsumo = $('#total_bruto').val() * $("#ipoconsumo").val() / 100;
              $('#total_ipoconsumo').val(ipconsumo.toFixed(2));
              $('#total_iva').val(total_iva.toFixed(2));
              $('#total_retefuente').val(retefuente.toFixed(2));
              reteiva = $('#total_iva').val() * $("#reteiva").val() / 100;
              $('#total_reteiva').val(reteiva.toFixed(2));
              suma = parseFloat($('#total_bruto').val()) + parseFloat($('#total_iva').val()) + parseFloat($('#total_ipoconsumo').val());
              resta = parseFloat($('#total_retefuente').val()) + parseFloat($('#total_reteiva').val());
              $('#total_pagar').val((suma - resta).toFixed(2));
           });
        }


           function eliminarpro(id) {
              const data = new URLSearchParams({
                 elidprodu: id,
                 elidfact: $('#num_fac').val()
              });
              fetch(urlBase+"factura/", {
                 method: 'POST',
                 body: data
              })
                 .then(function (response) {
                    if (response.ok) {
                       return response.text();
                    } else {
                       throw "Error en la llamada Ajax";
                    }
                 })
                 .then(function (response) {
                    listarproductos($('#num_fac').val());
                 })
                 .catch(function (err) {
                 });

           }

     function imprimir() {
        $.ajax({
           type: "POST",
           url: urlBase+"ifactura/",
           data: $('#facturacion').serialize(),
           success: function (data) {
              var r = jQuery.parseJSON(data);
              if (r.error == false) {
                 window.open(urlBase + "facturaelectronica/" + '?id=' + $('#num_fac').val(), "ventana1", "width=800,height=800,toolbar=no,menubar=no,location=no,status=no");
                 consecutivo();
                 window.location.reload();
              } else {
                 alert(r.msg);
              }
           }
        });
     }


//    var editor;
//    $(document).ready(function () {
//
//
//
//
//
//       $( "#additemfactid" ).click(function() {
//       // alert( "Handler for .click() called." );
//       });
//
//

//
//    // Factura electronica
//       var tables = $('#dataTables_examplefacturaelectronica').DataTable({
//             "language": {
//                "decimal": "",
//                "emptyTable": "No hay información",
//                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
//                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
//                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
//                "infoPostFix": "",
//                "thousands": ",",
//                "lengthMenu": "Mostrar _MENU_ Entradas",
//                "loadingRecords": "Cargando...",
//                "processing": "Procesando...",
//                "search": "Buscar:",
//                "zeroRecords": "Sin resultados encontrados",
//                "paginate": {
//                   "first": "Primero",
//                   "last": "Ultimo",
//                   "next": "Siguiente",
//                   "previous": "Anterior"
//                }
//             },
//             "order": [[0, "desc"]],
//             dom: 'Bfrtip',
//             ajax: page_root + m,
//             rowId: 'id',
//             columns: [
//                <?php
//                   $sqll = "SELECT id, campo, ucase(descripcion) as descripcion, menu, requerido, tipo, mostrar, id_campo_tabla, nombre_campo_tabla, nombre_tabla, tipo_dato, longitud, url, pregunta, idmostrar, idocultar, orden FROM campos WHERE mostrarmodal = '2' AND mostrar != 'display-none'AND menu = '3938569060' ORDER BY orden ASC ";
//                   $rsl = $db -> query($sqll);
//                   while($row = $db -> fetch_array($rsl)) {
//                            echo  "  { mData: '$row[campo]' }, ";
//                   }
//                ?>
//                  {
//                   data: null,
//                   className: "center",
//                   defaultContent: '<button type="button" class="btn btn-warning btnmodificarr" data-toggle="modal" data-target="#myFormTable" id="btnmodificarr" onclick="bmodificar();"><span class="glyphicon glyphicon-edit"></span> </button>'
//                   // defaultContent: '<button type="button" class="btn btn-warning btnmodificarr" data-toggle="modal" data-target="#myFormTable" id="btnmodificarr" onclick="bmodificar();"><span class="glyphicon glyphicon-edit"></span> </button> <button type="button" class="btn btn-danger btneliminarr" data-toggle="modal" data-target="#myFormTable" id="btneliminarr" onclick="beliminar();"><span class="glyphicon glyphicon-trash"></span> </button>'
//               }
//          ],
//          select: true,
//             responsive: true,
//                buttons: [
//
//                ]
//       });
//
//       $("#dataTables_examplefacturaelectronica").on('hidden.bs.modal', function () {
//          tables.ajax.reload(function () {
//             $(".paginate_button > a").on("focus", function () {
//                $(this).blur();
//             });
//          }, false);
//       });
//
//
//
//       $("#dataTables_examplefacturaelectronica").on('hidden.bs.modal', function () {
//          tables.ajax.reload(function () {
//             $(".paginate_button > a").on("focus", function () {
//                $(this).blur();
//             });
//          }, false);
//       });
//
//
// });

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
               "url": urlBase+"factura/",
               "type": "POST",
               "data": {"listarpro": 'ok'}
           },
           "columns": [
               { "data": "id" },
               { "data": "codigo" },
               { "data": "nombre" },
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

   function addclients() {
      $.ajax({
         type: "POST",
         url: page_root + a,
         data: $('#newclients').serialize(),
         success: function (data) {
            var r = jQuery.parseJSON(data);
            if (r.error == false) {
               alert(r.msg);
            } else {
               alert(r.msg);
            }

         }
      });
   }

   function addproducts() {
      $.ajax({
         type: "POST",
         url: page_root + a,
         data: $('#newbienser').serialize(),
         success: function (data) {
            var r = jQuery.parseJSON(data);
            if (r.error == false) {
               alert(r.msg);
            } else {
               alert(r.msg);
            }

         }
      });
   }
</script>

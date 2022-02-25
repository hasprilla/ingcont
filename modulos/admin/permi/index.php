<section class="bg0 p-t-23 p-b-140">
						<div id="content">

                <div class="contenidosge">

                    <form id="formulario">

                    <!--   <div class="form-group margin-top" >
                            <div class="titulocampo">Nombre:</div>
                            <input class="form-control" type="text" id="service" name="service" title="Nombre" maxlength="100" autocomplete="off" value="" onkeypress="return anular(event)"/>
                            <div id="suggestions"></div>
                        </div> -->
                <!--
                    <div class="form-group">
                        <select  class="form-control" style="width: 100%" name="rol" id="rol" onchange="cargar();">

                            <option  value="">Seleccione el usuario de la lista</option>

                                <?php

                                    // llenar_combo("SELECT id, concat_ws(' ', nombre1, nombre2, apellido1, apellido2) as nombre FROM personas ORDER BY id");

                                ?>

                        </select>
                    </div>  -->

                    <div class="form-group margin-top">
                        <input type="hidden" name="idrolcarga"  id="idrolcarga" value="rolcarga" >
                        <select  class="form-control" style="width: 100%" name="rol" id="rol" onchange="cargar();"> </select>
                    </div>


                        <!-- <div  class="well" style="height: 500px; overflow: auto; margin-top: 20px;"> -->
                        <div style="height: 500px; overflow: auto; margin-top: 20px;">

                            <div  style="display:none; font-size:12pt; font-weight:bold" id="div_cargando">

                                Cargando...

                            </div>

                            <div id="arbol" style="display:none;">




                            </div>

                        </div>


                        <div class="modal-footer" style="display:none" id="div-acciones">

                            <input type="button"  class="btn btn-primary" value="Guardar" onclick="guardar()"/>

                            <input type="button"  class="btn btn-primary" value="Recargar" onclick="cargar();" />

                            <input type="button"  class="btn btn-primary" value="Limpiar" onclick="limpiar();" />

                        </div>

                    </form>

                </div>

	</div>
</section>


<?php





// function listarMenu($padre)

// {

// 	global $db;



// 	if ($padre == NULL) {

// 		//$sql = "select * from admin_menu where padre is null AND visibilidad='7' AND estado >0 order by orden";
//                 $sql = "select * from admin_menu where padre is null AND visibilidad > '0' order by orden";


// 	} else {

// //                $sql = "select * from admin_menu where padre = '" . $padre . "' AND visibilidad='7' AND estado >0 order by orden";
//            $sql = "select * from admin_menu where padre = '" . $padre . "' AND visibilidad > '0' order by orden";

// 	}



// 	$rs = $db->query($sql);



// 	echo("<ul>");

// 	while( $rw = $db->fetch_assoc($rs) )

// 	{

// 		echo("<li>");

// 		echo("<input type='checkbox'  onclick='marcar(this)' id='menu_" . $rw['codigo'] . "' name='menu[". $rw['codigo'] ."]' value='S'/>");

// 		echo("<label   for='menu_" . $rw["codigo"] . "'>" . $rw["nombre"] . "</label>");



// 		$hijos = $db->select_one("SELECT COUNT(*) FROM admin_menu WHERE padre='$rw[codigo]'");

// 		if($hijos>0)

// 		{

// 			listarMenu($rw["codigo"]);

// 		}

// 		echo("</li>");

// 	}

// 	echo("</ul>");

// }

// ?>




<script type="text/javascript" class="init">
  $(document).ready(function() {
        reloadCombox();
        $(document).on('change', '#rol', function (event) {
     
    });
  });











  function cargarMenuRol()
{
    var container = document.getElementById('arbol');
    const data = new URLSearchParams({
        menuapprol: $("#rol").val(),
        hashmenu: "$('#num_fac').val()"
     });
     fetch(urlBase + 'menu/', {
        method: 'POST',
        body: data
     })
        .then(function (response) {
           if (response.ok) {
             $("#arbol").empty();
              return response.json();
           } else {
              throw "Error en la llamada Ajax";
           }
        })
        .then(function (response) {
            var ul = document.createElement("ul");

            for (let index = 0; index < response.length; index++) {
              if(response[index].hijos > 0)
              {
                // href = 'href="#"';
                // datatoggle = 'data-toggle="collapse"';
                // datatarget = `data-target="${"#"+response[index].nombre}"`;
                // ariaexpanded = 'aria-expanded="true"';
                // ariacontrols = 'aria-controls="collapseTwo"';
                cargarSubMenuRol(response[index].codigo);
              }else{
                // href = `href="${page_root + makeSlug(response[index].nombre) + "/"}"`;
                // datatoggle = '';
                // datatarget = ''s
                // ariaexpanded = '';
                // ariacontrols = '';
                // eventoclick = ``;
              }
                if(response[index].padre === null)
                {

                    var li = document.createElement("li");

                    li.id = "limenu_"+response[index].codigo;
                    var checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.id = "menu_"+response[index].codigo;
                    checkbox.name = 'menu['+response[index].codigo+']';
                    checkbox.onclick = marcar(this);
                    checkbox.value = "S";
                    var label = document.createElement('label')
                    label.htmlFor = "menu_"+response[index].codigo;
                    label.appendChild(document.createTextNode(' ' + response[index].nombre ));
                
                    // var br = document.createElement('br');
                
                    // container.appendChild(checkbox);
                    // container.appendChild(label);
                    // container.appendChild(br);
                    // checkbox.appendChild(label);
                    li.appendChild(checkbox);
                    li.appendChild(label);
                    ul.appendChild(li);
                    container.appendChild(ul);
                    // container.appendChild(checkbox);
                    // container.appendChild(label);
                    
                //  htmlmenu = `
                //     <li> <input type="checkbox"  onclick="marcar(this)" id="menu_${response[index].codigo}" name="menu[${response[index].codigo}]" value="S"/>
                //     <label   for="menu_${response[index].codigo}"> ${response[index].nombre} </label> </li>
                //  `;
                
               }else{
                container.append("");
               }
              
            }
        })
        .catch(function (err) {
          // cargarMenu("00");
        });
}

function cargarSubMenuRol(id)
{
    var idmenu = "limenu_"+id;
    var container = document.getElementById(idmenu);
    console.log("limenu_"+id);
    const data = new URLSearchParams({
        menuapprols: id,
        hashmenusub: "$('#num_fac').val()"
     });
     fetch(urlBase + 'menu/', {
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
        var ul = document.createElement("ul");
          for (let index = 0; index < response.length; index++) {

              console.log(index);

            // var li = document.createElement("li");
            // var checkbox = document.createElement('input');
            // checkbox.type = 'checkbox';
            // checkbox.id = "menu_"+response[index].codigo;
            // checkbox.name = 'menu['+response[index].codigo+']';
            // checkbox.onclick = marcar(this);
            // checkbox.value = "S";
            // var label = document.createElement('label')
            // label.htmlFor = "menu_"+response[index].codigo;
            // label.appendChild(document.createTextNode(' ' + response[index].nombre ));
            // li.appendChild(checkbox);
            // li.appendChild(label);
            // ul.appendChild(li);
            // container.appendChild(ul);


               $("#limenu_"+id).append(` <ul> <li> <input type="checkbox"  onclick="marcar(this)" id="menu_${response[index].codigo}" name="menu[${response[index].codigo}]" value="S"/>
                    <label   for="menu_${response[index].codigo}"> ${response[index].nombre} </label> </li> </ul>`);
          }
        })
        .catch(function (err) {
        });
}

function reloadCombox() {
  cargarCombo(urlBase+"combox/", "formulario", "rol", true, "Seleccione un rol de la lista");
}




function marcar(chk)
      {
  	       $(chk).parent().find("input:checkbox").attr("checked",chk.checked);
      }

    function cargar() {

        cargarMenuRol();


	 	if( $("#rol").val()=="")
		{
                    $("#arbol").hide();
                    $("#div-acciones").hide();
                    return ;
		}
		$("#div_cargando").html("Cargando...");
                $("#div_cargando").css("display","");
		$("#arbol").css("display","none");
    //     // $("#arbol input:checkbox").removeAttr("checked");
      $('#arbol input').prop('checked', false);

        $.post(urlBase+"combox/", form_values("formulario"), function (data)  {
                var r = jQuery.parseJSON(data);

                // var container = document.getElementById('arbol');
                for(var i=0;i<r.length;i++)
                {
                // $("#menu_"+r[i].accion).prop('checked', true);
                // $("#menu_"+r[i].accion).attr('checked',true);

    //                 // var checkbox = document.createElement('input');
    //                 // checkbox.type = 'checkbox';
    //                 // checkbox.id = "menu_"+r[i].accion;
    //                 // checkbox.name = 'menu['+r[i].accion+']';
    //                 // checkbox.onclick = marcar(this);
    //                 // checkbox.value = "S";
    //                 // var label = document.createElement('label')
    //                 // label.htmlFor = "menu_"+r[i].accion;
    //                 // label.appendChild(document.createTextNode('Car'));
                
    //                 // var br = document.createElement('br');
                
    //                 // container.appendChild(checkbox);
    //                 // container.appendChild(label);
    //                 // container.appendChild(br);
             
                    // document.getElementById("menu_"+r[i].accion).checked=true;
                    // document.getElementById("menu_"+r[i].accion).checked = true;

                }

    //         //    // verificar();

				$("#div_cargando").css("display","none");

				$("#arbol").css("display","");

				$("#div-acciones").show();

               alert("Se han cargado los permisos del rol seleccionado.");
                $('#header-mensajes').html('Aviso importante');
                $('#body-mensajes').html('Se han cargado los permisos del rol seleccionado.');
                $('#notificaciones').modal('show');

        });

    }

    function guardar()
    {

        if( document.getElementById("rol").value=="" )
        {

            // alert("Debe seleccionar un rol primero.");
            $('#header-mensajes').html('Aviso importante');
            $('#body-mensajes').html('Debe seleccionar un rol primero.');
            $('#notificaciones').modal('show');
			return ;

        }

        if( !confirm("Desea guardar los cambios en el rol seleccionado") ) return ;

		$("#div-acciones").hide();

		$("#div_cargando").html("Guardando...");

        $("#div_cargando").css("display","");

		$("#arbol").css("display","none");

        $.post(page_root+a, form_values("formulario"), function (data) {

                var r = jQuery.parseJSON(data);

				$("#div_cargando").css("display","none");

				$("#arbol").css("display","");

                alert(r.msg);

				$("#div-acciones").show();

        });

    }

    function limpiar()
    {

        // $("#arbol input:checkbox").removeAttr("checked");
        $('#arbol input').prop('checked', false);

    }

    function verificar()
    {

        var o=$("#arbol .menu");

        //o.each( function(index,obj) {

        for(i= o.length-1; i>=-1; i--)

        {

            //console.log(obj);

            var obj=o.get(i);

            var parent=$(obj).parent();

            //console.log(parent);

            var marcados=parent.find("input:checkbox:checked");

            //console.log(marcados.length);

            if(marcados.length==0)

            {

                $(obj).removeAttr("checked");

                //obj.checked=false;

                //console.log(obj);

            }

            else

            {

				 $(obj).attr("checked","checked");

               // obj.checked=true;



            }

        }

        //});

    }
</script>

// document.oncontextmenu = function() {
//         return false
//      }
//      function right(e) {
//         if (navigator.appName == 'Netscape' && e.which == 3) {
//            return false;
//         }
//         else if (navigator.appName == 'Microsoft Internet Explorer' && event.button==2) {
//         return false;
//         }
//      return true;
//   }
//   document.onmousedown = right;

(function (i, s, o, g, r, a, m) {
   i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
      (i[r].q = i[r].q || []).push(arguments)
   }, i[r].l = 1 * new Date(); a = s.createElement(o),
      m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
ga('create', 'UA-88224501-1', 'auto');
ga('send', 'pageview');

$(document).ready(function () {
   if (window.sessionStorage) {
      if (sessionStorage.getItem("nombre") === null) {
         // window.location.href = `${page_root + "iniciar-sesion/"}`;
         $(".navbar-nav-menu").hide();
         cargarMenu('0');
         history.pushState({}, '');
         history.pushState(null, "", page_root + "iniciar-sesion/");
         objetos('iniciar-sesion');
      } else {
         $(".navbar-nav, .navbar").removeClass("d-none");
         $(".navbar-nav-menu").show();
         cargarMenu(sessionStorage.getItem("idpe"));
         $(".name-profile").html(capitalizarPalabras(sessionStorage.getItem("nombre")));
      }
   } else {
      throw new Error('Tu Browser no soporta sessionStorage!');
   }
   // if (u[2] == "") window.location.href = `${page_root + "iniciar-sesion/"}`;
   if(sessionStorage.getItem("nombre") != null){ objetos(u[2]); }
});

function cargarMenu(id) {
   const data = new URLSearchParams({
      menup: id,
      hashmenu: "$('#num_fac').val()"
   });
   fetch(urlBase + 'menu/', {
      method: 'POST',
      body: data
   })
      .then(function (response) {
         if (response.ok) {
            $("#menupage").empty();
            return response.json();
         } else {
            throw "Error en la llamada Ajax";
         }
      })
      .then(function (response) {
         for (let index = 0; index < response.length; index++) {
            if (response[index].hijos > 0) {
               href = 'href="#"';
               datatoggle = 'data-toggle="collapse"';
               datatarget = `data-target="${"#" + response[index].nombre}"`;
               ariaexpanded = 'aria-expanded="true"';
               ariacontrols = 'aria-controls="collapseTwo"';
            } else {
               href = `href="${page_root + makeSlug(response[index].nombre) + "/"}"`;
               datatoggle = '';
               datatarget = ''
               ariaexpanded = '';
               ariacontrols = '';
               eventoclick = ``;
            }
            if (response[index].padre === null) {
               htmlmenu = `  <li class="nav-item active">
                       <a class="nav-link collapsed" ${href} ${datatoggle} ${datatoggle} ${datatarget} ${ariaexpanded} ${ariacontrols}>
                           <i class="fas fa-fw fa-tachometer-alt"></i>
                           <span>${response[index].nombre}</span>
                       </a>
                       <div id="${response[index].nombre}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                           <div class="bg-white py-2 collapse-inner rounded submenu${response[index].nombre}" id="submenu${response[index].nombre}" >
                           </div>
                       </div>
                   </li>`;
               cargarSubMenu(response[index].codigo, response[index].nombre);
            } else {
               htmlmenu = "";
            }
            $("#menupage").append(htmlmenu);
         }
      })
      .catch(function (err) {
         // cargarMenu("00");
      });
}

function cargarSubMenu(id, nombre) {
   const data = new URLSearchParams({
      menupsub: id,
      menupsubb: sessionStorage.getItem("rol"),
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
         for (let index = 0; index < response.length; index++) {
            $("#submenu" + nombre).append(`<a class="collapse-item" href='${page_root + makeSlug(response[index].descripcion) + "/"}'">${response[index].descripcion}</a>`);
         }
      })
      .catch(function (err) {
      });
}

function objetos(id) {
   const data = new URLSearchParams({
      codmenup: id,
      hashmenuob: "$('#num_fac').val()"
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
         if (response == '') {
            if (sessionStorage.getItem("nombre") === null) {
               history.pushState({}, '');
               history.pushState(null, "", page_root + "iniciar-sesion/");
               objetos('iniciar-sesion');
            } else {
               history.pushState({}, '');
               history.pushState(null, "", page_root + "inicio/");
               objetos('inicio');
            }
         } else {
            for (let index = 0; index < response.length; index++) {
               $(".container-fluid").load(`${page_root + response[index].objeto + '/'}`);
               $(".notificacion-danger, .notificacion-success").hide();
            }
         }
      })
      .catch(function (err) {
      });
}


function makeSlug(text) {
   var a = 'àáäâèéëêìíïîòóöôùúüûñçßÿœæŕśńṕẃǵǹḿǘẍźḧ·/_,:;';
   var b = 'aaaaeeeeiiiioooouuuuncsyoarsnpwgnmuxzh------';
   var p = new RegExp(a.split('').join('|'), 'g');

   return text.toString().toLowerCase().replace(/\s+/g, '-')
      .replace(p, function (c) {
         return b.charAt(a.indexOf(c));
      })
      .replace(/&/g, '-y-')
      .replace(/[^\w\-]+/g, '')
      .replace(/\-\-+/g, '-')
      .replace(/^-+/, '')
      .replace(/-+$/, '');
}

function iniciarSesion() {
   const data = new URLSearchParams({
      usuario: $('#usuario').val(),
      clave: $('#clave').val()
   });
   fetch(urlBase + 'sesion/', {
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
         if (response.error == true) {
            console.log(response.msg);
            $(".notificacion-success").hide();
            $(".notificacion-danger").show();
            $(".notificacion-danger").html(response.msg);
         } else {
            $(".navbar-nav, .navbar").removeClass("d-none");
            $(".navbar-nav-menu").show();
            for (let index = 0; index < response.length; index++) {
               sessionStorage.setItem("nombre", response[index].nombre);
               sessionStorage.setItem("rol", response[index].rol);
               sessionStorage.setItem("idpe", response[index].idpe);
               window.location.href = `${page_root + "inicio/"}`;
            }
         }
      })
      .catch(function (err) {
      });
}
function cerrarSesion() {
   localStorage.clear();
   sessionStorage.clear();
   window.location.href = `${page_root + "iniciar-sesion/"}`;
}


function cargarCombo(url, id_formulario, id_combo, blanco, text, codigo_princ, predeterminado, funcion) {
   var cb = document.getElementById(id_combo);
   cb.options.length = 0; //Limpiar el combo
   cb.options.add(new Option("Cargando...", "Cargando..."));
   $.ajax({
      type: "POST",
      url: url,
      data: { id: id_combo, idprin: codigo_princ },// Pasar todos los datos del formulario como parametro
      // data: jQuery("#" + id_formulario).serialize(), // Pasar todos los datos del formulario como parametro
      success: function (data) //funcion que se llama al terminar la petición AJAX
      {
         cb.options.length = 0; //Limpiar el combo
         if (blanco == true)
            cb.options.add(new Option(text, ""));// Primera opcion en blanco

         var json = jQuery.parseJSON(data);  //Pasar los datos al formato JSON, que es el que interpreta javascript
         for (i = 0; i < json.length; i++) {
            cb.options.add(new Option(json[i].nombre, json[i].id));
         }

         if (predeterminado)
            cb.value = predeterminado;
         if (funcion)
            funcion(cb, predeterminado);

      }
   });

}

// function cargarCombox(id, msg) {
//   const data = new URLSearchParams({
//       menup: id,
//       idp: sessionStorage.getItem("idpe"),
//       hashmenu: "$('#num_fac').val()"
//    });
//    fetch(urlBase + 'combox/', {
//       method: 'POST',
//       body: data
//    })
//       .then(function (response) {
//          if (response.ok) {
//            $("#"+id).empty();
//             $("#"+id).html(`<option value="0">${msg}</option>`);
//             return response.json();
//          } else {
//             throw "Error en la llamada Ajax";
//          }
//       })
//       .then(function (response) {
//           for (let index = 0; index < response.length; index++) {
//               $("#"+id).append(`
//                   <option value="${response[index].id}" >${response[index].nombre}</option>
//               `);
//           }
//       })
//       .catch(function (err) {
//       });
// }

function capitalizarPalabras(val) {
   return val.toLowerCase()
      .trim()
      .split(' ')
      .map(v => v[0].toUpperCase() + v.substr(1))
      .join(' ');
}

// let username = 'Max Brown';
// // Set a Cookie
// function setCookie(cName, cValue, expDays) {
//         let date = new Date();
//         date.setTime(date.getTime() + (expDays * 24 * 60 * 60 * 1000));
//         const expires = "expires=" + date.toUTCString();
//         document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
// }
// // Apply setCookie
// setCookie('username', username, 30);

function register() {
   const data = new FormData(document.getElementById('register'));
   data.append('register', "d");
   fetch(urlBase + 'sesion/', {
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
         console.log(response);
      })
      .catch(function (err) {
         console.log(err);
      });
}


function valida() { return validar("formulario"); }

function validar_agregar() { return valida() };

function hideproceso(procesarid) {
   $("#procesar").val(procesarid);
   if (procesarid == 1) {
      $(".btnprocesar").html('Guardar');
      $(".btnprocesar").removeClass("btn-warning").addClass('btn-success');
   }
   if (procesarid == 2) {
      $(".btnprocesar").html('Modificar');
      $(".btnprocesar").removeClass("btn-success").addClass('btn-warning');
   }
}

function procesar(id, urlapi) {
   $.ajax({
      type: "POST",
      url: urlBase + urlapi,
      data: form_values(id),
      success: function (data) {
         var r = jQuery.parseJSON(data);
         if (r.error == false) {
            alert(r.msg);
            window.location.reload();
            // $('#myModal').modal('hide');
         } else {
            alert(r.msg);
            window.location.reload();
         }
      }
   });
}

/* *********************************************************************************************************** */

function mostrarf(tid, id, idform, param) {
   $.post(urlBase + param, { tid: tid, id: id }, function (data) { asignar_json(idform, data); });
};



/* *********************************************************************************************************** */

// function modificarf(id) {

// 	// if (validar_agregar() == false) return; //Llamar a la funcion de validaci�n

// 	if (!confirm("Realmente desea modificar el registro seleccionado?")) return;



// 	$.ajax({

// 		type: "POST",

// 		url: urlBase + "datatabledriu/",

// 		data: form_values(id),



// 		success: function (data) {

// 			var r = jQuery.parseJSON(data);

// 			alert(r.msg);
// 			// $("#danger-ss").show();
// 			// $("#danger-ss").html(r.msg);

// 			if (r.error == false) {
// 				alert(r.msg);
// 				// $('#myModal').modal('hide');


// 			}

// 		}


// 	});
// }













/* *********************************************************************************************************** */




// function eliminarf(id) {



// 	// alert("eliminar");
// 	if (!confirm("Realmente desea eliminar el registro seleccionado?")) return;



// 	$.ajax({

// 		type: "POST",

// 		url: page_root + e,

// 		data: form_values(id),



// 		success: function (data) {

// 			var r = jQuery.parseJSON(data);

// 			// alert(r.msg);
// 			$("#danger-ss").show();
// 			$("#danger-ss").html(r.msg);

// 			if (r.error == false) {
// 				alert(r.msg);
// 				$('#myModal').modal('hide');

// 			}

// 		}

// 	});
// }


function asignar_json(formulario, s_json) {
   var datos = jQuery.parseJSON(s_json); //Convertir los datos a una estructura
   var campo;
   for (campo in datos) //Recorrer estructura para asignar los datos
   {
      asignar_valor(formulario, campo, datos[campo]);
   }
}

function asignar_valor(formulario, nombre, valor) {
   var obj = $("#" + formulario).find("*[name=" + nombre + "]");
   if (obj.length == 0) { }
   else if (obj.length == 1) {
      if ($(obj[0]).hasClass("tinymce")) {
         console.log(obj[0]);
         console.log(obj[0].name);
         tinyMCE.get(obj[0].name).setContent(valor);
      }
      else {
         obj[0].value = valor;
      }
   }
   else {
      for (i = 0; i < obj.length; i++) {
         if (obj[i].value == valor) obj[i].checked = true;
      }
   }
}



function stripHTML(cadena) {
   // cadena=cadena.replace(/<[^>]+>/g,'\n');
   // cadena=cadena.replace(/\n\n/g,'\n');
   return jQuery.trim(cadena);
}

function URLDecode(encodedString) {
   var output = encodedString;
   output = output.replace(/\+/g, '%20');
   var binVal, thisString;
   var myregexp = /(%[^%]{2})/;
   while ((match = myregexp.exec(output)) != null && match.length > 1 && match[1] != '') {
      binVal = parseInt(match[1].substr(1), 16);
      thisString = String.fromCharCode(binVal);
      output = output.replace(match[1], thisString);
   }
   return output;
}

function URLEncode(str) {
   var histogram = {}, histogram_r = {}, code = 0, tmp_arr = [];
   var ret = str.toString();
   var replacer = function (search, replace, str) {
      var tmp_arr = [];
      tmp_arr = str.split(search);
      return tmp_arr.join(replace);
   };
   histogram['!'] = '%21';
   histogram['%20'] = '+';
   ret = encodeURIComponent(ret);
   for (search in histogram) {
      replace = histogram[search];
      ret = replacer(search, replace, ret) // Custom replace. No regexing
   }
   return ret.replace(/(\%([a-z0-9]{2}))/g, function (full, m1, m2) {
      return "%" + m2.toUpperCase();
   });
   return ret;
}

function validar(form_id) {
   $("#" + form_id + " div.error").html("");
   if ($("#" + form_id).valid() == false) {
      // var html=$("#" + form_id + " div.error").html();
      // alert( "Por favor revise los siguientes campos: \n\n" + stripHTML (html) );
      return false;
   }
   return true;
}

function form_values(form) {
   var s = "";
   var f = document.getElementById(form);
   if (f) {
      for (i = 0; i < f.elements.length; i++) {
         var e = f.elements[i];
         if (e.name) {
            if (e.type == "textarea" && e.className == "mceAdvanced") {
               var t = tinyMCE.get(e.name).getContent();
               s += e.name + "=" + URLEncode(t) + "&";
            }
            else if (e.name && !((e.type == "radio" || e.type == "checkbox") && e.checked == false) && e.value) {
               s += e.name + "=" + URLEncode(e.value) + "&";
            }
            else if (e.type == "textarea" || e.type == "select-one" || e.type == "text" || e.type == "hidden" || e.type == "password") {
               if ($(e).hasClass("tinymce")) {
                  var t = tinyMCE.get(e.name).getContent();
                  s += e.name + "=" + URLEncode(t) + "&";
               }
               else {
                  if (e.value) {
                     s += e.name + "=" + URLEncode(e.value) + "&";
                  } else {
                     s += e.name + "=NULL&";
                  }
               }
            }
            else if (e.type == "select-multiple") {
               var ops = e.options;
               var t = "";
               for (i = 0; i < ops.length; i++) {
                  if (ops[i].selected == true) {
                     t += e.name + "=" + URLEncode(ops[i].value) + "&";
                  }
               }
               if (t == "") {
                  s += e.name + "=NULL&";
               }
               else {
                  s += t;
               }
            }
         }
      }
   }
   if (s != "") s = s.substring(0, s.length - 1);
   return s;
}





function bloquear_entradas(formulario) {
   $("#" + formulario).find("input:text, select, textarea").each(function (index, element) {
      element.disabled = true;
   });
}

function bloquear_no_modifibles(formulario) {
   $("#" + formulario).find("input:text, select, textarea").each(function (index, element) {
      if (element.getAttribute("modificar") == "N") {
         element.disabled = true;
      }
   });
}

function desbloquear_entradas(formulario) {
   $("#" + formulario).find("input:text, select, textarea").each(function (index, element) {
      element.disabled = false;
   });
}

function asignar_json(formulario, s_json) {
   var datos = jQuery.parseJSON(s_json); //Convertir los datos a una estructura
   var campo;
   for (campo in datos) //Recorrer estructura para asignar los datos
   {
      asignar_valor(formulario, campo, datos[campo]);
   }
}

function asignar_valor(formulario, nombre, valor) {
   var obj = $("#" + formulario).find("*[name=" + nombre + "]");
   if (obj.length == 0) { }
   else if (obj.length == 1) {
      if ($(obj[0]).hasClass("tinymce")) {
         console.log(obj[0]);
         console.log(obj[0].name);
         tinyMCE.get(obj[0].name).setContent(valor);
      }
      else {
         obj[0].value = valor;
      }
   }
   else {
      for (i = 0; i < obj.length; i++) {
         if (obj[i].value == valor) obj[i].checked = true;
      }
   }
}

function anular(e) {
   tecla = (document.all) ? e.keyCode : e.which;
   return (tecla != 13);
}


function clave(numero) {
   if (numero == 11) {
      document.form.clave.value = "";
   } else {
      document.form.clave.value += numero;
   }
   return;
}

function SoloNumeros(evt) {
   if (window.event) {//asignamos el valor de la tecla a keynum
      keynum = evt.keyCode; //IE
   }
   else {
      keynum = evt.which; //FF
   }
   //comprobamos si se encuentra en el rango numérico y que teclas no recibirá.
   if ((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13 || keynum == 6) {
      return true;
   }
   else {
      return false;
   }
}

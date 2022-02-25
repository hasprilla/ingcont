 //
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

 (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
 })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
 ga('create', 'UA-88224501-1', 'auto');
 ga('send', 'pageview');

$(document).ready(function() {
    if (window.sessionStorage) {
      if(sessionStorage.getItem("rol") == null)
      {
        $(".navbar-nav-menu").hide();
        cargarMenu('0');
      }else {
        $(".navbar-nav-menu").show();
        cargarMenu(sessionStorage.getItem("idpe"));
        $(".name-profile").html(capitalizarPalabras(sessionStorage.getItem("nombre")));
      }
    }else{
      throw new Error('Tu Browser no soporta sessionStorage!');
    }
    if(localStorage.getItem("dataId") == null){
        objetos('inicio');
    }else{
        objetos(u[2]);
    }

});

function cargarMenu(id)
{
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
              if(response[index].hijos > 0)
              {
                href = 'href="#"';
                datatoggle = 'data-toggle="collapse"';
                datatarget = `data-target="${"#"+response[index].nombre}"`;
                ariaexpanded = 'aria-expanded="true"';
                ariacontrols = 'aria-controls="collapseTwo"';
                eventoclick = "";
              }else{
                href = '';
                datatoggle = '';
                datatarget = ''
                ariaexpanded = '';
                ariacontrols = '';
                eventoclick = `onclick="objetos('${makeSlug(response[index].nombre)}'); recargar('${page_root + makeSlug(response[index].nombre) + "/"}')"`;
              }
                if(response[index].padre === null)
                {
                 htmlmenu = `  <li class="nav-item active">
                       <a class="nav-link collapsed" ${eventoclick} ${href} ${datatoggle} ${datatoggle} ${datatarget} ${ariaexpanded} ${ariacontrols}>
                           <i class="fas fa-fw fa-tachometer-alt"></i>
                           <span>${response[index].nombre}</span>
                       </a>
                       <div id="${response[index].nombre}" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                           <div class="bg-white py-2 collapse-inner rounded submenu${response[index].nombre}" id="submenu${response[index].nombre}" >
                           </div>
                       </div>
                   </li>`;
                cargarSubMenu(response[index].codigo, response[index].nombre);
               }else{
                   htmlmenu = "";
               }
              $("#menupage").append(htmlmenu);
            }
        })
        .catch(function (err) {
          cargarMenu("00");
        });
}

function cargarSubMenu(id, nombre)
{
    const data = new URLSearchParams({
        menupsub: id,
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
               $("#submenu"+nombre).append(`<a class="collapse-item" onclick="objetos('${makeSlug(response[index].descripcion)}'); recargar('${page_root + makeSlug(response[index].descripcion) + "/"}')">${response[index].descripcion}</a>`);
          }
        })
        .catch(function (err) {
        });
}

function objetos(id)
{
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
            for (let index = 0; index < response.length; index++) {
               localStorage.setItem("dataId", "dataId");
                history.pushState({}, '');
                history.pushState(null, "", page_root + makeSlug(response[index].descripcion) + "/");
                $ (".container-fluid").load(`${ page_root + response[index].objeto + '/'}`);
                $(".notificacion-danger, .notificacion-success").hide();
                cargarConvo();
                cargarRequisitos();
                cargarContent(response[index].id);
                window.scrollTo(0,0);
            }
        })
        .catch(function (err) {
        });
}

function recargar(href){
    history.pushState({}, '');
    history.pushState(null, "", href);
    // window.scrollTo(0,0);
  }

function cargarContent(id)
{
    const data = new URLSearchParams({
        content: id,
        hashcontent: "$('#num_fac').val()"
     });
     fetch(urlBase + 'inicio/', {
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
              $("#datacontent").append(`  <div class="col-lg-12 py-3">  <div class="card shadow mb-12">
                    <div class="card-header ">
                        <h6 class="m-0 font-weight-bold text-success">${response[index].titulo}</h6>
                    </div>
                    <div class="card-body">
                        ${response[index].html}
                        </div>
                    </div>
                </div>`);
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

  function cargarConvo() {
    const data = new URLSearchParams({
        codconvo: "id",
        hashconvo: "$('#num_fac').val()"
     });
     fetch(urlBase + 'convoc/', {
        method: 'POST',
        body: data
     })
        .then(function (response) {
           if (response.ok) {
             $(".convocatorias").empty();
              return response.json();
           } else {
              throw "Error en la llamada Ajax";
           }
        })
        .then(function (response) {
            for (let index = 0; index < response.length; index++) {
              $(".convocatorias").append(`
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success">${response[index].descripcionprimaria}</h6>
                    </div>
                    <div class="card-body">
                      <div class="row">
                       <div class="col-md-9 col-sm-9">
                         ${response[index].descripcionsecundaria}
                       </div>
                       <div class="col-md-3 col-sm-3">
                          <div><strong>Fecha de inicio: </strong>${response[index].fa}</div>
                          <div><strong>Fecha de cierre: </strong>${response[index].fc}</div>
                              <hr class="sidebar-divider d-none d-md-block">
                          <button class="btn btn-lg btn-success btn-icon-split" data-toggle="modal" data-target="#convoModal" onclick="inscrip('${response[index].codigo}', '${response[index].descripcionprimaria}', '${response[index].pe}')">
                              <span class="icon text-white-50">
                                  <i class="fas fa-flag"></i>
                              </span>
                              <span class="text">Inscripción</span>
                          </button>
                       </div>
                     </div>

                    </div>
                </div>
              `);
            }
        })
        .catch(function (err) {
          cargarConvo();
        });
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
            if(response.error == true)
            {
              $(".notificacion-success").hide();
              $(".notificacion-danger").show();
              $(".notificacion-danger").html(response.msg);
            }else {
              $(".navbar-nav-menu").show();
              for (let index = 0; index < response.length; index++) {
                cargarMenu(response[index].idpe);
                $(".name-profile").html(capitalizarPalabras(response[index].nombre));
                sessionStorage.setItem("nombre", response[index].nombre);
                sessionStorage.setItem("rol", response[index].rol);
                sessionStorage.setItem("idpe", response[index].idpe);
                objetos('inicio');
              }
            }
          })
          .catch(function (err) {
          });
    }

    function inscrip(codigo, descripcionprimaria, pe) {
      $(".notificacion-danger, .notificacion-success").hide();
      localStorage.setItem("idcon", codigo);
      localStorage.setItem("idpe", pe);
      $(".inscripcion").html("CONFIRMAR SOLICITUD DE INSCRIPCIÓN EN " + descripcionprimaria);
    }

    function coninscrip() {
      const data = new URLSearchParams({
          usuario: $('#usuario').val(),
          clave: $('#clave').val(),
          cod_periodo: localStorage.getItem("idpe"),
          cod_periodo: localStorage.getItem("idpe"),
          convocatoria: localStorage.getItem("idcon")
       });
       fetch(urlBase + 'convoc/', {
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
            if(response.error == true)
            {
              $(".notificacion-success").hide();
              $(".notificacion-danger").show();
              $(".notificacion-danger").html(response.msg);
            }else {
              $(".notificacion-danger").hide();
              $(".notificacion-success").show();
              $(".notificacion-success").html(response.msg);
            }
          })
          .catch(function (err) {
          });
    }
    function cerrarSesion(){
      $('#logoutModal').modal('toggle');
      $(".navbar-nav-menu").hide();
      localStorage.clear();
      sessionStorage.clear();
      cargarMenu('0');
      objetos('inicio');
    }

  function cargarCombox(id, msg) {
    const data = new URLSearchParams({
        menup: id,
        idp: sessionStorage.getItem("idpe"),
        hashmenu: "$('#num_fac').val()"
     });
     fetch(urlBase + 'combox/', {
        method: 'POST',
        body: data
     })
        .then(function (response) {
           if (response.ok) {
             $("#"+id).empty();
              $("#"+id).html(`<option value="0">${msg}</option>`);
              return response.json();
           } else {
              throw "Error en la llamada Ajax";
           }
        })
        .then(function (response) {
            for (let index = 0; index < response.length; index++) {
                $("#"+id).append(`
                    <option value="${response[index].id}" >${response[index].nombre}</option>
                `);
            }
        })
        .catch(function (err) {
        });
  }

  function cargarRequisitos(){
    const data = new URLSearchParams({
        requi: "g",
        idp: sessionStorage.getItem("idpe"),
        hashrequi: "$('#num_fac').val()"
     });
     fetch(urlBase + 'convoc/', {
        method: 'POST',
        body: data
     })
        .then(function (response) {
           if (response.ok) {
             $("#requisitosminimos").empty();
              return response.json();
           } else {
              throw "Error en la llamada Ajax";
           }
        })
        .then(function (response) {
          var estado = "";
          var clase = "";
          var ver = "";
          var eliminar = "";
            for (let index = 0; index < response.length; index++) {
              if(response[index].estado == 0)
              {
                estado = "Aun no se ha cargado el archivo";
                clase = "table-primary";
                ver = "";
                eliminar = "";
              }else if(response[index].estado == 1){
                estado = "Archivo pendiente a revisión";
                clase = "table-success";
                ver = `<a type="button" class="btn btn-success" href="${urlBase+'requisitos/?id='+response[index].id}" target="_blank" > <i class="fas fa-file-pdf"></i> </a>`;
                // ver = `<button type="button" class="btn btn-success" onclick="verRequisito('${response[index].id}')"><i class="fas fa-file-pdf"></i></button>`;
                eliminar = `<button type="button" class="btn btn-danger" onclick="eliminarRequisito('${response[index].id}')"><i class="fas fa-trash-alt"></i></button>`;
              }else{
                estado = "Archivo eliminado por el usuario";
                clase = "table-danger";
                ver = "";
                eliminar = "";
              }
                $("#requisitosminimos").append(`
                  <tr>
                      <td>${index + 1}</td>
                      <td>${response[index].nombre}</td>
                      <td class="${clase}">${estado}</td>
                      <td>${ver}</td>
                      <td>${eliminar}</td>
                  </tr>
                `);
            }
        })
        .catch(function (err) {

        });
  }
  function cargarArchivos() {
    var cod = document.getElementById("requisitos");
    const formData = new FormData();
    const fileField = document.getElementById('archivo');
    formData.append('idar', cod.value);
    formData.append('idardesc', cod.options[cod.selectedIndex].text);
    formData.append('idpe', sessionStorage.getItem("idpe"));
    formData.append('archivo', fileField.files[0]);
    fetch(urlBase + 'convoc/', {
      method: 'POST',
      body: formData
    })
    .then((response) => response.json())
    .then((result) => {
      console.log('Success:', result.msg);
      cargarCombox('requisitos', 'Seleccione el requisito');
      cargarRequisitos();
    })
    .catch((error) => {
      console.error('Error:', error);
    });
  }

  function eliminarRequisito(id) {
    const data = new URLSearchParams({
        elirequi: id,
        haselmirequi: "$('#num_fac').val()"
     });
     fetch(urlBase + 'convoc/', {
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
            cargarRequisitos();
        })
        .catch(function (err) {
        });
  }

  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.image-upload-wrap').hide();
      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();
      $('.image-title').html(input.files[0].name);
    };
    reader.readAsDataURL(input.files[0]);
  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
});

function capitalizarPalabras(val) {
  return val.toLowerCase()
            .trim()
            .split(' ')
            .map( v => v[0].toUpperCase() + v.substr(1) )
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

function register(){
  // alert($("#register").serialize());

  const data = new FormData(document.getElementById('register'));
  data.append('register', "d");
  // alert(data.idar);
  fetch(urlBase + 'sesion/', {
     method: 'POST',
     body: data
  })
  .then(function(response) {
     if(response.ok) {
         return response.json();
     } else {
         throw "Error en la llamada Ajax";
     }

  })
  .then(function(response) {
     console.log(response);
  })
  .catch(function(err) {
     console.log(err);
  });
}

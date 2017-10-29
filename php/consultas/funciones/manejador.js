$(function () {
   var direccion="";

     $('#formularioCobro').on('submit',function (e) {
       e.preventDefault();
       var formData = new FormData(document.getElementById('formularioCobro'));
       $.ajax({
           url:"dentista/cobro/controlCobro.php",
           type:"post",
           datatype:'html',
           data:formData,
           cache:false,
           contentType:false,
           processData:false
       })
       
           .done(function (res) {
               $('#mensaje').animate({
                   top:'0%'
               });
               var resultado=res.split("-");
               direccion=resultado[1];
               var padre=document.getElementById('cuerpoMensaje');
               padre.innerHTML=resultado[0];
           })
   })

     $('#cambiarContrasena').on('submit',function(e){
e.preventDefault();

var formData=new FormData(document.getElementById('cambiarContrasena'));
$.ajax({
  url:'paciente/cuenta/recibeClave.php',
       type:'post',
       dataType:'html',
       data:formData,
       cache:false,
       contentType:false,
       processData:false,
       })
      
      .done(function(res){
        $('#mensaje').animate({
       left: '0%'
      });
         var resultado=res.split("-");
         direccion=resultado[1];
         var mensaje=resultado[0];
         var padre=document.getElementById('cuerpoMensaje');
         padre.innerHTML=mensaje;
});
})

   $('#modificaPaciente').on('submit',function (e) {
       e.preventDefault();
       var formData = new FormData(document.getElementById('modificaPaciente'));
       $.ajax({
           url:"consultas/funciones/modificar_paciente.php",
           type:"post",
           datatype:'html',
           data:formData,
           cache:false,
           contentType:false,
           processData:false
       })
       
           .done(function (res) {
               $('#mensaje').animate({
                   top:'0%'
               });
               var resultado=res.split("-");
               direccion=resultado[1];
               var padre=document.getElementById('cuerpoMensaje');
               padre.innerHTML=resultado[0];
           })
   })

      $('#nuevoInventario').on('submit',function (e) {
       e.preventDefault();
       var formData = new FormData(document.getElementById('nuevoInventario'));
       formData.append("Enviar","Registrar");
       $.ajax({
           url:"recepcionista/inventario/control_inventario.php",
           type:"post",
           datatype:'html',
           data:formData,
           cache:false,
           contentType:false,
           processData:false
       })
       
           .done(function (res) {
               $('#mensaje').animate({
                   top:'0%'
               });
               var resultado=res.split("-");
               direccion=resultado[1];
               var padre=document.getElementById('cuerpoMensaje');
               padre.innerHTML=resultado[0];
           })
   })

      $('#modificaInventario').on('submit',function (e) {
       e.preventDefault();
       var formData = new FormData(document.getElementById('modificaInventario'));
       formData.append("Enviar","Modificar");
       $.ajax({
           url:"recepcionista/inventario/control_inventario.php",
           type:"post",
           datatype:'html',
           data:formData,
           cache:false,
           contentType:false,
           processData:false
       })
       
           .done(function (res) {
               $('#mensaje').animate({
                   top:'0%'
               });
               var resultado=res.split("-");
               direccion=resultado[1];
               var padre=document.getElementById('cuerpoMensaje');
               padre.innerHTML=resultado[0];
           })
   })
   
$('#cerrarMensaje').click(function () {
        $('#mensaje').animate({
            top:'-100%'
        });
    
        if(direccion!=undefined){
            setTimeout((function () {
                window.location.replace(direccion)
            }),200);
        }
    })
    $('#formularioRegistro').on('submit',function (e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById('formularioRegistro'));
        $.ajax({
            url:"controladores/ControlRegistroUsuarioPaciente.php",
            type:"post",
            datatype:'html',
            data:formData,
            cache:false,
            contentType:false,
            processData:false
        })

            .done(function (res) {
                $('#mensaje').animate({
                    top:'0%'
                });
                var resultado=res.split("-");
                direccion=resultado[1];
                var padre=document.getElementById('cuerpoMensaje');
                padre.innerHTML=resultado[0];
            })
    })


     $('#nuevoPaciente').on('submit',function (e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById('nuevoPaciente'));
        formData.append("Enviar","Registrar");
        $.ajax({
            url:"recepcionista/paciente/control_paciente.php",
            type:"post",
            datatype:'html',
            data:formData,
            cache:false,
            contentType:false,
            processData:false
        })

            .done(function (res) {
                $('#mensaje').animate({
                    top:'0%'
                });
                var resultado=res.split("-");
                direccion=resultado[1];
                var padre=document.getElementById('cuerpoMensaje');
                padre.innerHTML=resultado[0];
            })
    })

     $('#modificaPaciente').on('submit',function (e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById('modificaPaciente'));
        formData.append("Enviar","Modificar");
        $.ajax({
            url:"recepcionista/paciente/control_paciente.php",
            type:"post",
            datatype:'html',
            data:formData,
            cache:false,
            contentType:false,
            processData:false
        })

            .done(function (res) {
                $('#mensaje').animate({
                    top:'0%'
                });
                var resultado=res.split("-");
                direccion=resultado[1];
                var padre=document.getElementById('cuerpoMensaje');
                padre.innerHTML=resultado[0];
            })
    })
});

function confirmar(idUsuarios,Status) 
{
$('#confirmar').animate({
        top: '0%'
    });
    $('#no').click(function () {
        $('#confirmar').animate({
            top: '-100%'
        })
    });
    $('#si').click(function () {
        $('#confirmar').animate({
            top: '-100%'
        });
        eliminar(idUsuarios,Status);
    })
}
function eliminar(idUsuarios,Status) {
    var formData = new FormData();
    formData.append("idUsuarios", idUsuarios);
    formData.append("action","eliminar");
    formData.append("Status",Status);
    $.ajax({
        url:"consultas/funciones/eliminar_modificar.php",
        type:"post",
        datatype:'html',
        data:formData,
        cache:false,
        contentType:false,
        processData:false
    })

        .done(function (res) {
            $('#mensaje').animate({
                top:'0%'
            });
            var resultado=res.split("-");
            direccion=resultado[1];
            var padre=document.getElementById('cuerpoMensaje');
            padre.innerHTML=resultado[0];
        })
}
function agendaCita(hora,dentista) {
    var formData = new FormData(document.getElementById('formFecha'));
    formData.append("hora",hora);
    formData.append("dentista",dentista);
    $.ajax({
        url:"consultas/funciones/ingresaCita.php",
        type:"post",
        datatype:'html',
        data:formData,
        cache:false,
        contentType:false,
        processData:false
    })

        .done(function (res) {
            $('#mensaje').animate({
                top:'0%'
            });
            var resultado=res.split("-");
            direccion=resultado[1];
            var padre=document.getElementById('cuerpoMensaje');
            padre.innerHTML=resultado[0];
        })

}


function agendaCitaRecepcionista(hora,dentista,idUsuario){
  var fecha=document.getElementById("fecha_cita").value; 
  var asunto=document.getElementById("asunto").value; 
    var formData = new FormData();
    formData.append("hora",hora);
    formData.append("dentista",dentista);
    formData.append("idUsuario",idUsuario);
    formData.append("asunto",asunto);
    formData.append("fecha",fecha);
    $.ajax({
        url:"recepcionista/cita/controlCita.php",
        type:"post",
        datatype:'html',
        data:formData,
        cache:false,
        contentType:false,
        processData:false
    })

        .done(function (res){
            $('#mensaje').animate({
                top:'0%'
            });
            var resultado=res.split("-");
            direccion=resultado[1];
            
            var padre=document.getElementById('cuerpoMensaje');
            padre.innerHTML=resultado[0];
        })

        $('#cerrarMensaje').click(function () {
        $('#mensaje').animate({
            top:'-100%'
        });
    
        if(direccion!=undefined){
            setTimeout((function () {
                window.location.replace(direccion)
            }),200);
        }
    })
}

function agendaCitaPaciente(hora,dentista,idUsuario){
  var fecha=document.getElementById("fecha_cita").value; 
  var asunto=document.getElementById("asunto").value; 
    var formData = new FormData();
    formData.append("hora",hora);
    formData.append("dentista",dentista);
    formData.append("idUsuario",idUsuario);
    formData.append("asunto",asunto);
    formData.append("fecha",fecha);
    $.ajax({
        url:"paciente/cita/controlCita.php",
        type:"post",
        datatype:'html',
        data:formData,
        cache:false,
        contentType:false,
        processData:false
    })

        .done(function (res){
            $('#mensaje').animate({
                top:'0%'
            });
            var resultado=res.split("-");
            direccion=resultado[1];
            
            var padre=document.getElementById('cuerpoMensaje');
            padre.innerHTML=resultado[0];
        })

        $('#cerrarMensaje').click(function () {
        $('#mensaje').animate({
            top:'-100%'
        });
    
        if(direccion!=undefined){
            setTimeout((function () {
                window.location.replace(direccion)
            }),200);
        }
    })
}

function agendaCitaDentista(hora,dentista,idUsuario){
  var fecha=document.getElementById("fecha_cita").value; 
  var asunto=document.getElementById("asunto").value; 
    var formData = new FormData();
    formData.append("hora",hora);
    formData.append("dentista",dentista);
    formData.append("idUsuario",idUsuario);
    formData.append("asunto",asunto);
    formData.append("fecha",fecha);
    $.ajax({
        url:"dentista/cita/controlCita.php",
        type:"post",
        datatype:'html',
        data:formData,
        cache:false,
        contentType:false,
        processData:false
    })

        .done(function (res){
            $('#mensaje').animate({
                top:'0%'
            });
            var resultado=res.split("-");
            direccion=resultado[1];
            
            var padre=document.getElementById('cuerpoMensaje');
            padre.innerHTML=resultado[0];
        })

        $('#cerrarMensaje').click(function () {
        $('#mensaje').animate({
            top:'-100%'
        });
    
        if(direccion!=undefined){
            setTimeout((function () {
                window.location.replace(direccion)
            }),200);
        }
    })
}

function liquidar(id_pago)
{
var formData = new FormData();
    formData.append("id_pago",id_pago);
    $.ajax({
        url:"recepcionista/pago/controlPago.php",
        type:"post",
        datatype:'html',
        data:formData,
        cache:false,
        contentType:false,
        processData:false
    })

        .done(function (res){
            $('#mensaje').animate({
                top:'0%'
            });
            var resultado=res.split("-");
            direccion=resultado[1];
            
            var padre=document.getElementById('cuerpoMensaje');
            padre.innerHTML=resultado[0];
        })
}

function verIndicacion(id_receta)
{
  $('#detalleRevisiones').animate({
        top: '0%'
      });
var formData = new FormData();
formData.append("id_receta",id_receta);
$.ajax({
                url: "paciente/receta/obtenDetalle.php",
                type: "post",
                dataType: "html",
                data: formData,
                cache: false,
                contentType: false,
                processData: false
            })
                .done(function(res){
               
               var padre=document.getElementById('cuerpoDetalleRevisiones');
               padre.innerHTML=res;
                });
}



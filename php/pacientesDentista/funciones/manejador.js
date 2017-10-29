$(function () {
   var direccion="";
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
    $('#formFecha').on('submit',function (e) {
        e.preventDefault();
        var fecha=document.getElementById('fecha_cita').value;
        var asunto=document.getElementById('asunto').value;
        var idUsuarios=document.getElementById('idUsuario').value;
        window.location.replace('PrincipalPaciente.php?action=agendaCita&fecha='+fecha+"&asunto="+asunto+"&idUsuarios="+idUsuarios);
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
});

function confirmar(idUsuarios,Status) {
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

function agenda_cita(hora,dentista) {
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

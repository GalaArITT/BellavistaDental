<?php
    error_reporting(E_ERROR | E_PARSE);
    include('conexion.php')
?>
<h2>Agenda una cita al paciente <?php echo($_GET['paciente']); ?></h2>
<div id="col1">

    <script>
        function horario1()
        {
         
            var elemento = document.getElementById("horario1");
            elemento.className ="reservado";
        }

        function horario2()
        {
            var elemento = document.getElementById("horario2");
            elemento.className ="reservado";
        }

        function horario3()
        {
            var elemento = document.getElementById("horario3");
            elemento.className ="reservado";
        }

        function horario4()
        {
            var elemento = document.getElementById("horario4");
            elemento.className ="reservado";
        }

        function horario5()
        {
            var elemento = document.getElementById("horario5");
            elemento.className ="reservado";
        }

        function horario6()
        {
            var elemento = document.getElementById("horario6");
            elemento.className ="reservado";
        }

        function horario7()
        {
            var elemento = document.getElementById("horario7");
            elemento.className ="reservado";
        }

        function horario8()
        {
            var elemento = document.getElementById("horario8");
            elemento.className ="reservado";
        }

        function horario9()
        {
            var elemento = document.getElementById("horario9");
            elemento.className ="reservado";
        }

        function horario10()
        {
            var elemento = document.getElementById("horario10");
            elemento.className ="reservado";
        }

        function horario11()
        {
            var elemento = document.getElementById("horario11");
            elemento.className ="reservado";
        }
        function horario12()
        {
            var elemento = document.getElementById("horario12");
            elemento.className ="reservado";
        }
        function horario13()
        {
            var elemento = document.getElementById("horario13");
            elemento.className ="reservado";
        }
        function horario14()
        {
            var elemento = document.getElementById("horario14");
            elemento.className ="reservado";
        }
    </script>

    <?php 
    $sql_den="select * from dentistas";
    $result=mysql_query($sql_den);
    while($array=mysql_fetch_array($result))
    {
     $arregloDen[]=$array;
    }
   
    echo("<form  type='post' id='formularioAsunto'>");
    echo("<h3>Paso 2: Selecciona un dentista</h3>");
    echo("<select id='seleccDentista' onchange='buscaFecha()'>");
    echo("<option>Selecciona dentista</option>");
    foreach($arregloDen as $row) 
    {
     echo("<option value=".$row['idDentistas'].">".$row['Nombre_Dentista']." ".$row['Apellido_Dentista']."</option>");
    }
    echo("</select>");
    echo("</form>");
     ?>
   
    <?php
        date_default_timezone_set('America/Mazatlan');
        //asignamos a una variable la fecha actual
        $fecha_sistema=date('Y-m-d');
        //para agendar cita se debera tener como fecha minima 3 dias despues del dia actual
        //y  no despues de 1 mes del dia actual
        //establecemos la fecha minima con 4 dias a partir del dia actual
        $fecha_min=date('Y-m-d', strtotime('+2 days', strtotime($fecha_sistema)));
        //establecemos la fecha maxima con 1 mes a partir del dia actual
        $fecha_max = date('Y-m-d', strtotime('+1 month', strtotime($fecha_sistema)));
    ?>
    <form  type="post" id='formularioAsunto'>
         <h3>Paso 3: Selecciona una fecha y un asunto</h3>
        <input id="fecha_cita" type="date" value="<?php echo date('Y-m-d', strtotime($fecha_sistema. ' + 2 days')); ?>"  onchange="buscaFecha()" name="fecha" min="<?php echo  $fecha_min; ?>" max="<?php echo $fecha_max;?>";>
        <input type="text" placeholder="Asunto" id="asunto" name="asunto">
        <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo($_GET['idPac']); ?>">
    </form>

</div>

<div id="col2">
</div>

<script>

function buscaFecha()
{

  var dentista=document.getElementById("seleccDentista");  
  var id_dentista=dentista.options[dentista.selectedIndex].value;
   var nombreDentista=dentista.options[dentista.selectedIndex].text;
   if(nombreDentista!="Selecciona dentista")
   {
   var fecha=document.getElementById("fecha_cita").value; 
  var usuario=document.getElementById("idUsuario").value; 
  var asunto=document.getElementById("asunto").value; 

    var formData = new FormData();
     formData.append("id_dentista",id_dentista);
     formData.append("fecha",fecha);
     formData.append("idUsuario",usuario);
     formData.append("accion","obtenHorario");
        $.ajax({
            url:"recepcionista/cita/controlHorario.php",
            type:"post",
            datatype:'html',
            data:formData,
            cache:false,
            contentType:false,
            processData:false
        })

            .done(function (res) {
            var padre=document.getElementById("col2");
            padre.innerHTML=res;
            })

         var formData2 = new FormData();
         formData2.append("id_dentista",id_dentista);
         formData2.append("fecha",fecha);
         formData2.append("accion","horasDisponibles");
        $.ajax({
            url:"recepcionista/cita/controlHorario.php",
            type:"post",
             datatype:'html',
            data:formData2,
            cache:false,
            contentType:false,
            processData:false
        })

            .done(function (res) {
           
            horas=res.split('-');
            for (index = 0, len = horas.length; index < len; ++index) 
            {
            console.log(horas[index]);
            switch(horas[index]) 
            {
             case '10:00':
             horario1();
             break;

             case '10:30':
                    horario2();
                    break;
                case '11:00':
                    horario3();
                    break;
                case '11:30':
                    horario4();
                    break;
                case '12:00':
                    horario5();
                    break;
                case '12:30':
                    horario6();
                    break;
                case '15:00':
                    horario7();
                    break;
                case '15:30':
                    horario8();
                    break;
                case '16:00':
                    horario9();
                    break;
                case '16:30':
                    horario10();
                    break;
                case '17:00':
                    horario11();
                    break;
                case '17:30':
                    horario12();
                    break;
                case '18:00':
                    horario13();
                    break;
                case '18:30':
                    horario14();
                    break;
             
             default:
            
            }

            }
            })

   }
} 
</script>

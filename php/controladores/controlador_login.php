<?php 
 error_reporting(E_ERROR | E_PARSE);

/*FUNCION QUE RECIBE LAS VARIABLES QUE CONTIENEN EL USUARIO Y LA CONTRASEÑA*/

function conexiones($user,$contrasena)

{
 // echo("conexiones");
    /*DECLARAMOS LAS VARIABLES NECESARIAS PARA HACER LA CONEXION A LA BASE DE DATOS*/
    $servidor= "localhost";
    $usuario="root";
    $clave="";
    $base="proyectodental";
    $tipo_usuario;

    /*GUARDAMOS EN UNA VARIABLE LLAMADA CONEXION LA INSTRUCCION PARA CONECTAR A LA  BASE DE DATOS*/
    $conexion=@mysql_connect($servidor,$usuario,$clave);

   
    if($conexion)
    {
     mysql_select_db($base);
    }

     $sql="select * from usuarios where nombre_usuario='$user' and contrasena='$contrasena'";

     $ejecutar_sql=mysql_query($sql);
    
    if(mysql_num_rows($ejecutar_sql)!=0)
    {
        $tipo_user="";
        session_start();
        $_SESSION['usuario']=$user;
        
        $tipo = mysql_query("select TipoUsuario from usuarios where nombre_usuario='$user' and contrasena='$contrasena'");
        
        while($array=mysql_fetch_array($tipo))
        {
         $arregloTipo[]=$array;
        }
         
        foreach ($arregloTipo as $row) 
        {
         $tipo_user=$row['TipoUsuario'];
        }
   
        if($tipo_user=="1") 
        {
         $sql="select idPacientes from pacientes
               inner join usuarios
               on usuarios.idUsuarios=pacientes.idUsuarios
               where nombre_usuario='$user' and contrasena ='$contrasena' ";
               $result=mysql_query($sql);
               $id=mysql_fetch_array($result);
               $_SESSION['idPacientes']=$id['idPacientes'];
                $_SESSION['user']=$user;
               return $tipo_user;
        }

         if($tipo_user=="2") 
        {
         $sql="select  CONCAT(Nombre_Dentista,' ',Apellido_Dentista) as nombre,dentistas.idDentistas,dentistas.cedula_prof from dentistas
               inner join usuarios
               on usuarios.idUsuarios=dentistas.idUsuarios
               where nombre_usuario='$user' and contrasena ='$contrasena' ";
               //echo($sql);
               $result=mysql_query($sql);
               $id=mysql_fetch_array($result);
               $_SESSION['dentista']=$id['nombre'];
                $_SESSION['id']=$id['idDentistas'];
                 $_SESSION['ced']=$id['cedula_prof'];
               //echo( $_SESSION['dentista']);
               return $tipo_user;
        }

       if($tipo_user=="3") 
         {
          return $tipo_user;
         }

         if($tipo_user=="4") 
         {
          return $tipo_user;
         }



   
    }
}

    function verificar_usuario (){
            session_start();
            if($_SESSION['usuario']){
                return true;

            }
          
    }




?>
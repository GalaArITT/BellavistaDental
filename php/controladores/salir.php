<?php
include('controlador_login.php');
if (verificar_usuario())
{
    //si el usuario es verificado, se elimina los valores,se destruye la sesion y volvemos al formulario de ingreso
    session_unset();
    session_destroy();
    echo"<meta http-equiv='Refresh' content='0; url=../../index.php' />";

}
else
{
    //si el usuario no es verificado vuelve al formulario de ingreso
    //header ('Location:index.php?action=login');
}
?>

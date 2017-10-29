<!DOCTYPE html>
<head>
    <title>Bellavista-Dental Registro</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css"  href="../css/styleSignup.css">
    <link rel="stylesheet" type="text/css"  href="../css/w3css.css">
    <link rel="stylesheet" type="text/css"  href="../css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <link rel="icon" href="../IMG/blue.ico" />
    <script src="../JS/ValidarSU.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="consultas/funciones/manejador.js"></script>
    <link rel="stylesheet" href="../CSS/menuVerticalAdminitrador.css">
</head>
<body background="../IMG/fondoindx.jpg">
<?php
include ('Mensaje.php');
?>
    <div id="div1" class="col-md-6 col-md-offset-3 w3-border divP">
        <div class="w3-container w3-blue margenArriba ">
            <h1 class="text-center">Registro a nuevo usuario</h1>
            <img src="../IMG/logo.jpg" class="w3-round center-block">
        </div>
        <div id="cont">
            <form class="w3-container" method="post"  id ='formularioRegistro' onsubmit="return validar();">

                <label class="w3-label w3-text-blue"><b><h3>Nombre de usuario</h3></b></label>
                <input class="w3-input w3-border w3-light-grey" type="text" placeholder="Solo letras y números" id="idUser" name="txtuser" required maxlength="40">

                <label class="w3-label w3-text-blue"><b><h3>Contraseña</h3></b></label>
                <input class="w3-input w3-border w3-light-grey" type="password" id="idPass" name="txtcontrasena" required maxlength="40">

                <label class="w3-label w3-text-blue"><b><h3>Nombre/s</h3></b></label>
                <input class="w3-input w3-border w3-light-grey" type="text" placeholder="Solo texto" id="idNom" name="txtnombrepac" required maxlength="40" style="text-transform:uppercase">

                <label class="w3-label w3-text-blue"><b><h3>Apellido/s</h3></b></label>
                <input class="w3-input w3-border w3-light-grey" type="text" placeholder="Solo texto" id="idApe" name="txtapellido" required maxlength="40" style="text-transform:uppercase">

                <label class="w3-label w3-text-blue"><b><h3>Correo electronico</h3></b></label>
                <input class="w3-input w3-border w3-light-grey" placeholder="ejemplo@dominio.com" type="email" id="idEma" name="txtcorreo" required maxlength="40" style="text-transform:lowercase">

                <label class="w3-label w3-text-blue"><b><h3>Telefono(Con lada)</h3></b></label>
                <input class="w3-input w3-border w3-light-grey" type="number" placeholder="Solo números" id="idTel" name="txttelefono" required maxlength="13">

                <label class="w3-label w3-text-blue"><b><h3>Fecha de nacimiento</h3></b></label>
                <input class="w3-input w3-border w3-light-grey" type="date" id="idFec" name="txtfecnac" required>

                <label class="w3-label w3-text-blue"><b><h3>Sexo</h3></b></label>
                <select required class="cmb" name="sexo">
                    <option value="">Seleccionar uno</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select><br>

                <input class="w3-btn w3-blue-grey margenArriba" type="submit" name="Enviar" value="Registrarse">
                <input class="w3-btn w3-blue-grey margenArriba margenLateral" type="reset">
            </form>
    </div>

</body>
</html>


<body>
<div id="div1" class="w3-animate-opacity col-md-6 col-md-offset-3 w3-border divP">
    <div class="w3-container w3-blue margenArriba ">
        <h1 class="text-center">Bienvenido a</h1>
        <img src="IMG/logo.jpg" class="center-block w3-round">
        <h2 class="text-center">Inicio de sesíon</h2>
        <link rel="icon" href="../IMG/blue.ico" />
    </div>
    <title>Iniciar Sesión</title>
    <div id="cont">
        <form class="w3-container" method="post" action="php/controladores/index_login.php" autocomplete="off">
            <?php 
            if($_GET['login']=='fallo')
            {
            echo("Usuario  o contraseña incorrectos<br>");
            }

             ?>
           
            <label class="w3-label w3-text-blue"><b><h3>Usuario</h3></b></label>
            <input name="txtusuario" class="w3-input w3-border w3-light-grey" type="text"  autocomplete="off" required placeholder="Digite su nombre de usuario" >

            <label class="w3-label w3-text-blue"><b><h3>Contraseña</h3></b></label>
            <input name="txtcontra" class="w3-input w3-border w3-light-grey" type="password" autocomplete="off"  required placeholder="Digite su contraseña" >

            <input class="w3-btn w3-blue-grey margenArriba" type="submit" name="Enviar" value="Iniciar Sesión">
            <input class="w3-btn w3-blue-grey margenArriba margenLateral" type="reset">

            <h4>¿No tienes usuario?<a target="_blank" href="PHP/Signup.php"> Registrate Aquí</a></h4>
        </form>
    </div>
</body>
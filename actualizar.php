<!--

 nombres: Jelfri Almengot, Carlos Peralta
 matriculas: DD1669           98-2030        
 materia: RPG II(INF-314)
-->

<!doctype html>
<html>
    <head>
        <title>Actualizar Divisas</title>
      	<link rel="stylesheet" type="text/css" href="Css/Estilos.css">
	    <meta charset="utf-8">
    </head>
    <body>
    <div class="contenedor">



        <header>

            <!--  menu-->
            <?php include "modulos/menu.php"; ?>


        </header>
        <div class="contenido">
           
          <?php
          $id = $_GET['id'];
          $conexion = mysqli_connect("localhost","root","","db_divisa");//host ,usuario,contraseña,base de datos
         $registros = mysqli_query($conexion, "select * from monedas where id_divisa='1'" );

          ?>
           <form method="POST" action="accion.php?ac=2">
           	<input type="hidden"
              name="id" value="<?php echo $id; ?>">
              <p>Divisa</p>
              <textarea name="contenido"<>/textarea><br>
              <input type="submit" value="actualizar divisa">	

           </form>

        </div>
    </div>
    </body>
</html>
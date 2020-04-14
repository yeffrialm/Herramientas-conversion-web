<!--

 nombres: Jelfri Almengot, Carlos Peralta
 matriculas: DD1669           98-2030        
 materia: RPG II(INF-314)
-->

<?php
$conexion = mysqli_connect("localhost","root","","db_divisa");//host ,usuario,contraseña,base de datos
$registros = mysqli_query($conexion, "select * from monedas where id_divisa='1'" );//consulta solo dolar
$registros2 = mysqli_query($conexion, "select * from monedas where id_divisa='2'" );//consulta solo euro
$registros3 = mysqli_query($conexion, "select * from monedas where id_divisa='3'" );//consulta solo peso




while ($reg = mysqli_fetch_array($registros)){

$dolar = $reg['tasa_divisa'];
//consulta dolar 

}

while ($reg2 = mysqli_fetch_array($registros2)){

$euro = $reg2['tasa_divisa'];
//consulta euro

}


while ($reg3 = mysqli_fetch_array($registros3)){

$peso = $reg3['tasa_divisa'];
//consulta peso

}




?>

<!doctype html>
<html>
    <head>
        <title>Diversas herramientas</title>
       
    </head>
    <body>
    
        <header>
            <!-- menu-->
            <?php include "modulos/menu.php"; ?>

        </header>	
        <!--
            Datos de la conversión 
                1 kg= 2.2 libras
                1 libra= 0.454 kg
                1 km =  0.621371 millas
                1 milla = 1.60934 km
        -->
        <div class="container">
        <div class="row">
        <div class="col-12">
        <h1>Herramientas para convertir valores</h1>
        </div>
        
        <form method="GET">   <!-- cambiar de get a post    -->
           <div class="row">
           <div class="col-4">
           <p>Digite el valor </p> 
           </div>
            <div class="col-8">
            <p> Seleccione entre las herramientas</p>
            </div>
            </div>
            <div class="row">
           <div class="col-4">
           <input type="text" name="valor" class="form-control">
           </div>
           <div class="col-5">
            <select name="conversion" class="form-control">
                <option value="1">Kilos a Libras</option>
                <option value="2">Libras a Kilos</option>
                <option value="3">kilometros a Millas</option>
                <option value="4">Millas a Kilometros</option>
                <option value="5">Celcius a Fahrenheit</option>
                <option value="6">Fahrenheit a Celcius</option>
                <option value="7">Dollar a Peso</option>
                <option value="8">Peso a Dollar</option>
                <option value="9">euro a Peso</option>
                <option value="10">Peso a euro</option>
            </select>
            <br>
            </div>
            <div class="col-12 ml-3 mt-2">
            <input type="submit" class="btn btn-success btn-md" value="Convertir">
            </div>
           
        </form>
        </div>
         
        <div class="col-12 mt-3">
        <h2>Resultado</h2>
        </div>
      
        <?php
        //validar
        $alert = '<div class="alert alert-primary" role="alert">';//clase de diseño bootstrap
        if (isset($_GET['valor']) && isset($_GET['conversion'])) {
            $valor = $_GET['valor'];
            $conversion = $_GET['conversion'];
            if ($conversion == 1) {
                //convertir de kilos a libras
                $resultado = $valor * 2.2;
               
               echo $alert . "Son " . $resultado . " Libras"." </div>";
                
            } else if ($conversion == 2) {
                //convertir de libras a kilos
                $resultado = $valor * 0.454;
                echo $alert .  "Son " . $resultado . " Kilos"." </div>";
            } else if ($conversion == 3) {
                //convertir de kilometros a Millas
                $resultado = $valor * 0.621371;
                echo $alert . "Son " . $resultado . " Millas"." </div>";
            } else if ($conversion == 4) {
                //convertir de Millas a kilometros
                $resultado = $valor * 1.60934;
                echo $alert . "Son " . $resultado . " Kilometros"." </div>";
            } else if ($conversion == 5) {
                //convertir de Celius a Fahrenheit
                $resultado = ($valor * 1.8) + 32;
                echo $alert .  "Son " . $resultado . " Fahrenheit"." </div>";
            } else if ($conversion == 6) {
                //convertir de Fahrenheit a Celcius
                $resultado = ($valor - 32) * 0.5556;
               echo $alert . "Son " . $resultado . " Celcius"." </div>";
            } else if ($conversion == 7) {
                //convertir de dolar a peso
                $resultado =  ($dolar/$peso) * $valor;
                 echo $alert . "Son " . $resultado . " pesos"." </div>";

             } else if ($conversion == 8) {
                //convertir de  peso a dolar
                $resultado = ($peso/$dolar) * $valor ;
                echo  $alert . "Son " . $resultado . " dolares"." </div>";

             } else if ($conversion == 9) {
                //convertir de euro a peso
                $resultado = ($euro/$peso) * $valor ;
                 echo $alert . "Son " . $resultado . " pesos"." </div>";

             } else if ($conversion == 10) {
                //convertir de peso a euro
                $resultado = ($peso/$euro) * $valor ;
                echo $alert . "Son " . $resultado . " euros"." </div>";
            } else {
                echo $alert . "no puede realizarse la opción"." </div>";
            }
        } else {
            
            echo $alert ."No se ha realizado ninguna acción"." </div>";
        }
        ?>
        </div>
        </div>
    </body>
</html>

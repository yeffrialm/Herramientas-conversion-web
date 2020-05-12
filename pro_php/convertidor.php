<!--

 nombres: Jelfri Almengot, Carlos Peralta
 matriculas: DD1669           98-2030        
 materia: RPG II(INF-314)
-->

<?php
$conexion = mysqli_connect("localhost","root","","db_divisa");//host ,usuario,contraseña,base de datos
$registros = mysqli_query($conexion, "select * from monedas where id_divisa='1'" );//consulta para cambio Dollar
$registros2 = mysqli_query($conexion, "select * from monedas where id_divisa='2'" );//consulta para cambio Euro
$registros3 = mysqli_query($conexion, "select * from monedas where id_divisa='3'" );//consulta cambio Peso Dominicano a Dollar
$registros4 = mysqli_query($conexion, "select * from monedas where id_divisa='4'" );//consulta cambio Peso Dominicano a Euro




while ($reg = mysqli_fetch_array($registros)){

$dolar = $reg['tasa_divisa'];
//consulta Dollar 

}

while ($reg2 = mysqli_fetch_array($registros2)){

$euro = $reg2['tasa_divisa'];
//consulta Euro

}


while ($reg3 = mysqli_fetch_array($registros3)){

$peso_USD = $reg3['tasa_divisa'];
//consulta Peso Dominicano a Dollar

}

while ($reg4 = mysqli_fetch_array($registros4)){

    $peso_EUR = $reg4['tasa_divisa'];
    //consulta Peso Dominicano a Euro
    
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
        
        <form method="POST">  
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
                <option value="9">Euro a Peso</option>
                <option value="10">Peso a Euro</option>
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
        $alert = '<div class="alert alert-primary" role="alert">';//clase contiene diseño bootstrap
        if (isset($_POST['valor']) && isset($_POST['conversion'])) {
            $valor = $_POST['valor'];
            $conversion = $_POST['conversion'];
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
                //convertir de DolLar a Peso
                $resultado =  $dolar * $valor;
                 echo $alert . "Son " . $resultado . " pesos"." </div>";

             } else if ($conversion == 8) {
                //convertir de  Peso a Dollar
                $resultado = $peso_USD * $valor ;
                echo  $alert . "Son " . $resultado . " dolares"." </div>";

             } else if ($conversion == 9) {
                //convertir de Euro a Peso
                $resultado = $euro * $valor ;
                 echo $alert . "Son " . $resultado . " pesos"." </div>";

             } else if ($conversion == 10) {
                //convertir de Peso a Euro
                $resultado = $peso_EUR * $valor ;
                echo $alert . "Son " . $resultado . " euros"." </div>";
            } else {
                echo $alert . "no puede realizarse la operacion"." </div>";
            }
        } else {
            
            echo $alert ."No se ha realizado ninguna acción"." </div>";
        }
        ?>
        </div>
        </div>
    </body>
</html>

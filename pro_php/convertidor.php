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
        <title>Sitio Web</title>
        <link rel="stylesheet" type="text/css" href="Css/Estilos.css">
	    <meta charset="utf-8">
    </head>
    <body>
    <div class="contenedor">
        <header>
            <!-- menu-->
            <?php include "modulos/menu.php"; ?>

        </header>	
        <div class="contenido">
        <!--
            Datos de la conversión 
                1 kg= 2.2 libras
                1 libra= 0.454 kg
                1 km =  0.621371 millas
                1 milla = 1.60934 km
        -->
        <h1>Convertidor</h1>
        <form method="GET">
            <p>Digite el valor</p>
            <input type="text" name="valor">
            <select name="conversion">
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
            <input type="submit" value="Convertir">
        </form>
        <h2>Resultado</h2>
        <?php
        //validar
        if (isset($_GET['valor']) && isset($_GET['conversion'])) {
            $valor = $_GET['valor'];
            $conversion = $_GET['conversion'];
            if ($conversion == 1) {
                //convertir de kilos a libras
                $resultado = $valor * 2.2;
                echo "Son " . $resultado . " Libras";
            } else if ($conversion == 2) {
                //convertir de libras a kilos
                $resultado = $valor * 0.454;
                echo "Son " . $resultado . " Kilos";
            } else if ($conversion == 3) {
                //convertir de kilometros a Millas
                $resultado = $valor * 0.621371;
                echo "Son " . $resultado . " Millas";
            } else if ($conversion == 4) {
                //convertir de Millas a kilometros
                $resultado = $valor * 1.60934;
                echo "Son " . $resultado . " Kilometros";
            } else if ($conversion == 5) {
                //convertir de Celius a Fahrenheit
                $resultado = ($valor * 1.8) + 32;
                echo "Son " . $resultado . " Fahrenheit";
            } else if ($conversion == 6) {
                //convertir de Fahrenheit a Celcius
                $resultado = ($valor - 32) * 0.5556;

            } else if ($conversion == 7) {
                //convertir de dolar a peso
                $resultado =  ($dolar/$peso) * $valor;
                 echo "Son " . $resultado . " pesos";

             } else if ($conversion == 8) {
                //convertir de  peso a dolar
                $resultado = ($peso/$dolar) * $valor ;
                echo "Son " . $resultado . " dolares";

             } else if ($conversion == 9) {
                //convertir de euro a peso
                $resultado = ($euro/$peso) * $valor ;
                 echo "Son " . $resultado . " pesos";

             } else if ($conversion == 10) {
                //convertir de peso a euro
                $resultado = ($peso/$euro) * $valor ;
                echo "Son " . $resultado . " euros";
            } else {
                echo "no puede realizarse la opción";
            }
        } else {
            echo "No se ha realizado ninguna acción";
        }
        ?>
        </div>
    </div>
    </body>
</html>

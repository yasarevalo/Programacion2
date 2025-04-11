//variables y tipos de datos
<?php
$entero = 12;
$flotante = 12.2;
$cadena = "yasmin";
$booleano = true;

echo "<br>";
var_dump($entero,$flotante,$cadena,$booleano);

//funcion multiplicar
echo "<br>";

function multiplicar ($a,$b = 2) {
	return $a * $b;
}
echo multiplicar (4);

//operadores (suma , resta, multiplicacion, division)
echo "<br>";
$n1 = 6;
$n2 = 2;

$suma = $n1 + $n2 ;
$resta = $n1 - $n2 ;
$multiplicacion = $n1 * $n2 ;
$division = $n1 / $n2;

var_dump ($suma, $resta, $multiplicacion, $division);

//comparacion
echo "<br>";

$n3 = 18;
$n4 = 29;

if ($n3 > $n4){
	echo $n3."es mayor que".$n4;
}elseif ($n3 == $n4){
	echo $n3."es igual a".$n4;
}else{
	echo $n3."es menor que".$n4;
}


//concatenar 2 cadenas 
$nombre = "Yasmin";
$apellido = "Arevalo";
echo $nombre." ".$arevalo;

//variable if-else
$edad = 20;
if ($edad >= 18){
	echo "Su edad es".$edad.",es mayor de edad";
}else {
	echo "Su edad es".$edad.",es menor de edad0";}

//for
for($i=0;$i<=20;$i++) {
	echo $i."\n";}

//while
$Suma1 = 0;
$i = 1;

while($i <= 50){
	$suma1 += $i;
	$i++;}
echo $suma1;

//foreach
$nombres =array("Yasmin","Kevin","Lautaro","Gonzalo");
echo "<ul>";
foreach ($nombres as $nombres){
echo "<li>$nombres</li>";}

//switch
$dia ="5";

switch ($dia){
	case "1";
	echo "Lunes";
	break;
	case "2";
	echo "Martes";
	break;
	case "3";
	echo "Miercoles";
	break;
	case "4";
	echo "Jueves";
	break;
	case "5";
	echo "Viernes" ;
	break;
	case "6";
	echo "Sabado";
	break;
	case "7";
	echo "Domiengo";
	break;
	default:
	echo "Dia incorrecto o no encontrado";
	}

?>

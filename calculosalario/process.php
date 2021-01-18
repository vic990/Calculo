<?php
include("conect.php");
$carnet=$_POST["carnet"];
$materias=$_POST["materias"];
$creditos=$_POST["creditos"];
$monto=0;

if($creditos<8){

    $creditostotal=$creditos*10000;
}

elseif(($creditos >= 8) && ($creditos <=12)){

    $creditostotal=$creditos*13000;
}
elseif($creditos >12){

    $creditostotal=$creditos*20000;
}


if(($materias >=4) &($materias <=6)){
    $monto=($creditostotal*0.10)+$creditostotal;
}
elseif($materias >6){
    $monto=($creditostotal*0.15)+$creditostotal;
}


?>
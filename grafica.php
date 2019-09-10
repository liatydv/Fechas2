<?PHP
class grafica {
public function script(){

    $con = mysqli_connect("localhost","root","","fechas");




$a = mysqli_query($con, "SELECT ((fefut - feact)*100)/80 as op , ((feact - fein)*100)/80 as opp
from calculo
where id = 1");
$mf=mysqli_fetch_array($a);

$sobran= $mf['op'];
$tienes= $mf['opp'];

$b = mysqli_query($con, "SELECT fefut - feact as oppp , feact - fein as opppp
from calculo
where id = 1");
$mmf=mysqli_fetch_array($b);
$sobrann= $mmf['oppp'];
$tieness= $mmf['opppp'];


$con ->close();
?>
 <div class="container">
 <br>
<h2>Barra de progreso de la vida</h2>
<br>
<br>
<div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $tienes ?>%">
    Has vivido <?php echo  round($tienes); ?>%
  </div>
  <div id="a" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $sobran ?>%">
   Te queda por vivir <?php  echo  round($sobran); ?>%
  </div>
</div>
</div>
 
<?php

echo "Tienes: $tieness años "."<br>";
echo "Te sobran: $sobrann años "."<br>";

}
}
?>


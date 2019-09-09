<?PHP
class grafica {
public function script(){

    $con = mysqli_connect("localhost","root","","fechas");




$a = mysqli_query($con, "SELECT (fefut - feact) as op , (feact - fein) as opp
from calculo
where id = 1");
$mf=mysqli_fetch_array($a);
$sobran= $mf['op'];
$tienes= $mf['opp'];

$con ->close();

 

  ?>
    <script src="code/highcharts.js"></script>
    <script src="code/modules/venn.js"></script>
    <script src="code/modules/exporting.js"></script>
    
    
    <div id="containerr"></div>
    
    
            <script type="text/javascript">
    Highcharts.chart('containerr', {
        series: [{
            type: 'venn',
            data: [{
                sets: ['A'],
                value: <?php echo $sobran?> ,
                name: 'Años restantes',
                description: 'Años que te sobran antes de muerte: ' +  <?php echo $sobran ?> 
            }, {
                sets: ['B'],
                value: <?php echo $tienes?> ,
                name: 'Progreso',
                description: 'Años que ya nas vivido: ' +  <?php echo $tienes ?> 
     
            }, {
                sets: ['A', 'B'],
                value: 80

            }]
        }],
        tooltip: {
            headerFormat:
                '<span style="color:{point.color}">\u2022</span> ' +
                '<span style="font-size: 14px"> {point.point.name}</span><br/>',
            pointFormat: '{point.description}<br><span style="font-size: 10px"></span>'
        },
        title: {
            text: 'Grafica de tu tiempo restante'
            
        }
    });
    
            </script>
<?php
echo "Tienes: $tienes años "."<br>";
echo "Te sobran: $sobran años "."<br>";

}
}
?>


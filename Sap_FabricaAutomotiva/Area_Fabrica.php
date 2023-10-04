<?php

include('conexao_Fabrica.php');


$query = $dbh->prepare('SELECT area, COUNT(*) AS total FROM alocacao GROUP BY area;');

$query->execute();

$totalAreas = $query->fetchAll();

//echo '<pre>';
//print_r ($totalAreas);
//echo '</pre>'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./estilo_fabrica.css">
</head>
<body>

    <div class="divMain"> </div>

    <?php

    for($area = 1; $area < 12; $area++){
        //print_r($totalAreas[$area]['total']);
        echo '<a href="detalhes_Area.php?idArea='.$area.'">';
            if(!empty($totalAreas[$area]['total'])){
                echo '<div class="div'.$area.' azul">';
            }
            else{
                echo '<div class="div'.$area.' branco">';
            }
                echo '<p style="text-align: center;">'.$area.'</p>';
            echo'</div>
        </a>';
        }
    ?>
</body>
</html>
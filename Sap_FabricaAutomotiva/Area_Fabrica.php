<?php

include('conexao_Fabrica.php');

$query = $dbh->prepare('SELECT area FROM alocacao GROUP BY area;');

$query->execute();

$totalAreas = $query->fetchAll();

echo '<pre>';
print_r($totalAreas);
echo '<pre>';

?>

<!DOCTYPE html>
<html lang="pt-br">
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
            $cont = 0;
            foreach($totalAreas as $linha){
                //print_r($linha);
                if($linha['area'] == $area){
                    $cont ++;
                }
            }
            //echo $cont;
            if($cont > 0){
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
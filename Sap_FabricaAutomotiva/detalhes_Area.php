<?php
    include('conexao_Fabrica.php');

    $area = $_GET['idArea'];

    $query = $dbh->prepare('SELECT area, modelo, preco FROM alocacao as al 
    INNER JOIN automoveis as a ON a.id=al.automovel WHERE area =:area');
    
    $query->execute(array(':area'=> $area));

    $automoveis = $query->fetchAll();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Automoveis por Área</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <style>
            table{
                text-align:left;
            }
            tr:nth-child(even){
                background-color: pink;
                color:white;
            }
        </style>
    </head>
    <body>
        <h1>Area <?php echo $area ?></h1>
        <table>
            <thead>
            
            <?php
                if(count($automoveis)==0){
                    echo 'Não tem modelos na área';
                    die();
                }
            ?>
            
            <tr>
                <th>Modelo</th>
                <th>Preço</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach($automoveis as $automovel){
                        echo '<tr>';
                        echo '<td>'.$automovel['modelo'].'</td>';
                        echo '<td>'.$automovel['preco'].'</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>
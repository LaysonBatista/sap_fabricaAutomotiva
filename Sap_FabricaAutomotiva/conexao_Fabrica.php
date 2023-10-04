<?php
/* Conectando ao servidor mysql*/
$dsn = 'mysql:dbname=fabrica_automotiva;host=localhost;port=3306';
$user = 'root';
$password = '';

try{
    $dbh = new PDO($dsn, $user, $password);
}catch(PDOExcpetion $e){
    throw new MyDatabaseException( $Exception->getMessage( ) , (int)$Exception->getCode( ) );
}

?>
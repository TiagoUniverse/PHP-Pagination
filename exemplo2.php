<?php
// Data: 31/05/23

// Conexão ao BD
// $con = mysqli_connect('localhost' , 'root' , '');
// mysqli_select_db($con, 'padaria');


$servername = "localhost";
$dbname = "controle-financeiro";
$username = "root";
$pwd = "";

try{
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname" , "$username" , "$pwd");
    // echo "Conectado com sucesso";
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (Exception $e){
    die(print_r($e->getMessage()));
}


 $result = $pdo->query("Select * from status_mes");

 while($linha = $result->fetch(\PDO::FETCH_ASSOC)){
    echo $linha['nome'] . "<br>";
 }

$quantidadeResultado = $result->rowCount();

// Defina quantos resultados quer por página
$limite = 10;


//  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginação com PHP</title>
</head>
<body>
    
</body>
</html>
<?php
// Data: 31/05/23

if (!isset($_GET['pagina'])){
    $pagina = 1;
} else{
    $pagina = filter_input(INPUT_GET, "pagina", FILTER_VALIDATE_INT);
}
// Defina quantos resultados quer por página

$limite = 2;
$inicio = ($pagina - 1) * $limite;

$pdo = new PDO("mysql:host=localhost;dbname=padaria", "root", "");
$stmt = $pdo->query("Select nome,preco from comida LIMIT $inicio,$limite")->fetchAll();

$QuantidadeRegistros = $pdo->query(" Select COUNT(*) as 'total' from comida   ")->fetch()['total'];

$UltimaPagina =  ceil($QuantidadeRegistros / $limite);

// echo count($stmt);
// var_dump($stmt);



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
    <ul>
        <?php foreach ($stmt as $item) : ?>
            <li> <?= $item['nome']; ?> </li>
        <?php endforeach ?>
    </ul>

    <a href="?pagina=1">Primeira</a>
    <a href="?pagina=<?= $pagina - 1 ?>"><<</a>
    <?=$pagina?>
    <a href="?pagina=<?= $pagina + 1 ?>">>></a>
    <a href="?pagina= <?= $UltimaPagina ?>  ">Última</a>



</body>

</html>
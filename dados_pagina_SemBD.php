<?php
// Verifica se o parâmetro "pagina" foi fornecido na requisição GET
if (isset($_GET['pagina'])) {
    // Obtém o número da página solicitada
    $pagina = $_GET['pagina'];

    // Define o número de itens por página
    $itensPorPagina = 2;

    // Aqui você pode realizar qualquer lógica necessária para obter os dados correspondentes à página solicitada
    // Por exemplo, realizar uma consulta ao banco de dados
    $pdo = new PDO("mysql:host=localhost;dbname=padaria" , "root" , "");
    $stmt = $pdo->query("Select * from comida ")->fetchAll();
    // var_dump($stmt);
    
    // echo $stmt[0][1];

    // Supondo que você tenha uma array de dados que serão exibidos na páginação
    $dados = array('Tiago Cesar' , 'papi', 'camila' , 'ivone' , 'graça' , 'diego');
    
    // Calcula o índice de início da página com base no número da página e no número de itens por página
    $indiceInicio = ($pagina - 1) * $itensPorPagina;
    
    // Filtra os dados com base no índice de início e no número de itens por página
    $dadosPagina = array_slice($stmt, $indiceInicio, $itensPorPagina);
    
    // Retorna os dados da página no formato JSON
    echo json_encode($dadosPagina);
}
?>

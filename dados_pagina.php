<?php
// Verifica se o parâmetro "pagina" foi fornecido na requisição GET
if (isset($_GET['pagina'])) {
    // Obtém o número da página solicitada
    $pagina = $_GET['pagina'];

    // Define o número de itens por página
    $itensPorPagina = 10;

    // Aqui você pode realizar qualquer lógica necessária para obter os dados correspondentes à página solicitada
    // Por exemplo, realizar uma consulta ao banco de dados
    
    // Supondo que você tenha uma array de dados que serão exibidos na páginação
    $dados = array(
        // Dados da página 1
        array('id' => 1, 'nome' => 'Item 1'),
        array('id' => 2, 'nome' => 'Item 2'),
        // ...
        
        // Dados da página 2
        array('id' => 11, 'nome' => 'Item 11'),
        array('id' => 12, 'nome' => 'Item 12'),
        // ...
    );
    
    // Calcula o índice de início da página com base no número da página e no número de itens por página
    $indiceInicio = ($pagina - 1) * $itensPorPagina;
    
    // Filtra os dados com base no índice de início e no número de itens por página
    $dadosPagina = array_slice($dados, $indiceInicio, $itensPorPagina);
    
    // Retorna os dados da página no formato JSON
    echo json_encode($dadosPagina);
}
?>

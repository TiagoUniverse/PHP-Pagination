<!DOCTYPE html>
<html>
<head>
    <title>Paginação com AJAX</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var paginaAtual = 1; // Variável global para armazenar a página atual
        
        // Função para carregar os dados da página através do AJAX
        function carregarPagina(pagina) {
            $.ajax({
                url: 'dados_pagina.php', // Arquivo PHP que irá retornar os dados da página
                type: 'GET',
                data: {pagina: pagina},
                success: function(response) {
                    // Atualiza o conteúdo da div com os novos dados
                    $('#conteudo').html(response);
                    paginaAtual = pagina; // Atualiza a variável global da página atual
                }
            });
        }
        
        // Função para lidar com o clique no botão "Anterior"
        function paginaAnterior() {
            if (paginaAtual > 1) {
                carregarPagina(paginaAtual - 1);
            }
        }
        
        // Função para lidar com o clique no botão "Próximo"
        function proximaPagina() {
            carregarPagina(paginaAtual + 1);
        }
    </script>
</head>
<body>
    <div id="conteudo">
        <!-- Aqui serão exibidos os dados da página -->
    </div>
    
    <button onclick="paginaAnterior()">Anterior</button>
    <button onclick="proximaPagina()">Próximo</button>
    
    <script>
        // Carrega a página inicial ao carregar a página
        carregarPagina(1);
    </script>
</body>
</html>

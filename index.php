<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginação de Tiago</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        var paginaAtual = 1;

        function carregarPagina(pagina) {
            $.ajax({
                url: 'dados_pagina.php',
                type: 'GET',
                data: {
                    pagina: pagina
                },
                success: function(response) {
                    $('#conteudo').html(response);
                    paginaAtual = pagina;
                }
            });
        }

        function paginaAnterior() {
            if (paginaAtual > 1) {
                carregarPagina(paginaAtual - 1);
            }
        }

        function proximaPagina() {
            carregarPagina(paginaAtual + 1);
        }
    </script>


</head>

<body>
    <div id="conteudo">
    </div>

    <button onclick="paginaAnterior()">Anterior</button>
    <button onclick="proximaPagina()">Próximo</button>

    <script>
        carregarPagina(1);
    </script>

</body>

</html>
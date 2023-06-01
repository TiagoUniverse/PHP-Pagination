<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginação de Tiago</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var paginaAtual = 1;

        function carregarPagina(pagina) {
            $.ajax({
                url: 'dados_paginaBD.php',
                type: 'GET',
                data: {
                    pagina: pagina
                },
                success: function(response) {
                    $('#conteudo').html(response);
                    paginaAtual = pagina;

                    // Supondo que você tenha recebido o JSON com os dados no formato de resposta "response"
                    var dados = JSON.parse(response); // Converter o JSON para um objeto JavaScript

                    // Função para criar um input preenchido com um valor
                    function criarInputComValor(nome, preco) {
                        var container = document.createElement('div');


                        var label = document.createElement('label');
                        label.textContent = nome;
                        
                        container.appendChild(label);
                        // var nomeInput = document.createElement('input');
                        // nomeInput.type = 'text';
                        // nomeInput.value = nome;
                        // nomeInput.id= "Papi";
                        // container.appendChild(nomeInput);

                        // var precoInput = document.createElement('input');
                        // precoInput.type = 'text';
                        // precoInput.value = preco;
                        // container.appendChild(precoInput);

                        return container;
                    }

                    // Limpa o conteúdo antes de preenchê-lo novamente
                    var conteudoElement = document.getElementById('conteudo');
                    conteudoElement.innerHTML = '';

                    // Percorre os dados e cria os inputs preenchidos
                    dados.forEach(function(item) {
                        var inputContainer = criarInputComValor(item.nome, item.preco);
                        conteudoElement.appendChild(inputContainer);
                    });
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

        carregarPagina(1);
    </script>
</head>
<body>
    <div id="conteudo">
        
    </div>

    <button onclick="paginaAnterior()">Anterior</button>
    <button onclick="proximaPagina()">Próximo</button>
</body>
</html>

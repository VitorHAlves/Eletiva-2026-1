<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Exercicio 3</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    </head>
<body> 
    <div class="container py-3">
        <h1>Exercicio 3</h1>
        <form method="post">
            <?php
            for($i=0;$i<5;$i++)
                {
                echo '<div class="mb-3">
                    <label for="cod[]" class="form-label">Informe o código do produto:</label>
                    <input type="number" id="cod[]" name="cod[]" class="form-control" required="">
                </div>';
                echo '<div class="mb-3">
                    <label for="nome[]" class="form-label">Informe o nome do produto:</label>
                    <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
                </div>';
                echo '<div class="mb-3">
                    <label for="preco[]" class="form-label">Informe o preço do produto:</label>
                    <input type="number" step="0.01" id="preco[]" name="preco[]" class="form-control" required="">
                </div>';

                }
            ?>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $codigos = $_POST['cod'];
                $nomes = $_POST['nome'];
                $precos = $_POST['preco'];
                $mapaProd = [];
                foreach($codigos as $chave => $valorCod)//chave associada a um valor
                {
                    $precoOriginal = $precos[$chave];
                    if ($precoOriginal > 100)
                    {
                        $precoFinal = $precoOriginal - ($precoOriginal * 0.10);
                    }
                    else
                    {
                        $precoFinal = $precoOriginal;
                    }
                    $mapaProd[$valorCod] = ['nome' => $nomes[$chave],'preco' => $precoFinal];//é como se tivesse atribuindo um pacote ao meu mapa
                                            //[ inicio do pacote com inicio do novo array que é associado ao meu array de nomes utilizando a chave
                                            //preco também faz parte do pacote, e ele é associado ao precoFinal, que acabei de calcular
                                            //dessa forma o valor do preço com desconto não é salvo aki
                }
                print_r($mapaProd);

            }
        ?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
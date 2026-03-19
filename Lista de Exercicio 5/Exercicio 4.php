<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Exercicio 4</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    </head>
<body> 
    <div class="container py-3">
        <h1>Exercicio 4</h1>
        <form method="post">
            <?php
            for($i=0;$i<5;$i++)
                {echo '<div class="mb-3">
                    <label for="nome[]" class="form-label">Informe o nome do item:</label>
                    <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
                </div>';
                echo '<div class="mb-3">
                    <label for="preco[]" class="form-label">Informe o preço do item:</label>
                    <input type="number" step="0.01" id="preco[]" name="preco[]" class="form-control" required="">
                </div>';

                }
            ?>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $nomes = $_POST['nome'];
                $precos = $_POST['preco'];
                $mapa = [];
                foreach($nomes as $chave => $valorNome)//chave associada a um valor
                {
                    $novoPreco = ($precos[$chave] * 0.15) + $precos[$chave];
                    $mapa[$valorNome] = $novoPreco; 
                }
                asort($mapa);
                print_r($mapa);
            }
        ?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
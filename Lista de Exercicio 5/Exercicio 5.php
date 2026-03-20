<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Exercicio 5</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    </head>
<body> 
    <div class="container py-3">
        <h1>Exercicio 5</h1>
        <form method="post">
            <?php
            for($i=0;$i<5;$i++)
                {echo '<div class="mb-3">
                    <label for="titulo[]" class="form-label">Informe o nome do item:</label>
                    <input type="text" id="titulo[]" name="titulo[]" class="form-control" required="">
                </div>';
                echo '<div class="mb-3">
                    <label for="quantidade[]" class="form-label">Informe a quantidade no estoque:</label>
                    <input type="number" step="0.01" id="quantidade[]" name="quantidade[]" class="form-control" required="">
                </div>';

                }
            ?>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $titulos = $_POST['titulo'];
                $quantidades = $_POST['quantidade'];
                $mapa = [];
                foreach($titulos as $chave => $valorTit)//chave associada a um valor
                {
                    $mapa[$valorTit] = $quantidades[$chave];
                    ksort($mapa);
                    if ($mapa[$valorTit] < 5)
                    {
                        echo "<p>O livro: $valorTit, está com o estoque baixo($mapa[$valorTit]).</p>";

                    }
                }
                print_r($mapa);
            }
        ?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
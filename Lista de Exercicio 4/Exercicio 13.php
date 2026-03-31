<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 13</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <form method="post">
            <div class="mb-3">
                <label for="valor1" class="form-label fw-bold">Digite uma palavra: </label>
                <input type="text" id="valor1" name="valor1" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Avançar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $valor1 = $_POST['valor1'];
            $palavras = explode(" ",$valor1);
            $qntd_palavras = count($palavras);
            $maior_palavra = '';
            foreach ($palavras as $palavra)
            {
                if (strlen($palavra) > strlen($maior_palavra))
                {
                    $maior_palavra = $palavra;
                }
            }
            echo "<p>A quantidade de palavras nessa frase é de: $qntd_palavras</p>";
            echo "<p>A maior palavra dessa frase é: $maior_palavra</p>";

        }
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>
<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <form method="post">
            <div class="mb-3">
                <label for="num1" class="form-label fw-bold">Digite um valor do tipo float: </label>
                <input type="number" id="valor1" name="valor1" class="form-control" step="any" required="">
            </div>
            <button type="submit" class="btn btn-primary">Avançar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $valor1 = $_POST['valor1'];
            $valorfloat = (float)$valor1;
            $valor_arrendodadoC = ceil($valorfloat);
            $valor_arrendodadoB = floor($valorfloat);
            $valor_arrendodado = round($valorfloat);
            echo "<p>O valor arredondado para cima é: $valor_arrendodadoC</p>";
            echo "<p>O valor arredondado para baixo é: $valor_arrendodadoB</p>";
            echo "<p>O valor arredondado é: $valor_arrendodado</p>";
                
        }
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>
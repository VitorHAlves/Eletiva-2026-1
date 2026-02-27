<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 18</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <form method="post">
            <div class="mb-3">
                <label for="num1" class="form-label fw-bold">Digite o capital: </label>
                <input type="number" id="cap" name="cap" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="num1" class="form-label fw-bold">Digite a taxa (%): </label>
                <input type="number" id="taxa" name="taxa" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="num1" class="form-label fw-bold">Digite o perido (mês): </label>
                <input type="number" id="periodo" name="periodo" class="form-control" required="">
            </div>
            
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST")//$_SERVER é um array, por isso usa [], quero a posição REQUEST_METHOD.
        {//método usado para requisição.
            $capital = $_POST['cap'];//leio 1 campo do formulario
            $taxa = $_POST['taxa'] / 100;
            $period = $_POST['periodo'];
            $montante = $capital * (1 + $taxa) ** $period;
            echo "O juros compostos é de: R$ $montante";
        }
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>
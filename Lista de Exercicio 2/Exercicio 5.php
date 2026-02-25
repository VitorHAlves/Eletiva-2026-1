<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <form method="post">
            <div class="mb-3">
                <label for="num1" class="form-label fw-bold">Digite a primeira nota: </label>
                <input type="number" id="valor1" name="valor1" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="num2" class="form-label fw-bold">Digite a segunda nota: </label>
                <input type="number" id="valor2" name="valor2" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="num2" class="form-label fw-bold">Digite a terceira nota: </label>
                <input type="number" id="valor3" name="valor3" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST")//$_SERVER é um array, por isso usa [], quero a posição REQUEST_METHOD.
        {//método usado para requisição.
            $valor1 = $_POST['valor1'];//leio 1 campo do formulario
            $valor2 = $_POST['valor2'];//leio outro campo do formulário
            $valor3 = $_POST['valor3'];
            $media = ($valor1 + $valor2 + $valor3)/ 3;
            echo "A média é: $media";
        }
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>
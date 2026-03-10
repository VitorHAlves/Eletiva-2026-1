<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <form method="post">
            <div class="mb-3">
                <label for="num1" class="form-label fw-bold">Digite uma palavra: </label>
                <input type="text" id="valor1" name="valor1" class="form-control" required="">
            </div>
            <div class="mb-3">
                <label for="num1" class="form-label fw-bold">Digite uma outra palavra: </label>
                <input type="text" id="valor2" name="valor2" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Avançar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $valor1 = $_POST['valor1'];
            $valor2 = $_POST['valor2'];
            if (str_contains($valor1,$valor2))
            {
                echo "<p>A palavra $valor2, está contida na palavra ou frase: $valor1</p>";
            }
            else
            {
                echo "<p>A palavra $valor2 não está contida na palavra $valor1";
            }
        }
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>
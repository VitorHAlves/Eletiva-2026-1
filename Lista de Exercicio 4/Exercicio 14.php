<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 14</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <form method="post">
            <div class="mb-3">
                <label for="num1" class="form-label fw-bold">Digite uma palavra: </label>
                <input type="text" id="valor1" name="valor1" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Avançar</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $valor1 = $_POST['valor1'];
            $palavra1 = strtolower($valor1);
            $palavra_rev = strrev($palavra1);
            if ($palavra_rev == $palavra1)
            {
                echo "É palíndromo.";
            }
            else
            {
                echo"Não é palíndromo. A palavra invertida fica: $palavra_rev";
            }
        }
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>
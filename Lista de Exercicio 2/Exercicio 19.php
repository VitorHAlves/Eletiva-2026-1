<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 19</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <form method="post">
            <div class="mb-3">
                <label for="num1" class="form-label fw-bold">Digite um valor em dias: </label>
                <input type="number" id="dias" name="dias" class="form-control" required="">
            </div>
            
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST")//$_SERVER é um array, por isso usa [], quero a posição REQUEST_METHOD.
        {//método usado para requisição.
            $dias = $_POST['dias'];//leio 1 campo do formulario
            $horas = $dias * 24;
            $minutos = $dias * 1440;
            $segundos = $dias * 86400;
            echo "$dias dia(s) em horas é: $horas<br>";
            echo "$dias dia(s) em minutos é: $minutos<br>";
            echo "$dias dia(s) em segundos é: $segundos";

        }
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>
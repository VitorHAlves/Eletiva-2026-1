<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercicio 15</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <form method="post">
            <div class="mb-3">
                <label for="num1" class="form-label fw-bold">Digite a altura em metro (Exemplo: 1.60): </label>
                <input type="number" id="altura" name="altura" class="form-control" step="0.01" required="">
            </div>

            <div class="mb-3">
                <label for="num1" class="form-label fw-bold">Digite o peso em kg (Exemplo: 70.3): </label>
                <input type="number" id="kg" name="kg" class="form-control" step ="0.01" required="">
            </div>            

            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST")//$_SERVER é um array, por isso usa [], quero a posição REQUEST_METHOD.
        {//método usado para requisição.
            $peso = $_POST['kg'];//leio 1 campo do formulario
            $altura = $_POST['altura'];
            $imc = $peso / ($altura ** 2);
            
            if ($imc < 18.5)
            {
                echo "Você está na faixa de magreza.";
            }
            else if($imc < 25)
            {
                echo "Você está na faixa de peso normal.";
            }

            else if($imc < 30)
            {
                echo "Você está na faixa de sobrepeso.";
            }

            else if($imc < 35)
            {
                echo "Você está na faixa de obesidade grau I.";
            }

            else if($imc < 40)
            {
                echo "Você está na faixa de obesidade grau II .";
            }

            else
                echo "Você está na faixa de obesidade grau III";
        }
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>
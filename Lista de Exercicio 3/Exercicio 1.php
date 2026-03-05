<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Exercicio 1</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body> 
<div class="container py-3">
    <h1>Exercicio 1</h1>
    <form method="post">
        <?php for ($i = 1; $i <= 7; $i++){?>
        <div class="mb-3">
            <label for="n<?php echo $i ?>" class="form-label">Informe um valor:</label>
            <input type="number" id="n<?php echo $i ?>" name="n<?php echo $i ?>" class="form-control" required="">
        </div>
        <?php } ?>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $menor = $_POST['n1'];
        $posicao = 1;
        for ($i = 2; $i <= 7; $i++)
        {
            $numero = $_POST["n$i"];

            if ($numero < $menor)
            {
                $menor = $numero;
                $posicao = $i;
            }
        }
        echo "<p>Menor valor: $menor</p>";
        echo "<p>Posição: $posicao</p>";
        
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>
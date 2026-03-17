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
        <div class="mb-3">
            <label for="valor1" class="form-label">Informe um valor:</label>
            <input type="number" id="valor1" name="valor1" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="valor2" class="form-label">Informe um valor:</label>
            <input type="number" id="valor2" name="valor2" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="valor3" class="form-label">Informe um valor:</label>
            <input type="number" id="valor3" name="valor3" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="valor4" class="form-label">Informe um valor:</label>
            <input type="number" id="valor4" name="valor4" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="valor5" class="form-label">Informe um valor:</label>
            <input type="number" id="valor5" name="valor5" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="valor6" class="form-label">Informe um valor:</label>
            <input type="number" id="valor6" name="valor6" class="form-control" required="">
        </div>
        <div class="mb-3">
            <label for="valor7" class="form-label">Informe um valor:</label>
            <input type="number" id="valor7" name="valor7" class="form-control" required="">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $menor = $_POST['valor1'];
        $valor2 = $_POST['valor2'];
        $valor3 = $_POST['valor3'];
        $valor4 = $_POST['valor4'];
        $valor5 = $_POST['valor5'];
        $valor6 = $_POST['valor6'];
        $valor7 = $_POST['valor7'];
        $posicao = 1;
        for($i=1;$i<=7;$i++)
        {
        }

        echo "<p>Menor valor: $menor</p>";
        echo "<p>Posição: $posicao</p>";
        
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</div>
</body>
</html>
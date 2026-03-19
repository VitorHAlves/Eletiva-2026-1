<!doctype html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Exercicio 2</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    </head>
<body> 
    <div class="container py-3">
        <h1>Exercicio 2</h1>
        <form method="post">
            <?php
            for($i=0;$i<5;$i++)
                {echo '<div class="mb-3">
                    <label for="nome[]" class="form-label">Informe o nome:</label>
                    <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
                </div>';
                echo '<div class="mb-3">
                    <label for="notaP1[]" class="form-label">Informe a nota da P1:</label>
                    <input type="number" step="0.01" id="notaP1[]" name="notaP1[]" class="form-control" required="">
                </div>';
                echo '<div class="mb-3">
                    <label for="notaP2[]" class="form-label">Informe a nota da P2:</label>
                    <input type="number" step="0.01" id="notaP2[]" name="notaP2[]" class="form-control" required="">
                </div>';
                echo '<div class="mb-3">
                    <label for="notaP3[]" class="form-label">Informe a nota da P3:</label>
                    <input type="number" step="0.01" id="notaP3[]" name="notaP3[]" class="form-control" required="">
                </div>';

                }
            ?>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $nomes = $_POST['nome'];
                $notaP1 = $_POST['notaP1'];
                $notaP2 = $_POST['notaP2'];
                $notaP3 = $_POST['notaP3'];
                $mapaMd = [];
                foreach($nomes as $chave => $valorNome)//chave associada a um valor
                {
                    $media = ($notaP1[$chave] + $notaP2[$chave] + $notaP3[$chave])/3;
                    $mapaMd[$valorNome] = number_format($media,2,',');
                }
                echo "<p> Nome dos alunos e média: </p>";
                print_r($mapaMd);

            }
        ?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
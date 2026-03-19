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
            <?php
            for($i=0;$i<5;$i++)
                {echo '<div class="mb-3">
                    <label for="nome[]" class="form-label">Informe o nome:</label>
                    <input type="text" id="nome[]" name="nome[]" class="form-control" required="">
                </div>';
                echo '<div class="mb-3">
                    <label for="telefone[]" class="form-label">Informe o telefone:</label>
                    <input type="text" id="telefone[]" name="telefone[]" class="form-control" required="">
                </div>';
                }
            ?>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST")
            {
                $nomes = $_POST['nome'];
                $telefones = $_POST['telefone'];
                $mapa = [];
                foreach($nomes as $chave => $valorNome)//chave associada a um valor
                {
                    $telAtual = $telefones[$chave];
                    $nomeDuplicado = array_key_exists($valorNome,$mapa);//vejo se o nome existe como chave no mapa
                    $telDuplicado = in_array($telAtual,$mapa);//vejo se o telefone ta no mapa
                    if ($nomeDuplicado)
                    {
                        echo "<p>O nome $valorNome, já foi cadastrado.</p>";
                    }
                    elseif($telDuplicado)
                    {
                        echo "<p>O telefone: $telAtual, já foi cadastrado.";
                    }
                    else
                    {
                        $mapa[$valorNome] = $telAtual;
                    }
                }
                echo "<p> Contatos salvos: </p>";
                print_r($mapa);

            }
        ?>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>
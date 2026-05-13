<?php
    require_once('cabecalho.php');
?>

<h1>Novo Passageiro</h1>
<form method="post">
    <div class="mb-3">
        <label for="nome" class="form-label">Informe o nome do passageiro</label>
        <input type="text" id="nome" name="nome" class="form-control" required="">
    </div>
        <div class="mb-3">
        <label for="email" class="form-label">Informe o email do passageiro</label>
        <input type="email" id="email" name="email" class="form-control" required="">
    </div>
        <div class="mb-3">
        <label for="telefone" class="form-label">Informe o Telefone do passageiro</label>
        <input type="text" id="telefone" name="telefone" class="form-control" required="">
    </div>
    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href="crud_passageiros.php" class="btn btn-secondary">Voltar</a>
    </div>
</form>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            require_once('conexao.php');
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            try{
                $stmt = $conexao->prepare('INSERT INTO passageiros (nome,email,telefone) VALUES (?,?,?);');
                if($stmt-> execute([$nome,$email,$telefone]))
                    {
                        echo "<p>Cadastro Realizado!</p>";
                    }
                    else{
                        echo "<p>Erro ao cadastrar! Tente novamente</p>";
                    }
            } catch(Exception $e){
                echo "Erro: ".$e->getMessage();
            }
        }
?>

<?php
    require_once('rodape.php');
?>
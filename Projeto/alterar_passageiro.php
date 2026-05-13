<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    $mensagem = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $id = $_GET['id'];
        try{
            $sql = "UPDATE passageiros SET nome = ?, email = ?, telefone = ? WHERE id = ?";
            $stmt = $conexao->prepare($sql);
            if ($stmt->execute([$nome,$email,$telefone,$id]))
            {
                $mensagem = "<p>Alteração Realizada!</p>";
            }
            else{
                $mensagem = "<p>Erro ao Alterar! Tente novamente</p>";
            }
        } catch(Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
    try{
        $stmt = $conexao->prepare("SELECT * FROM passageiros WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>

<h1>Alterar Passageiro</h1>
<form method="post">
    <div class="mb-3">
        <label for="nome" class="form-label">Informe o Nome do passageiro</label>
        <input value="<?= $resultado['nome'] ?>" type="text" id="nome" name="nome" class="form-control" required="">
    </div>
        <div class="mb-3">
        <label for="email" class="form-label">Informe o Email do passageiro</label>
        <input value="<?= $resultado['email'] ?>"  type="email" id="email" name="email" class="form-control" required="">
    </div>
        <div class="mb-3">
        <label for="telefone" class="form-label">Informe o telefone do passageiro</label>
        <input value="<?= $resultado['telefone'] ?>"  type="text" id="telefone" name="telefone" class="form-control" required="">
    </div>
    <div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Enviar</button>
    <a href="crud_passageiro.php" class="btn btn-secondary">Voltar</a>
    </div>
</form>
<?php
    echo $mensagem;
?>

<?php
    require_once('rodape.php');
?>
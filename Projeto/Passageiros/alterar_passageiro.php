<?php
    require_once('../cabecalho.php');
    require_once('../conexao.php');
    $mensagem = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $id = $_GET['id'];
        try{
            $sql = "UPDATE Passageiros SET nome = ?, email = ?, telefone = ? WHERE id = ?";
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
        $stmt = $conexao->prepare("SELECT * FROM Passageiros WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
                <div class="card shadow rounded-4 border-0">
                    <div class="card-header bg-dark text-white py-3 rounded-top-4">
                        <h5 class="mb-0 px-2">| Alterar Passageiro</h5>
                    </div>
                    <div class="card-body p-4">
                        <form method="post">
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input value="<?= $resultado['nome'] ?>" type="text" id="nome" name="nome" class="form-control" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="telefone" class="form-label">Telefone</label>
                                    <input value="<?= $resultado['telefone'] ?>" type="text" id="telefone" name="telefone" class="form-control" required="">
                                </div>
                            </div>

                            <div class ="row g-3 mb-4">
                            <div class="col-md-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input value="<?= $resultado['email'] ?>" type="email" id="email" name="email" class="form-control" required="">
                                </div>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                                <a href="crud_passageiros.php" class="btn btn-secondary">Voltar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    echo $mensagem;
?>


<?php
    require_once('../rodape.php');
?>
<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    try{
        $stmt = $conexao->prepare('SELECT * FROM Passageiros WHERE id=?');
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch(Exception $e){
        echo "Erro!".$e->getMessage();
    }
?>

<h1>Consultar Passageiro</h1>
<form id="formExcluir" method="post" action ="consultar_passageiro.php?id=<?=  $resultado['id'] ?>">
    <div class="mb-3">
        <label for="nome" class="form-label">Passageiro</label>
        <input value="<?= $resultado['nome'] ?>" type="text" id="nome" name="nome" class="form-control" readonly>
    </div>
        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input value="<?= $resultado['email'] ?>"  type="text" id="email" name="email" class="form-control" readonly>
    </div>
        <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input value="<?= $resultado['telefone'] ?>"  type="text" id="telefone" name="telefone" class="form-control" readonly>
    </div>
    <div class="d-flex gap-2">
        <button type="button" class="btn btn-danger" data-bs-toggle = "modal" data-bs-target="#modalExcluir">Excluir</button>
        <a href="crud_passageiros.php" class="btn btn-secondary">Voltar</a>
    </div>
</form>



<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id = $_GET['id'];
        try{
            $sql = "DELETE FROM Passageiros WHERE id = ?";
            $stmt = $conexao->prepare($sql);
            if($stmt->execute([$id])){
                header('Location:crud_passageiros.php');
            }
            else{
                echo "Erro ao excluir";
            }
        } catch(Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
?>
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmar Exclusão</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Você tem certeza que deseja remover este passageiro? Esta operação é permanente.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" onclick="document.getElementById('formExcluir').submit();" class="btn btn-danger">Sim, Excluir</button>
      </div>
    </div>
  </div>
</div>
<?php
    require_once('rodape.php');
    
?>
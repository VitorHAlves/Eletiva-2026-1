<?php
    require_once('../cabecalho.php');
    require_once('../conexao.php');
    $mensagem = "";
    try{
        $sql = "SELECT v.*,m.nome as nome_motorista,
        p.nome as nome_passageiro,
        ve.Modelo as modelo_veiculo
        FROM Viagens v
        INNER JOIN Motoristas m ON v.Motoristas_id = m.id
        INNER JOIN Passageiros p ON v.Passageiros_id = p.id
        INNER JOIN Veiculos ve ON v.Veiculos_id = ve.id
        WHERE v.id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch (Exception $e){
        echo "Erro: ".$e->getMessage();
    }
    try{
        $stmtVeiculos = $conexao->query("SELECT * FROM Veiculos");
        $veiculos = $stmtVeiculos->fetchAll();

        $stmtMotoristas = $conexao->query("SELECT * FROM Motoristas");
        $motoristas = $stmtMotoristas->fetchAll();

        $stmtPassageiros = $conexao->query("SELECT * FROM Passageiros");
        $passageiros = $stmtPassageiros->fetchAll();        
    } catch(Exception $e){
        die("Erro: ".$e->getMessage());
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $id = $_GET['id'];
        try{
            $sql = "DELETE FROM Viagens WHERE id = ?";
            $stmt2 = $conexao->prepare($sql);
            if($stmt2->execute([$id])){
                header('Location:crud_viagens.php');
            }
            else{
                echo "Erro ao excluir";
            }
        } catch(Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow rounded-4 border-0">
                <div class="card-header bg-dark text-white py-3 rounded-top-4">
                    <h5 class="mb-0 px-2">| Consultar viagem</h5>
                </div>
                <div class="card-body p-4">
                    <form id="formExcluir" method="post" action ="consultar_viagens.php?id=<?= $resultado['id'] ?>">
                        <div class="row g-3 mb-3">
                            <div class="col-md-12">
                                <label for="destino" class="form-label">Destino</label>
                                <input value="<?= $resultado['destino'] ?>" type="text" id="destino" name="destino" class="form-control" readonly>
                            </div>
                        </div>

                        <div class ="row g-3 mb-4">
                            <div class="col-md-5">
                                <label for="data" class="form-label">Data</label>
                                <input value="<?= $resultado['data'] ?>"  type="date" id="data" name="data" class="form-control" readonly>
                            </div>
                            <div class="col-md-5">
                                <label for="valor" class="form-label">Valor</label>
                                <input value="<?= $resultado['valor'] ?>"  type="number" step="0.01" id="valor" name="valor" class="form-control" readonly>
                            </div>
                        </div>
                        <div class ="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="hora_inicio" class="form-label">Hora de ínicio</label>
                                <input value="<?= $resultado['hora_inicio'] ?>"  type="time" id="hora_inicio" name="hora_inicio" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="hora_fim" class="form-label">Horário de fim</label>
                                <input value="<?= $resultado['hora_fim'] ?>"  type="time" id="hora_fim" name="hora_fim" class="form-control" readonly>
                            </div>
                        </div>
                        <div class ="row g-3 mb-4">
                            <div class="col-md-4">
                                <label for="veiculo_id" class="form-label">Veículo</label>
                                <select disabled name="veiculo_id" id="veiculo_id" class="form-select">
                                    <?php foreach($veiculos as $v):
                                        if($resultado['Veiculos_id'] == $v['id'])
                                            $selecionado = "selected";
                                        else
                                            $selecionado = "";
                                        ?>
                                        <option <?= $selecionado ?> value="<?= $v['id'] ?>"> <?= $v['Modelo']?> </option>
                                    <?php endforeach;?>   
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label for="motorista_id" class="form-label">Motorista</label>
                                <select disabled name="motorista_id" id="motorista_id" class="form-select">
                                    <?php foreach($motoristas as $m):
                                        if($resultado['Motoristas_id'] == $m['id'])
                                            $selecionado = "selected";
                                        else
                                            $selecionado = "";
                                        ?>
                                        <option <?= $selecionado ?> value="<?= $m['id'] ?>"> <?= $m['nome']?> </option>
                                    <?php endforeach;?>   
                                </select>
                            </div>
                        </div>
                        <div class ="row g-3 mb-4">
                            <div class="col-md-12">
                                <label for="passageiro_id" class="form-label">Passageiro</label>
                                <select disabled name="passageiro_id" id="passageiro_id" class="form-select">
                                    <?php foreach($passageiros as $p):
                                        if($resultado['Passageiros_id'] == $p['id'])
                                            $selecionado = "selected";
                                        else
                                            $selecionado = "";
                                        ?>   
                                        <option <?= $selecionado ?> value="<?= $p['id'] ?>"> <?= $p['nome']?> </option>

                                    <?php endforeach;?>   
                                </select>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-danger" data-bs-toggle = "modal" data-bs-target="#modalExcluir">Excluir</button>
                            <a href="crud_viagens.php" class="btn btn-secondary">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmar Exclusão</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Você tem certeza que deseja remover esta viagem? Esta operação é permanente.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" onclick="document.getElementById('formExcluir').submit();" class="btn btn-danger">Sim, Excluir</button>
      </div>
    </div>
  </div>
</div>
<?php
    require_once('../rodape.php');
?>
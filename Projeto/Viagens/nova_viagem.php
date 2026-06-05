<?php
    require_once('../cabecalho.php');
    require_once('../conexao.php');

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
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            require_once('../conexao.php');
            $destino = $_POST['destino'];
            $data = $_POST['data'];
            $valor = $_POST['valor'];
            $hora_inicio = $_POST['hora_inicio'];
            $hora_fim = $_POST['hora_fim'];
            $veiculo = $_POST['veiculo_id'];
            $motorista = $_POST['motorista_id'];
            $passageiro = $_POST['passageiro_id'];
            try{
                $stmt = $conexao->prepare('INSERT INTO Viagens (destino,data,valor,hora_inicio,hora_fim,Veiculos_id,Motoristas_id,Passageiros_id) VALUES (?,?,?,?,?,?,?,?);');
                if($stmt-> execute([$destino,$data,$valor,$hora_inicio,$hora_fim,$veiculo,$motorista,$passageiro]))
                    {
                        $mensagem = "<p>Cadastro Realizado!</p>";
                    }
                    else{
                        echo "<p>Erro ao cadastrar! Tente novamente</p>";
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
                    <h5 class="mb-0 px-2">| Nova viagem</h5>
                </div>
                <?php if (!empty($mensagem)): ?>
                    <div class="alert alert-success text-center">
                        <strong><?= $mensagem ?></strong>
                    </div>
                <?php endif; ?>
                <div class="card-body p-4">
                    <form method="post">
                        <div class="row g-3 mb-3">
                            <div class="col-md-12">
                                <label for="destino" class="form-label">Destino</label>
                                <input type="text" id="destino" name="destino" class="form-control" required="">
                            </div>
                        </div>

                        <div class ="row g-3 mb-4">
                            <div class="col-md-5">
                                <label for="data" class="form-label">Data</label>
                                <input type="date" id="data" name="data" class="form-control" required="">
                            </div>
                            <div class="col-md-5">
                                <label for="valor" class="form-label">Valor</label>
                                <input type="number" step="0.01" id="valor" name="valor" class="form-control" required="">
                            </div>
                        </div>
                        <div class ="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="hora_inicio" class="form-label">Hora de ínicio</label>
                                <input type="time" id="hora_inicio" name="hora_inicio" class="form-control" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="hora_fim" class="form-label">Horário de fim</label>
                                <input type="time" id="hora_fim" name="hora_fim" class="form-control" required="">
                            </div>
                        </div>
                        <div class ="row g-3 mb-4">
                            <div class="col-md-4">
                                <label for="veiculo_id" class="form-label">Veículo</label>
                                <select required name="veiculo_id" id="veiculo_id" class="form-select">
                                    <?php foreach($veiculos as $v):?>   
                                        <option value="<?= $v['id'] ?>"> <?= $v['Modelo']?> </option>

                                    <?php endforeach;?>   
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label for="motorista_id" class="form-label">Motorista</label>
                                <select required name="motorista_id" id="motorista_id" class="form-select">
                                    <?php foreach($motoristas as $m):?>   
                                        <option value="<?= $m['id'] ?>"> <?= $m['nome']?> </option>

                                    <?php endforeach;?>   
                                </select>
                            </div>
                        </div>
                        <div class ="row g-3 mb-4">
                            <div class="col-md-12">
                                <label for="passageiro_id" class="form-label">Passageiro</label>
                                <select required name="passageiro_id" id="passageiro_id" class="form-select">
                                    <?php foreach($passageiros as $p):?>   
                                        <option value="<?= $p['id'] ?>"> <?= $p['nome']?> </option>

                                    <?php endforeach;?>   
                                </select>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                            <a href="crud_viagens.php" class="btn btn-secondary">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    require_once('../rodape.php');
?>
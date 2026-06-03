<?php
    require_once('../cabecalho.php');
    require_once('../conexao.php');
    try{
        $sql ='SELECT v.*,
        m.nome as nome_motorista,
        p.nome as nome_passageiro,
        ve.Modelo as modelo_veiculo
        FROM Viagens v
        INNER JOIN Motoristas m ON v.Motoristas_id = m.id
        INNER JOIN Passageiros p ON v.Passageiros_id = p.id
        INNER JOIN Veiculos ve ON v.Veiculos_id = ve.id';
        $stmt= $conexao ->query($sql);
        $resultado = $stmt->fetchAll();
    } catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>


<h2>Viagens</h2>
    <a href="nova_viagem.php" class="btn btn-success mb-3">Novo Registro</a>
    <a href="../principal.php" class="btn btn-secondary mb-3 me-2">Voltar</a>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
        <thead>
            <tr>
            <th>ID</th>
            <th>Destino</th>
            <th>Valor</th>
            <th>Data</th>
            <th>Horário de Inicio</th>
            <th>Horário do Fim</th>
            <th>Veiculo</th>
            <th>Passageiro</th>
            <th>Motorista</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultado as $r): ?>
                <tr>
                    <td><?= $r['id'] ?></td>
                    <td><?= $r['destino'] ?></td>
                    <td><?= $r['valor'] ?></td>
                    <td><?= $r['data'] ?></td>
                    <td><?= $r['hora_inicio'] ?></td>
                    <td><?= $r['hora_fim'] ?></td>
                    <td><?= $r['modelo_veiculo'] ?></td>
                    <td><?= $r['nome_passageiro'] ?></td>
                    <td><?= $r['nome_motorista'] ?></td>
                    <td class="d-flex gap-2">
                    <a href="alterar_viagens.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="consultar_viagens.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-info">Consultar</a>
                    </td>  
                </tr>
                <?php endforeach; ?>
        </tbody>
        </table>
    </div>
        
        
<?php
    require_once('../rodape.php');
?>
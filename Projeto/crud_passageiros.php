<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    try{
        $stmt = $conexao->query('SELECT * FROM Passageiros');
        $resultado = $stmt->fetchAll();
    } catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>


<h2>Passageiros</h2>
    <a href="novo_passageiro.php" class="btn btn-success mb-3">Novo Registro</a>
    <table class="table table-hover table-striped">
    <thead>
        <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Telefone</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultado as $r): ?>
            <tr>
                <td><?= $r['id'] ?></td>
                <td><?= $r['nome'] ?></td>
                <td><?= $r['email'] ?></td>
                <td><?= $r['telefone'] ?></td>
                <td class="d-flex gap-2">
                <a href="alterar_passageiro.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                <a href="consultar_passageiro.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-info">Consultar</a>
                </td>  
            </tr>
            <?php endforeach; ?>
    </tbody>
    </table>
        
        
<?php
    require_once('rodape.php');
?>
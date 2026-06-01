<?php
    require_once('../cabecalho.php');
    require_once('../conexao.php');
    try{
        $stmt = $conexao->query('SELECT * FROM Motoristas');
        $resultado = $stmt->fetchAll();
    } catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>


<h2>Motoristas</h2>
    <a href="novo_motorista.php" class="btn btn-success mb-3">Novo Registro</a>
    <a href="../principal.php" class="btn btn-secondary mb-3 me-2">Voltar</a>
    <table class="table table-hover table-striped">
    <thead>
        <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Data de Nascimento</th>
        <th>CPF</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>CNH</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resultado as $r): ?>
            <tr>
                <td><?= $r['id'] ?></td>
                <td><?= $r['nome'] ?></td>
                <td><?= $r['data_nascimento'] ?></td>
                <td><?= $r['cpf'] ?></td>
                <td><?= $r['email'] ?></td>
                <td><?= $r['telefone'] ?></td>
                <td><?= $r['cnh'] ?></td>

                <td class="d-flex gap-2">
                <a href="alterar_motorista.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                <a href="consultar_motorista.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-info">Consultar</a>
                </td>  
            </tr>
            <?php endforeach; ?>
    </tbody>
    </table>
        
        
<?php
    require_once('../rodape.php');
?>
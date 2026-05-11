<?php
    require_once('cabecalho.php');
    require_once('conexao.php');
    $mensagem = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $placa = $_POST['placa'];
        $modelo = $_POST['modelo'];
        $cor = $_POST['cor'];
        $fabricante = $_POST['fabricante'];
        $id = $_GET['id'];
        try{
            $sql = "UPDATE Veiculos SET placa = ?, modelo = ?, cor = ?, fabricante = ? WHERE id = ?";
            $stmt = $conexao->prepare($sql);
            if ($stmt->execute([$placa,$modelo,$cor,$fabricante,$id]))
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
        $stmt = $conexao->prepare("SELECT * FROM Veiculos WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $resultado = $stmt->fetch();
    } catch(Exception $e){
        echo "Erro: ".$e->getMessage();
    }
?>

<h1>Alterar Veículo</h1>
<form method="post">
    <div class="mb-3">
        <label for="placa" class="form-label">Informe a Placa do veículo</label>
        <input value="<?= $resultado['Placa'] ?>" type="text" id="placa" name="placa" class="form-control" required="">
    </div>
        <div class="mb-3">
        <label for="modelo" class="form-label">Informe o Modelo do veículo</label>
        <input value="<?= $resultado['Modelo'] ?>"  type="text" id="modelo" name="modelo" class="form-control" required="">
    </div>
        <div class="mb-3">
        <label for="cor" class="form-label">Informe a cor do veículo</label>
        <input value="<?= $resultado['Cor'] ?>"  type="text" id="cor" name="cor" class="form-control" required="">
    </div>
        <div class="mb-3">
        <label for="fabricante" class="form-label">Informe o Fabricante do veículo</label>
        <input value= "<?= $resultado['Fabricante'] ?>"  type="text" id="fabricante" name="fabricante" class="form-control" required="">
    </div>
    <div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Enviar</button>
    <a href="crud_veiculos.php" class="btn btn-secondary">Voltar</a>
    </div>
</form>
<?php
    echo $mensagem;
?>

<?php
    require_once('rodape.php');
?>
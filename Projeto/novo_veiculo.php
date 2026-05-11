<?php
    require_once('cabecalho.php');
?>

<h1>Novo Veículo</h1>
<form method="post">
    <div class="mb-3">
        <label for="placa" class="form-label">Informe a Placa do veículo</label>
        <input type="text" id="placa" name="placa" class="form-control" required="">
    </div>
        <div class="mb-3">
        <label for="modelo" class="form-label">Informe o Modelo do veículo</label>
        <input type="text" id="modelo" name="modelo" class="form-control" required="">
    </div>
        <div class="mb-3">
        <label for="cor" class="form-label">Informe a cor do veículo</label>
        <input type="text" id="cor" name="cor" class="form-control" required="">
    </div>
        <div class="mb-3">
        <label for="fabricante" class="form-label">Informe o Fabricante do veículo</label>
        <input type="text" id="fabricante" name="fabricante" class="form-control" required="">
    </div>
    <div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">Enviar</button>
    <a href="crud_veiculos.php" class="btn btn-secondary">Voltar</a>
    </div>
</form>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            require_once('conexao.php');
            $placa = $_POST['placa'];
            $modelo = $_POST['modelo'];
            $cor = $_POST['cor'];
            $fabricante = $_POST['fabricante'];
            try{
                $stmt = $conexao->prepare('INSERT INTO Veiculos (placa,modelo,cor,fabricante) VALUES (?,?,?,?);');
                if($stmt-> execute([$placa,$modelo,$cor,$fabricante]))
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
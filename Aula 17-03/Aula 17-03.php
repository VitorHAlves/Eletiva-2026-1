<?php
    $mapa1 = array('João','Maria',3);
    print_r($mapa1);// mostra todos os itens de mapa1
    echo"<p></p>";
    var_dump($mapa1);//mostra todos os itens e mostra o tipo de dado dos itens
    echo "<p>Valor da posição 2".$mapa1[2]."</p>";

    $mapa2[1] = "Vanessa";
    $mapa2[2] = "Jose";
    $mapa2[3] = "Clara";
    print_r($mapa2);

    $contatos["Vanessa"] = "123456";
    $contatos["José"] = "098586";
    echo "<p></p>";
    print_r($contatos);

    foreach($contatos as $valor)
    {
        echo "<p>Telefone: $valor </p>";
    }
    
    foreach($contatos as $chave => $valor)//chave associada a um valor
    {
        echo "<p>Telefone de $chave: $valor</p>";
    }

    unset($mapa1[2]);
    print_r($mapa1);
    $quantidade = count($mapa2);
    echo "<p>Qtd. Elementos mapa2</p>";
    asort($contatos);//ordenar pelo valor
    ksort($contatos);//ordenar pela chave
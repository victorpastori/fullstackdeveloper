<?php

require_once __DIR__ . '/../entities/repositories/CidadeRepository.php';
require_once __DIR__ . '/../entities/repositories/HistoricoCalculosRepository.php';

if($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['CONTENT_TYPE'] == "application/json"){
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $cidade = (new CidadeRepository())->findWithCategoria($data['cidade_id']);
    $distancia = rand(0, 100);
    $duracao = rand(0, 60);
    $response = array(
        'distancia' => $distancia,
        'duracao' => $duracao,
        'tarifa' => array(
            'bandeirada' => $cidade['bandeirada'],
            'valor_hora' => $cidade['valor_hora'],
            'valor_km' => $cidade['valor_km'],
        ),
        'valor' => calcula($distancia, $duracao, $cidade)
    );
    $data['valor'] = $response['valor'] * 100;
    $data['duracao'] = $duracao;
    $data['distancia'] = $distancia;
    (new HistoricoCalculosRepository())->create($data);
    echo json_encode($response);
}

function calcula($distancia, $duracao, $cidade){
    return $cidade['bandeirada'] / 100 + ($duracao * $cidade['valor_hora']) / 100 + ($distancia * $cidade['valor_km']) / 100;
}

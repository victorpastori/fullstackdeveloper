<?php

require_once __DIR__ . '/../entities/repositories/CidadeRepository.php';
require_once __DIR__ . '/../entities/repositories/HistoricoCalculosRepository.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = $_POST;
    if($_SERVER['CONTENT_TYPE'] == "application/json"){
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
    }
    $cidade = (new CidadeRepository())->findWithCategoria($data['cidade_id'], $data['categoria_id']);
    if(!is_null($cidade)){
        $distancia = rand(0, 100);
        $duracao = rand(0, 60);
        $date = new DateTime(null, new DateTimeZone('America/Sao_Paulo'));
        $data['valor'] = calcula($distancia, $duracao, $cidade) * 100;
        $data['duracao'] = $duracao;
        $data['distancia'] = $distancia;
        $data['created_at'] = $date->format('Y-m-d H:i:s');
        (new HistoricoCalculosRepository())->create($data);
        $response = array(
            'distancia' => $distancia,
            'duracao' => $duracao,
            'categoria' => $cidade['categoria'],
            'cidade' => $cidade['cidade'],
            'horario' => $date->format('d/m/Y H:i:s'),
            'valor' => $data['valor'],
            'endereco_origem' => $data['endereco_origem'],
            'endereco_destino' => $data['endereco_destino'],
            'valor' => $data['valor'],
            'valor_formatado' => number_format($data['valor']/100, '2', ',', '.'),
            'tarifa' => array(
                'bandeirada' => $cidade['bandeirada'],
                'valor_hora' => $cidade['valor_hora'],
                'valor_km' => $cidade['valor_km'],
            ),
        );
        echo json_encode($response);
    }else{
        echo 'Não possível relizar o calculo';
    }
}else{
    echo 'Não possível relizar o calculo';
}

function calcula($distancia, $duracao, $cidade){
    return $cidade['bandeirada'] / 100 + ($duracao * $cidade['valor_hora']) / 100 + ($distancia * $cidade['valor_km']) / 100;
}

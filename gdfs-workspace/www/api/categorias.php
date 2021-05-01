<?php

require_once __DIR__ . '/../entities/repositories/CategoriaRepository.php';

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $data = $_GET;
    $categorias = (new CategoriaRepository())->findByCity($data['cidade_id']);
    echo json_encode($categorias);
}else{
    echo 'Não possível relizar o calculo';
}

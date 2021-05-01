<?php

include_once 'BaseRepository.php';

class HistoricoCalculosRepository extends BaseRepository
{
    public function getAll(){
        $sql = 'select * from historico_calculos';
        $query = $this->db_instance->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($input){
        $sql = "INSERT INTO historico_calculos (endereco_origem, endereco_destino, duracao, distancia, valor, cidade_id, categoria_id) VALUES (:endereco_origem, :endereco_destino, :duracao, :distancia, :valor, :cidade_id, :categoria_id)";
        $query = $this->db_instance->prepare($sql);
        return $query->execute($input);
    }
}
<?php

include_once 'BaseRepository.php';

class HistoricoCalculosRepository extends BaseRepository
{
    public function getAll(){
        $sql = 'select HC.*, C.nome as cidade, CA.nome as categoria, DATE_FORMAT(HC.created_at, "%d/%m/%Y %H:%i:%s") as horario from historico_calculos as HC ';
        $sql_join = 'inner join cidades as C on C.id = HC.cidade_id ';
        $sql_join_2 = 'inner join categorias as CA on CA.id = HC.categoria_id ';
        $sql_order_by = 'order by HC.created_at DESC';
        $sql = $sql . $sql_join . $sql_join_2 . $sql_order_by;
        $query = $this->db_instance->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($input){
        $sql = "INSERT INTO historico_calculos (endereco_origem, endereco_destino, duracao, distancia, valor, cidade_id, categoria_id, created_at) VALUES (:endereco_origem, :endereco_destino, :duracao, :distancia, :valor, :cidade_id, :categoria_id, :created_at)";
        $query = $this->db_instance->prepare($sql);
        return $query->execute($input);
    }
}
<?php

include_once 'BaseRepository.php';

class CidadeRepository extends BaseRepository
{
    public function getAll(){
        $sql = 'select * from cidades';
        $query = $this->db_instance->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id){
        $sql = 'select * from cidades where id = ' . $id;
        $query = $this->db_instance->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    public function join($table, $first, $operator, $second){
        return '';
    }

    public function findWithCategoria($id){
        $sql = 'select C.nome as cidade, CC.*, CA.nome as categoria from cidades as C ';
        $sql_join = 'inner join cidade_has_categorias as CC on C.id = CC.cidade_id ';
        $sql_join_2 = 'inner join categorias as CA on CA.id = CC.categoria_id ';
        $sql_where = 'where C.id = ' . $id;
        $sql = $sql . $sql_join . $sql_join_2 . $sql_where;
        $query = $this->db_instance->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
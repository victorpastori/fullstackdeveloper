<?php

require_once 'BaseRepository.php';

class CategoriaRepository extends BaseRepository
{
    public function getAll(){
        $sql = 'select * from categorias';
        $query = $this->db_instance->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByCity($cidade_id){
        $sql = 'select C.* from categorias as C ';
        $sql_join = 'inner join cidade_has_categorias as CC on C.id = CC.categoria_id ';
        $sql_where = 'where CC.cidade_id = ' . $cidade_id;
        $query = $this->db_instance->prepare($sql . $sql_join . $sql_where);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}
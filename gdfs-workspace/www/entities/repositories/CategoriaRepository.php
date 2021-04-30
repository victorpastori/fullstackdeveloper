<?php

require_once 'BaseRepository.php';

class CategoriaRepository extends BaseRepository
{

    public function getAll(){
        $sql = 'select * from categorias';
        $query = $this->db_instance->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
<?php

include_once 'BaseRepository.php';

class CidadeRepository extends BaseRepository
{
    public function getAll(){
        $sql = 'select * from cidades';
        $query = $this->db_instance->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
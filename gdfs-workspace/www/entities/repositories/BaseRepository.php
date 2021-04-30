<?php

include_once __DIR__ . '/../DBConnection.php';

class BaseRepository
{
    protected $db_instance;

    public function __construct()
    {
        $this->db_instance = DBConnection::getInstance();
    }
}
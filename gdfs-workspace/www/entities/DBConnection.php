<?php


class DBConnection
{
    public static function getInstance(){
        $dsn = 'mysql:host=gd-fs-docker-mysql;port=3306;dbname=gdfs';
        $user = 'gdfs';
        $password = 'gdsecret';
        $db = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $db;
    }
}
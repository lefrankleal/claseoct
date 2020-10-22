<?php

class Database {

    private $server = 'localhost';
    private $user = 'frank';
    private $password = 'frank';
    private $db = 'oct20';

    function __construct(){}

    function select($sql = '') {
        $db = new mysqli($this->server, $this->user, $this->password, $this->db) or die('error');
        $query = $db->query($sql);
        $data = [];
        while ($row = $query->fetch_object()) {
            $data[] = $row;
        }
        $query->free_result();
        $query->close();
        return $data;
    }

    function PDO() {
        try {
            $dsn = "mysql:host=$this->server;dbname=$this->db";
            $db = new PDO($dsn, $this->user, $this->password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    function PDOExec($sql) {
        $sql->setFetchMode(PDO::FETCH_OBJ);
        $sql->execute();
        while ($row = $sql->fetch()) {
            $data[] = $row;
        }
        return $data;
    }

    function sql($sql) {
        $db = new mysqli($this->server, $this->user, $this->password, $this->db) or die('error');
        $query = $db->query($sql) or die('Problemas de ejecucion '. $db->error );
        return $query;
    }
}
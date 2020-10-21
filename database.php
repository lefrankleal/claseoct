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

    function sql($sql) {
        $db = new mysqli($this->server, $this->user, $this->password, $this->db) or die('error');
        $query = $db->query($sql) or die('Problemas de ejecucion '. $db->error );
        return $query;
    }
}
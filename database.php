<?php

class Database {

    private $server = 'localhost';
    private $user = 'frank';
    private $password = 'frank';
    private $db = 'oct20';

    function __construct(){}

    function query($sql = '') {
        $db = new mysqli($this->server, $this->user, $this->password, $this->db) or die('error');
        $query = $db->query($sql);
        $result = $query->fetch_array(MYSQLI_ASSOC);
        return $result;
    }

    /**
     * Este es un ejemplo para los arreglos
     */
    function arreglo() {
        $array1 = [
            0 => 'test',
            1 => 'hola',
            2 => 'mundo',
            5 => 'fin'
        ];
        $array2 = [
            'test', 'hola', 'mundo', 'fin', 4, 213123
        ];
        var_dump($array1, $array2);
        echo "<br>$array1[1] $array1[5]<br>";
    }
}
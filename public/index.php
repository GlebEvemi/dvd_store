<?php

class database{
    private $conn;
    private $host;
    private $user;
    private $password;
    private $baseName;

    function __construct(){
        $this->host = '127.0.0.1';
        $this->user = 'root';
        $this->password = '';
        $this->baseName = 'dvd_store';
        $this->connect();
    }
    function __destruct(){
        $this->disconnect();
    }

    function connect() {
    if (!$this->conn) {
    try {
    $this->conn = new PDO('mysql:host=' . $this->host . ';port=3307;dbname=' . $this->baseName,
    $this->user, $this->password,
    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    }
    catch (Exception $e) {
    die('Connection failed : '. $e->getMessage());
    }
    }
    return $this->conn;
}

function disconnect() {
    if ($this->conn) {
    $this->conn = null;
    }
}
}
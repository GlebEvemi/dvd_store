    <?php

class Database{
    private $conn;
    private $host;
    private $user;
    private $password;
    private $baseName;

    function __construct(){
        $this->host = '127.0.0.1';
        $this->user = 'root';
        $this->password = '13371337';
        $this->baseName = 'dvd_store';
        $this->connect();
    }
    function __destruct(){
        $this->disconnect();
    }

    function connect() {
    if (!$this->conn) {
    try {
    $this->conn = new PDO('mysql:host=' . $this->host . ';port=3306;dbname=' . $this->baseName,
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

function getOne($query, $params = []) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetch();
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }

    // Аналогично обновляем getAll
    function getAll($query, $params = []) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            return [];
        }
    }

function executeRun($query, $params = []) {
    try {
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($params);
    } catch (PDOException $e) {
        error_log("DB Error: " . $e->getMessage());
        throw $e; // пробрасываем выше
    }
}

function insertAndGetId($query, $params = []) {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($params);
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            error_log("DB Insert Error: " . $e->getMessage());
            throw $e;
        }
    }
}

<?php 

class Database {
    private $hostname = DB_HOSTNAME;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;
    private $database = DB_NAME;
    private $conn;
    private $statement;

    public function __construct() {
        $this->conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: ". mysqli_connect_error());
        }
    }

    public function query($query) {
        $this->statement = $this->conn->prepare($query);
    }

    public function bind($types, ...$values) {
        if (!empty($values)) {
            $this->statement->bind_param($types, ...$values);
        }
    }

    public function execute() {
        $this->statement->execute();
    }

    public function result() {
        $this->execute();
        $res = $this->statement->get_result();
        $rows = [];
        while ($row = $res->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function close() {
        $this->conn->close();
    }
}
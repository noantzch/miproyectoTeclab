<?php

class Database {
    private $host = "127.0.0.1";
    private $dbname = "MIPROYECTO";
    private $username = "postgres";
    private $password = "12345678";
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("pgsql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }

    public function isConnected() {
        return $this->conn !== null;
    }

    public function insert($table, $data) {
        $columns = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        $stmt = $this->conn->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    public function update($table, $data, $condition) {
        $setValues = [];

        foreach ($data as $key => $value) {
            $setValues[] = "$key = :$key";
        }

        $setValues = implode(", ", $setValues);

        $sql = "UPDATE $table SET $setValues WHERE $condition";
        $stmt = $this->conn->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }

    public function delete($table, $condition) {
        $sql = "DELETE FROM $table WHERE $condition";
        return $this->conn->exec($sql);
    }

    public function select($table, $condition = "") {
        $sql = "SELECT * FROM $table";

        if (!empty($condition)) {
            $sql .= " WHERE $condition";
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

/* @autor Luis Noel Antezana */
?>
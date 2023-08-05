<?php

class DB
{
    private $pdo;

    public function __construct() {
        // Imposta le informazioni di connessione al database
        $dbHost = DB_HOST;
        $dbName = DB_NAME;
        $dbUser = DB_USER;
        $dbPass = DB_PASS;

        // echo phpinfo();
        // Connessione al database
        $this->conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

        if ($this->conn->connect_error) {
            die('Errore di connessione al database: ' . $this->conn->connect_error);
        }

        $this->conn->set_charset("utf8mb4");
    }

    public function query($sql)
    {
        $result = $this->conn->query($sql);
        if (!$result) {
            return $this->conn->error;
        }

        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();

        return $data;
    }

    public function execute($sql)
    {
        $result = $this->conn->query($sql);
        return $result !== false;
    }

    public function select_all($tableName, $columns = array())
    {
        $query = 'SELECT ';

        $strCol = '';
        foreach ($columns as $colName) {
            $strCol .= ' ' . esc($colName) . ',';
        }
        $strCol = substr($strCol, 0, -1);

        $query .= $strCol . ' FROM ' . $tableName;

        $result = $this->conn->query($query);
        if (!$result) {
            return $this->conn->error;
        }

        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free();

        return $data;
    }

    public function select_one($tableName, $columns = array(), $id)
    {

        $strCol = '';
        foreach ($columns as $colName) {
            $colName = esc($colName);
            $strCol .= ' ' . $colName . ',';
        }
        $strCol = substr($strCol, 0, -1);
        $id = esc($id);
        $query = "SELECT $strCol FROM $tableName WHERE id = $id";

        $result = mysqli_query($this->conn, $query);
        $resultArray = mysqli_fetch_assoc($result);

        mysqli_free_result($result);

        return $resultArray;
    }

    public function delete_one($tableName, $id)
    {

        $id = esc($id);
        $query = "DELETE FROM $tableName WHERE id = $id";

        if (mysqli_query($this->conn, $query)) {
            $rowsAffected = mysqli_affected_rows($this->conn);
            return $rowsAffected;
        } else {
            return -1;
        }
    }

    public function update_one($tableName, $columns = array(), $id)
    {

        $id = esc($id);
        $strCol = '';
        foreach ($columns as $colName => $colValue) {
            $colName = esc($colName);
            $strCol .= " " . $colName . " = '$colValue' ,";
        }
        $strCol = substr($strCol, 0, -1);

        $query = "UPDATE $tableName SET $strCol WHERE id = $id";

        if (mysqli_query($this->conn, $query)) {
            $rowsAffected = mysqli_affected_rows($this->conn);

            return $rowsAffected;
        } else {

            return -1;
        }
    }

    public function insert_one($tableName, $columns = array())
    {

        $strCol = '';
        foreach ($columns as $colName => $colValue) {
            $colName = esc($colName);
            $strCol .= ' ' . $colName . ',';
        }
        $strCol = substr($strCol, 0, -1);

        $strColValues = '';
        foreach ($columns as $colName => $colValue) {
            $colValue = esc($colValue);
            $strColValues .= " '" . $colValue . "' ,";
        }
        $strColValues = substr($strColValues, 0, -1);

        $query = "INSERT INTO $tableName ($strCol) VALUES ($strColValues)";
        //var_dump($query); die;
        if (mysqli_query($this->conn, $query)) {
            $lastId = mysqli_insert_id($this->conn);

            return $lastId;
        } else {

            return -1;
        }
    }
}

class DBManager
{

    protected $db;
    protected $columns;
    protected $tableName;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function get($id)
    {
        $resultArr = $this->db->select_one($this->tableName, $this->columns, (int)$id);
        return (object) $resultArr;
    }
    
    public function getAll()
    {
        $results = $this->db->select_all($this->tableName, $this->columns);
        $objects = array();
        foreach ($results as $result) {
            array_push($objects, (object)$result);
        }
        return $objects;
    }

    public function create($obj)
    {
        $newId = $this->db->insert_one($this->tableName, (array) $obj);
        return $newId;
    }

    public function delete($id)
    {
        $rowsDeleted = $this->db->delete_one($this->tableName, (int)$id);
        return (int) $rowsDeleted;
    }

    public function delete_wish($id)
    {
        $rowsDeleted = $this->db->delete_one("wish_list", (int)$id);
        return (int) $rowsDeleted;
    }

    public function delete_msg($id)
    {
        $rowsDeleted = $this->db->delete_one("contact_us", (int)$id);
        return (int) $rowsDeleted;
    }

    public function delete_faq($id)
    {
        $rowsDeleted = $this->db->delete_one("faq", (int)$id);
        return (int) $rowsDeleted;
    }

    public function delete_answer($id)
    {
        $rowsDeleted = $this->db->delete_one("answer", (int)$id);
        return (int) $rowsDeleted;
    }

    public function update($obj, $id)
    {
        $rowsUpdated = $this->db->update_one($this->tableName, (array) $obj, (int)$id);
        return (int) $rowsUpdated;
    }
}

<?php
class DatabaseConnection {
    public $connection;
    public $pdo_statement;

    function __construct() {
        $this->connection = NULL;
        try {
            $this->connection = new PDO("mysql:host=sql12.freemysqlhosting.net;dbname=sql12627032", "sql12627032", "QyXXDVapDS");
            //$this->connection = new PDO("mysql:host=localhost;dbname=bookshop","root","");
            $this->connection->query("SET NAMES UTF8");
        } catch (PDOException $ex) {
            echo "<p>" . $ex->getMessage() . "</p>";
            die("<p>UNABLE TO CONNECT TO DATABASE</p>");
        }
    }

    function executeSQL($sqlQuery, $data=NULL) {
        $this->pdo_statement = $this->connection->prepare($sqlQuery);
        if ($data == NULL)
            $result = $this->pdo_statement->execute();
        else 
            $result = $this->pdo_statement->execute($data);
        return $result;
    }
}
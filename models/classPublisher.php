<?php
require_once("classDatabase.php");
class Publisher extends DatabaseConnection {
    public $data;

    function __construct() {
        parent::__construct();
    }

    function getPublisherList() {
        $sqlQuery = "select * from publisher";
        $result = $this->executeSQL($sqlQuery);
        if ($result) {
            $this->data = $this->pdo_statement->fetchAll();
        }
        return $result;
    }

    function getPublisher($publisher_id) {
        $sqlQuery = "select * from publisher where publisher_id=?";
        $result = $this->executeSQL($sqlQuery, $publisher_id);
        if ($result) {
            $this->data = $this->pdo_statement->fetch();
        }
        return $result;
    }

    function addPublisher($publisher_name) {
        $sqlQuery = "insert into publisher values(NULL,?)";
        $result = $this->executeSQL($sqlQuery, $publisher_name);
        return $result;
    }

    function updatePublisher($publisher_id, $publisher_name) {
        $sqlQuery = "update publisher
                    set publisher_name=?
                    where publisher_id=?";
        $param = [$publisher_name, $publisher_id];
        $result = $this->executeSQL($sqlQuery, $param);
        return $result;
    }

    function deletePublisher($publisher_id) {
        $sqlQuery = "delete from publisher where publisher_id=?";
        $result = $this->executeSQL($sqlQuery, $publisher_id);
        return $result;
    }
}
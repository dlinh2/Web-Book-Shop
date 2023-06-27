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

    function getPublisherById($publisher_id) {
        $sqlQuery = "select * from publisher where publisher_id=?";
        $result = $this->executeSQL($sqlQuery, [$publisher_id]);
        if ($result) {
            $this->data = $this->pdo_statement->fetch();
        }
        return $result;
    }

    function addPublisher($publisher_name, $publisher_description="") {
        $sqlQuery = "insert into publisher values(NULL,?,?)";
        $result = $this->executeSQL($sqlQuery, [$publisher_name, $publisher_description]);
        return $result;
    }

    function updatePublisher($publisher_id, $publisher_name, $publisher_description="") {
        $sqlQuery = "update publisher
                    set publisher_name=?,
                        publisher_description=?
                    where publisher_id=?";
        $param = [$publisher_name, $publisher_description, $publisher_id];
        $result = $this->executeSQL($sqlQuery, $param);
        return $result;
    }

    function deletePublisher($publisher_id) {
        $sqlQuery = "delete from publisher where publisher_id=?";
        $result = $this->executeSQL($sqlQuery, [$publisher_id]);
        return $result;
    }
}
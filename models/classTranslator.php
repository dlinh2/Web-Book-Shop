<?php
require_once("classDatabase.php");
class Translator extends DatabaseConnection {
    public $data;

    function __construct() {
        parent::__construct();
    }

    function getTranslatorList() {
        $sqlQuery = "select * from translator";
        $result = $this->executeSQL($sqlQuery);
        if ($result) {
            $this->data = $this->pdo_statement->fetchAll();
        }
        return $result;
    }

    function getTranslator($translator_id) {
        $sqlQuery = "select * from translator where translator_id=?";
        $result = $this->executeSQL($sqlQuery, [$translator_id]);
        if ($result) {
            $this->data = $this->pdo_statement->fetch();
        }
        return $result;
    }

    function addTranslator($translator_name) {
        $sqlQuery = "insert into translator values(NULL,?)";
        $result = $this->executeSQL($sqlQuery, [$translator_name]);
        return $result;
    }

    function updateTranslator($translator_id, $translator_name) {
        $sqlQuery = "update translator
                    set translator_name=?
                    where translator_id=?";
        $param = [$translator_name, $translator_id];
        $result = $this->executeSQL($sqlQuery, $param);
        return $result;
    }

    function deleteTranslator($translator_id) {
        $sqlQuery = "delete from translator where translator_id=?";
        $result = $this->executeSQL($sqlQuery, [$translator_id]);
        return $result;
    }
}